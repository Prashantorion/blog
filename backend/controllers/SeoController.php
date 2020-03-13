<?php



namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Query;
use backend\models\SeoData;
use backend\models\Alert;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use backend\custom\UtilFunctions;
use yii\imagine\Image;


class SeoController extends \yii\web\Controller
{

	public $layout = 'inner';
	
	 public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ["view","edit","delete"],
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

        public function actionView()
    {
        $seoList = SeoData::find()->all();

        return $this->render('view',['seoList' => $seoList]);
    }
    
     public function actionEdit()
    {
        
        $updateModel = new SeoData();

        if(Yii::$app->request->get('id')) 
        {  
            if($updateModel->load(Yii::$app->request->post()))
            {
                

                    
                if($updateModel->validate())
                {

                    $model = SeoData::findOne(Yii::$app->request->get('id'));
                    $model->page_title = $updateModel->page_title;
                    $model->meta_title = $updateModel->meta_title;
                    $model->meta_description = $updateModel->meta_description;
                    $model->canonical_tag = $updateModel->canonical_tag;
                    $model->seo_keywords = $updateModel->seo_keywords;
                    

                    $model->save();

                    Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_SUCCESS,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'Seo '.$model->page_title.' has been updated successfully',
                        'title' => ''
                    ]);

                   return $this->redirect('view');

                }
                else
                {
                    $updateModel->id = Yii::$app->request->get('id');

                    return $this->render('view');
                }

            }
            else
            {
                $model = SeoData::findOne(Yii::$app->request->get('id'));
                return $this->render('edit',['model' => $model]);
            }
        }
        else
        {

           
            return $this->redirect('view');
            
        }

    }
    
    
}
