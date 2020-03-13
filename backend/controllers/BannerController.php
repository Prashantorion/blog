<?php


namespace backend\controllers;



use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Query;
use backend\models\Banner;
use backend\models\Alert;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\custom\UtilFunctions;



class BannerController extends \yii\web\Controller

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
        $model = new Banner();
        
          

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if($model->load(Yii::$app->request->post()))
        {
            $model->banner_image = UploadedFile::getInstance($model, 'banner_image');
            // $model->banner_small_img = UploadedFile::getInstance($model, 'banner_small_img');

            if($model->validate())
            {
                
                $time = time();

                $model->banner_image->saveAs('uploads/bannerimage/' . $model->banner_image->baseName .'_'.$time.'.' . $model->banner_image->extension);
                $model->banner_image= $model->banner_image->baseName .'_'.$time. '.' . $model->banner_image->extension;
                
                // $model->banner_small_img->saveAs('uploads/bannersmallimg/' . $model->banner_small_img->baseName .'_'.$time.'.' . $model->banner_small_img->extension);
                // $model->banner_small_img= $model->banner_small_img->baseName .'_'.$time. '.' . $model->banner_small_img->extension;

                $model->save();

            Yii::$app->getSession()->setFlash('success', [

                'type' => Alert::TYPE_SUCCESS,

                'duration' => 5000,

                'icon' => 'fa fa-user',

                'message' => 'Banner '.$model->banner_title.' has been added successfully ',

                'title' => ''

            ]);



            return $this->redirect('add');

        }
    }
    

        return $this->render('add',['model' => $model]);

    }


     public function actionView()
    {
        $bannerlist = Banner::find()->where(['is_deleted' => 0])->all();

        return $this->render('view',['bannerlist' => $bannerlist]);
    }

          public function actionEdit()
    {
        
        $updateModel = new Banner();

        if(Yii::$app->request->get('id')) 
        {  
            if($updateModel->load(Yii::$app->request->post()))
            {
                $updateModel->banner_image = UploadedFile::getInstance($updateModel, 'banner_image');
                // $updateModel->banner_small_img = UploadedFile::getInstance($updateModel, 'banner_small_img');
                
                if (!empty($updateModel->banner_image)) {

                    $time = time();

                    $updateModel->banner_image->saveAs('uploads/bannerimage/' . $updateModel->banner_image->baseName .'_'.$time.'.' . $updateModel->banner_image->extension);
                    $updateModel->banner_image= $updateModel->banner_image->baseName .'_'.$time. '.' . $updateModel->banner_image->extension;

                    $deletefile = Banner::findone(Yii::$app->request->get('id'))->banner_image;

                    $serverfilePath = Yii::getAlias('@app/web/uploads/bannerimage/'.$deletefile);

                    if(is_file($serverfilePath)) {
                          unlink('uploads/bannerimage/'.$deletefile);      
                          }

                }
                else
                {
                    $updateModel->banner_image = Banner::findone(Yii::$app->request->get('id'))->banner_image;
                }
                
                
                // if(!empty($updateModel->banner_small_img )) 
                //    {

                //     $updateModel->banner_small_img->saveAs('uploads/bannersmallimg/' . $updateModel->banner_small_img->baseName .'_'.$time.'.' . $updateModel->banner_small_img->extension);
                //     $updateModel->banner_small_img= $updateModel->banner_small_img->baseName .'_'.$time. '.' . $updateModel->banner_small_img->extension;
                    
                //     $deletefile2 = Banner::findone(Yii::$app->request->get('id'))->banner_small_img;
                //      $serverfilePath = Yii::getAlias('@app/web/uploads/bannersmallimg/'.$deletefile2);
                //        if(is_file($serverfilePath))
                //        {
                //           unlink('uploads/bannersmallimg/'.$deletefile2);
                //        }

                //    }
                //    else
                //    {
                //         $updateModel->banner_small_img = Banner::findone(Yii::$app->request->get('id'))->banner_small_img;
                //    }
                

                if($updateModel->validate())
                {

                    $model = Banner::findOne(Yii::$app->request->get('id'));
                   
                    $model->banner_title = $updateModel->banner_title;
                    $model->banner_image = $updateModel->banner_image;
                    $model->banner_small_img = $updateModel->banner_small_img;
                    $model->banner_desc = $updateModel->banner_desc;
                    $model->banner_cat_name = $updateModel->banner_cat_name;

                    $model->save();

                    Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_SUCCESS,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'Banner '.$model->banner_title.' has been updated successfully',
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
                $model = Banner::findOne(Yii::$app->request->get('id'));
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
        $model = Banner::findOne(Yii::$app->request->get('id'));
        if($model)
        {

                $model->is_deleted = 1;
                

                $model->save();

                Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_SUCCESS,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'Banner '.$model->banner_title.' has been deleted successfully',
                        'title' => ''
                    ]);

            }
             else
            {
                Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_DANGER,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'Banner Not Found',
                        'title' => ''
                    ]);
            }

            return $this->redirect('view');
        }
    }


    



}


