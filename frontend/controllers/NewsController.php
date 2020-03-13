<?php



namespace frontend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Query;
use frontend\custom\UtilFunctions;
use frontend\models\Alert;
use backend\models\News;
use backend\models\NewsGallery;
use backend\models\SeoData;

class NewsController extends \yii\web\Controller
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
                        'actions' => ['index','news_details'],
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


        // $seoDataModel = SeoData::find()->where(['page' => 'news'])->one();

        
        // $this->seoData["page_title"] = $seoDataModel->page_title;
        // $this->seoData["meta_title"] = $seoDataModel->meta_title;
        // $this->seoData["meta_description"] = $seoDataModel->meta_description;
        
        $newslist = News::find()->where(["is_deleted" => 0])->all();

        return $this->render('index',['newslist' => $newslist]);
    }

    public function actionNews_details($name)
    {   


        //$seoDataModel = SeoData::find()->where(['page' => 'about'])->one();

        
        //$this->seoData["page_title"] = $seoDataModel->page_title;
        //$this->seoData["meta_title"] = $seoDataModel->meta_title;
        //$this->seoData["meta_description"] = $seoDataModel->meta_description;
        $newslist = News::find()->where(['news_title' => $name])->one();
        $newsgallery = NewsGallery::find()->where(['news_id'=> $newslist->id,"is_deleted" => 0])->all();
        

        return $this->render('news_details',['newslist' => $newslist,'newsgallery' => $newsgallery]);
    }


}
