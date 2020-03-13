<?php



namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Query;
use backend\models\Categories;
use yii\helpers\ArrayHelper;
use backend\models\Subcategory;
use backend\models\Status;
use backend\models\Alert;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\widgets\ActiveForm;

class SubcategoryController extends \yii\web\Controller
{

	public $layout = 'inner';
	
	 public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['add',"view","edit","delete","update"],
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
        $model = new Subcategory();


        $catList = Categories::find()->where(["is_deleted" => 0])->all();
        foreach($catList as $cat)
        {
            $cat->cat_name = $cat->cat_name.'';
        }
        
        $catList=ArrayHelper::map($catList,'id','cat_name');

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) 
        {  

            $model->added_by = yii::$app->user->identity->id;
           

            if($model->validate())
            {
                
                

                $model->save();


                Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_SUCCESS,
                    'duration' => 5000,
                    'icon' => 'fa fa-user',
                    'message' => 'SubCategory '.$model->sub_cat_name.' has been added successfully',
                    'title' => ''
                ]);

                return $this->redirect('add');
            }

        }

        return $this->render('add',['model' => $model,'catList' => $catList]);
    }

    public function actionView()
    {
        $subcategoryList = Subcategory::find()->where(['is_deleted' => 0])->all();

        return $this->render('view',['subcategoryList' => $subcategoryList]);
    }


    public function actionEdit()
    {
        
        $updateModel = new Subcategory();
        
        $catList = Categories::find()->where(["is_deleted" => 0])->all();
        $catList=ArrayHelper::map($catList,'id','cat_name');

        if(Yii::$app->request->get('id')) 
        {  
            if($updateModel->load(Yii::$app->request->post()))
            {
                
               
                
                if($updateModel->validate())
                {

                    $model = Subcategory::findOne(Yii::$app->request->get('id'));
                    $model->cat_id = $updateModel->cat_id;
                    $model->sub_cat_name = $updateModel->sub_cat_name;
                    

                    $model->updated_by = yii::$app->user->identity->id;

                    $model->save();

                    Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_SUCCESS,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'SubCategory '.$model->sub_cat_name.' has been updated successfully',
                        'title' => ''
                    ]);

                   return $this->redirect('edit?id='.$model->id);

                }
                else
                {
                    $updateModel->id = Yii::$app->request->get('id');

                    return $this->render('edit',['model' => $updateModel,'catList' => $catList]);
                }

            }
            else
            {
                $model = Subcategory::findOne(Yii::$app->request->get('id'));
                
                return $this->render('edit',['model' => $model,'catList' => $catList]);
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

            $model = Subcategory::findOne(Yii::$app->request->get('id'));
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
                        'message' => 'Subcategory '.$model->sub_cat_name.' has been deleted successfully',
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


public function actionUpdate()
    {
       
        
        if(Yii::$app->request->get('id'))
        {
            $model = Subcategory::findOne(Yii::$app->request->get('id'));
            if($model)
            {
                
                    if($model->featured == 1)
                    {
                        $model->featured = 0;
                        $model->save();
                    }
                     else{
                
                     $model->featured = 1;

                     $model->save();
                }

                      Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_SUCCESS,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'Subcategory  has been updated successfully',
                        'title' => ''
                    ]);
            }

            else
                {
                        Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_DANGER,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'SubCategory Not Found',
                        'title' => ''
                    ]);
                 }

        return $this->redirect('view');
    }

 }
    

}
