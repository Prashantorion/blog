<?php
namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Query;
use backend\models\Enquiry;
use backend\models\Alert;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\custom\UtilFunctions;



class EnquiryController extends \yii\web\Controller

{


	public $layout = 'inner';

	

	 public function behaviors()

    {

        return [

            'access' => [

                'class' => AccessControl::className(),

                'rules' => [

                    [

                        'actions' => ['add','view'],

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
        $model = new Enquiry();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) 
        {  

            if($model->validate())
            {
                
                $model->save();


                Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_SUCCESS,
                    'duration' => 5000,
                    'icon' => 'fa fa-user',
                    'message' => 'Category has been added successfully',
                    'title' => ''
                ]);

                return $this->redirect('add');
            }

        }

        return $this->render('add',['model' => $model]);
    }
    


     public function actionView()
    {

$enquirylist= Enquiry::find()->where()->all();
            

        return $this->render('view',['enquirylist ' => $enquirylist ]);
    }

   

    }


    






