<?php



namespace frontend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Query;
use frontend\custom\UtilFunctions;
use frontend\models\Alert;
use backend\models\SeoData;

class Contact_usController extends \yii\web\Controller
{

	public $layout = 'inner';
	
	 public $seoData = array();
	 
	 public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
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


    public function actionIndex()
    {   
         $seoDataModel = SeoData::find()->where(['page' => 'contactus'])->one();

        
        $this->seoData["page_title"] = $seoDataModel->page_title;
        $this->seoData["meta_title"] = $seoDataModel->meta_title;
        $this->seoData["meta_description"] = $seoDataModel->meta_description;

        return $this->render('index');
    }


}
