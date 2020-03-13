<?php


namespace backend\controllers;



use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Query;
use backend\models\NewsGallery;
use backend\models\Alert;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\custom\UtilFunctions;



class NewsgalleryController extends \yii\web\Controller

{


	public $layout = 'inner';

	

	 public function behaviors()

    {

        return [

            'access' => [

                'class' => AccessControl::className(),

                'rules' => [

                    [

                        'actions' => ['add','edit','delete','view'],

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



    /*public function actionIndex()

    {
        $model = new Company();
        //$companylist = Company::find()->all();
        return $this->render('add',['model'=> $model]);


    }*/



            public function actionAdd()

    {
        $model = new NewsGallery();
        
          

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if($model->load(Yii::$app->request->post()))
        {
            $model->news_gallery = UploadedFile::getInstance($model, 'news_gallery');

            if($model->validate())
            {
                
                $time = time();

                $model->news_gallery->saveAs('uploads/newsgallery/' . $model->news_gallery->baseName .'_'.$time.'.' . $model->news_gallery->extension);
                $model->news_gallery= $model->news_gallery->baseName .'_'.$time. '.' . $model->news_gallery->extension;

                $model->save();

            Yii::$app->getSession()->setFlash('success', [

                'type' => Alert::TYPE_SUCCESS,

                'duration' => 5000,

                'icon' => 'fa fa-user',

                'message' => 'News Gallery Image  has been added successfully ',

                'title' => ''

            ]);



            return $this->redirect('add');

        }
    }
    

        return $this->render('add',['model' => $model]);

    }


     public function actionView()
    {
        $newsgallerylist = NewsGallery::find()->where(['is_deleted' => 0])->all();

        return $this->render('view',['newsgallerylist' => $newsgallerylist]);
    }

          public function actionEdit()
    {
        
        $updateModel = new NewsGallery();

        if(Yii::$app->request->get('id')) 
        {  
            if($updateModel->load(Yii::$app->request->post()))
            {
                $updateModel->news_gallery = UploadedFile::getInstance($updateModel, 'news_gallery');
                if (!empty($updateModel->news_gallery)) {

                    $time = time();

                    $updateModel->news_gallery->saveAs('uploads/newsgallery/' . $updateModel->news_gallery->baseName .'_'.$time.'.' . $updateModel->news_gallery->extension);
                    $updateModel->news_gallery= $updateModel->news_gallery->baseName .'_'.$time. '.' . $updateModel->news_gallery->extension;

                    $deletefile = NewsGallery::findone(Yii::$app->request->get('id'))->news_gallery;

                    $serverfilePath = Yii::getAlias('@app/web/uploads/newsgallery/'.$deletefile);

                    if(is_file($serverfilePath)) {
                          unlink('uploads/newsgallery/'.$deletefile);      
                          }

                }
                else
                {
                    $updateModel->news_gallery = NewsGallery::findone(Yii::$app->request->get('id'))->news_gallery;
                }
                

                if($updateModel->validate())
                {

                    $model = NewsGallery::findOne(Yii::$app->request->get('id'));
                   
                    $model->news_gallery_title = $updateModel->news_gallery_title;
                    $model->news_gallery = $updateModel->news_gallery;
                    $model->news_id = $updateModel->news_id;

                    $model->save();

                    Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_SUCCESS,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'News Gallery has been updated successfully',
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
                $model = NewsGallery::findOne(Yii::$app->request->get('id'));
                return $this->render('edit',['model' => $model]);
            }
        }
        else
        {

           
            return $this->redirect('add');
            
        }

    }


    public function actionDelete()
    {

    if(Yii::$app->request->get('id'))
    {
        $model = NewsGallery::findOne(Yii::$app->request->get('id'));
        if($model)
        {

                $model->is_deleted = 1;
                

                $model->save();

                Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_SUCCESS,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'News Gallery has been deleted successfully',
                        'title' => ''
                    ]);

            }
             else
            {
                Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_DANGER,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'News Gallery Not Found',
                        'title' => ''
                    ]);
            }

            return $this->redirect('add');
        }
    }


    



}


