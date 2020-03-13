<?php


namespace backend\controllers;



use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Query;
use backend\models\News;
use backend\models\Alert;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\custom\UtilFunctions;



class NewsController extends \yii\web\Controller

{


	public $layout = 'inner';

	

	 public function behaviors()

    {

        return [

            'access' => [

                'class' => AccessControl::className(),

                'rules' => [

                    [

                        'actions' => ['add','edit','delete','view','stock'],

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
 
    public function actionStock($news_id)
{
    $active = News::find()->where(["id" => $news_id])->one();
        if($active->blog_status == 0)
        {
            $active->blog_status = 1;
            $active->save();
            
            return 1;
        }
        else
        {
             $active->blog_status = 0;
            $active->save();
            return 0;
        }
}



    /*public function actionIndex()

    {
        $model = new Company();
        //$companylist = Company::find()->all();
        return $this->render('add',['model'=> $model]);


    }*/



    public function actionAdd()

    {
        $model = new News();
        $newslist = News::find()->where(['is_deleted' => 0])->all();
        
          

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if($model->load(Yii::$app->request->post()))
        {
            $model->news_image = UploadedFile::getInstance($model, 'news_image');

            if($model->validate())
            {
                
                $time = time();

                $model->news_image->saveAs('uploads/newsimage/' . $model->news_image->baseName .'_'.$time.'.' . $model->news_image->extension);
                $model->news_image= $model->news_image->baseName .'_'.$time. '.' . $model->news_image->extension;


            $model->save();



            Yii::$app->getSession()->setFlash('success', [

                'type' => Alert::TYPE_SUCCESS,

                'duration' => 5000,

                'icon' => 'fa fa-user',

                'message' => 'Blog  has been added successfully ',

                'title' => ''

            ]);



            return $this->redirect('add');

        }
    }
    

        return $this->render('add',['model' => $model]);

    }


     public function actionView()
    {
        $newslist = News::find()->where(['is_deleted' => 0])->all();

        return $this->render('view',['newslist' => $newslist]);
    }

          public function actionEdit()
    {
        
        $updateModel = new News();

        if(Yii::$app->request->get('id')) 
        {  
            if($updateModel->load(Yii::$app->request->post()))
            {
            
             $updateModel->news_image = UploadedFile::getInstance($updateModel, 'news_image');
                if (!empty($updateModel->news_image)) {

                    $time = time();

                    $updateModel->news_image->saveAs('uploads/newsimage/' . $updateModel->news_image->baseName .'_'.$time.'.' . $updateModel->news_image->extension);
                    $updateModel->news_image= $updateModel->news_image->baseName .'_'.$time. '.' . $updateModel->news_image->extension;

                    $deletefile = News::findone(Yii::$app->request->get('id'))->news_image;

                    $serverfilePath = Yii::getAlias('@app/web/uploads/newsimage/'.$deletefile);

                    if(is_file($serverfilePath)) {
                          unlink('uploads/newsimage/'.$deletefile);      
                          }

                }
                else
                {
                    $updateModel->news_image = News::findone(Yii::$app->request->get('id'))->news_image;
                }
                
                

                if($updateModel->validate())
                {

                    $model = News::findOne(Yii::$app->request->get('id'));
                   
                    $model->news_title = $updateModel->news_title;
                    $model->news_image = $updateModel->news_image;
                    $model->news_desc = $updateModel->news_desc;
                    $model->news_date = $updateModel->news_date;

                    $model->save();

                    Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_SUCCESS,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'News  has been updated successfully',
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
                $model = News::findOne(Yii::$app->request->get('id'));
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
        $model = News::findOne(Yii::$app->request->get('id'));
        if($model)
        {

                $model->is_deleted = 1;
                

                $model->save();

                Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_SUCCESS,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'News  has been deleted successfully',
                        'title' => ''
                    ]);

            }
             else
            {
                Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_DANGER,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'Location Not Found',
                        'title' => ''
                    ]);
            }

            return $this->redirect('add');
        }
    }


    



}


