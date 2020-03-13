<?php



namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Query;
use backend\models\Categories;
use backend\models\Alert;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\widgets\ActiveForm;

class CategoryController extends \yii\web\Controller
{

	public $layout = 'inner';
	
	 public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['add',"view","edit","delete"],
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    public function actionAdd()
    {
        $model = new Categories();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) 
        {  

            $model->added_by = yii::$app->user->identity->id;
            $model->cat_image = UploadedFile::getInstance($model, 'cat_image');
            // $model->cat_icon = UploadedFile::getInstance($model, 'cat_icon');

            if($model->validate())
            {
                
                $time = time();

                $model->cat_image->saveAs('uploads/categories/' . $model->cat_image->baseName .'_'.$time.'.' . $model->cat_image->extension);
                $model->cat_image= $model->cat_image->baseName .'_'.$time. '.' . $model->cat_image->extension;

                // $model->cat_icon->saveAs('uploads/categoryicon/' . $model->cat_icon->baseName .'_'.$time.'.' . $model->cat_icon->extension);
                // $model->cat_icon= $model->cat_icon->baseName .'_'.$time. '.' . $model->cat_icon->extension;

                

                $model->save();


                Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_SUCCESS,
                    'duration' => 5000,
                    'icon' => 'fa fa-user',
                    'message' => 'Category '.$model->cat_name.' has been added successfully',
                    'title' => ''
                ]);

                return $this->redirect('add');
            }

        }

        return $this->render('add',['model' => $model]);
    }

    public function actionView()
    {
        $categoryList = Categories::find()->where(['is_deleted' => 0])->all();

        return $this->render('view',['categoryList' => $categoryList]);
    }


    public function actionEdit()
    {
        
        $updateModel = new Categories();

        if(Yii::$app->request->get('id')) 
        {  
            if($updateModel->load(Yii::$app->request->post()))
            {
                
                $updateModel->cat_image = UploadedFile::getInstance($updateModel, 'cat_image');
                // $updateModel->cat_icon = UploadedFile::getInstance($updateModel, 'cat_icon');

                if (!empty($updateModel->cat_image)) {

                    $time = time();

                    $updateModel->cat_image->saveAs('uploads/categories/' . $updateModel->cat_image->baseName .'_'.$time.'.' . $updateModel->cat_image->extension);
                    $updateModel->cat_image= $updateModel->cat_image->baseName .'_'.$time. '.' . $updateModel->cat_image->extension;

                    $deletefile = Categories::findone(Yii::$app->request->get('id'))->cat_image;

                    $serverfilePath = Yii::getAlias('@app/web/uploads/categories/'.$deletefile);

                    if(is_file($serverfilePath)) {
                          unlink('uploads/categories/'.$deletefile);   
                          }
                }
                else
                {
                    $updateModel->cat_image = Categories::findone(Yii::$app->request->get('id'))->cat_image;
                }

                // if (!empty($updateModel->cat_icon)) {
                //      $time = time();

                //     $updateModel->cat_icon->saveAs('uploads/categoryicon/' . $updateModel->cat_icon->baseName .'_'.$time.'.' . $updateModel->cat_icon->extension);
                //     $updateModel->cat_icon= $updateModel->cat_icon->baseName .'_'.$time. '.' . $updateModel->cat_icon->extension;


                //     $deletefile1 = Categories::findone(Yii::$app->request->get('id'))->cat_icon;

                //     $serverfilePath = Yii::getAlias('@app/web/uploads/categoryicon/'.$deletefile1);

                //     if(is_file($serverfilePath)) {
                //           unlink('uploads/categoryicon/'.$deletefile1);      
                //           }

                // }
                // else
                // {
                    
                //     $updateModel->cat_icon = Categories::findone(Yii::$app->request->get('id'))->cat_icon;
                // }


                if($updateModel->validate())
                {

                    $model = Categories::findOne(Yii::$app->request->get('id'));
                    $model->cat_name = $updateModel->cat_name;
                    $model->cat_desc = $updateModel->cat_desc;
                    $model->cat_image = $updateModel->cat_image;
                    // $model->cat_icon = $updateModel->cat_icon;
                    $model->order_id = $updateModel->order_id;

                    $model->page_title = $updateModel->page_title;
                    $model->meta_title = $updateModel->meta_title;
                    $model->meta_description = $updateModel->meta_description;
                    $model->url_name = $updateModel->url_name;
                    

                    $model->updated_by = yii::$app->user->identity->id;

                    $model->save();

                    Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_SUCCESS,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'Category '.$model->cat_name.' has been updated successfully',
                        'title' => ''
                    ]);

                   return $this->redirect('edit?id='.$model->id);

                }
                else
                {
                    $updateModel->id = Yii::$app->request->get('id');

                    return $this->render('edit',['model' => $updateModel]);
                }

            }
            else
            {
                $model = Categories::findOne(Yii::$app->request->get('id'));
                return $this->render('edit',['model' => $model]);
            }
        }
        else
        {

           
            return $this->redirect('view');
            
        }

    }

    public function actionDelete()
    {
        if(Yii::$app->request->get('id')) 
        { 

            $model = Categories::findOne(Yii::$app->request->get('id'));
            if($model)
            {
                $model->deleted_by = yii::$app->user->identity->id;
                $model->deleted_date = date("Y-m-d H:i:s");
                $model->is_deleted = 1;

                $model->save();

                Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_SUCCESS,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'Category '.$model->cat_name.' has been deleted successfully',
                        'title' => ''
                    ]);

            }
            else
            {
                Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_DANGER,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'Brand Not Found',
                        'title' => ''
                    ]);
            }

            return $this->redirect('view');

        }
    }

    

}
