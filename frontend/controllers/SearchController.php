<?php



namespace frontend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Query;
use frontend\custom\UtilFunctions;
use frontend\models\Alert;
use backend\models\Project;   

class SearchController extends \yii\web\Controller
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
                        'actions' => ['projects'],
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


     public function actionProjects($s)
    {   


         
        $prodModel = Project::find()->where(['pro_name' => $s])->one();
       
       
      
      //$downloadModels = ProductsDownloads::find()->where(['is_deleted' => 0, 'prod_id' => $productId, 'download_type' => $downloadType])->all();

      //$brandList= Brands::find()->where(['is_deleted' => 0])->all();

      //$registerModel = new UserRegistrations();

      //$productModels = Products::find()->where(['is_deleted' => 0])->all();

      //$downloadTypes = DownloadTypes::find()->all();

       return $this->render('../project/projectlists', ['prodModel' => $prodModel]);
    }



 
}
