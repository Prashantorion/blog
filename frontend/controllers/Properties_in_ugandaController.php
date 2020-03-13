<?php



namespace frontend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Query;
use frontend\custom\UtilFunctions;
use frontend\models\Alert;
use backend\models\Project;
use backend\models\ProjectStatus;
use backend\models\ProjectType;
use backend\models\ProjectGallery;
use backend\models\Floorplan;
use backend\models\ProjectOffer;
use backend\models\ProjectAddOffer;
use backend\models\ProjectAmenities;
use backend\models\ProjectEnquiry;
use backend\models\Location;
use backend\models\SeoData;
use yii\helpers\ArrayHelper;

class Properties_in_ugandaController extends \yii\web\Controller
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
                        'actions' => ['index','project_details','project_enquiry','add','thank_you','projectlists','no_project'],
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



    public function actionNo_project()
    {   
        return $this->render('no_project');
    }
    
    public function actionIndex()
    {   
	

        $seoDataModel = SeoData::find()->where(['page' => 'about'])->one();

        
        $this->seoData["page_title"] = $seoDataModel->page_title;
        $this->seoData["meta_title"] = $seoDataModel->meta_title;
        $this->seoData["meta_description"] = $seoDataModel->meta_description;
        $projectlist = Project::find()->where(['is_deleted' => 0])->all();
        $locationlist = Location::find()->where(['id'=> $projectlist->pro_location])->one();
        $locationlists = Location::find()->where(['id'=> $projectlist->pro_locations])->one();
        

        return $this->render('index',['projectlist' => $projectlist,'locationlist' => $locationlist,'locationlists' => $locationlists]);
    }

     public function actionProject_details($name)
    {   

  $projectlist = Project::find()->where(['url_name' => $name])->one();

  		 if($projectlist == null)
            {
                $this->redirect('no_project');
            }        
            else{

        $seoDataModel = SeoData::find()->where(['page' => 'about'])->one();

        
        $this->seoData["page_title"] = $seoDataModel->page_title;
        $this->seoData["meta_title"] = $seoDataModel->meta_title;
        $this->seoData["meta_description"] = $seoDataModel->meta_description;
      
        $projectstatus = ProjectStatus::find()->where(['id'=> $projectlist->pro_status])->one();
        $projecttype = ProjectType::find()->where(['id'=> $projectlist->pro_type])->one();
        $projectgallery = ProjectGallery::find()->where(['pro_id'=> $projectlist->id])->all();
        $floorplan = Floorplan::find()->where(['pro_id'=> $projectlist->id])->all();
        $projectofferlist = ProjectOffer::find()->where(['pro_id'=> $projectlist->id])->all();
        $projectaddofferlist = ProjectAddOffer::find()->where(['pro_id'=> $projectlist->id])->all();
        $projectamenitieslist = ProjectAmenities::find()->where(['pro_id'=> $projectlist->id])->all();
        $locationlist = Location::find()->where(['id'=> $projectlist->pro_location])->one();
        $locationlists = Location::find()->where(['id'=> $projectlist->pro_locations])->one();
        

        return $this->render('project_details',['projectlist' => $projectlist, 'projectstatus' => $projectstatus, 'projecttype' => $projecttype, 'projectgallery' => $projectgallery, 'floorplan' => $floorplan, 'projectofferlist' => $projectofferlist,'projectaddofferlist' => $projectaddofferlist, 'projectamenitieslist' => $projectamenitieslist, 'locationlist' => $locationlist,'locationlists' => $locationlists]);
    }
 }

    public function actionProject_enquiry($name)
    {   
        $model = new ProjectEnquiry();


        $seoDataModel = SeoData::find()->where(['page' => 'about'])->one();

        
        $this->seoData["page_title"] = $seoDataModel->page_title;
        $this->seoData["meta_title"] = $seoDataModel->meta_title;
        $this->seoData["meta_description"] = $seoDataModel->meta_description;
        $projectlist = Project::find()->where(['url_name' => $name])->one();
        

        return $this->render('project_enquiry',['model' => $model,'projectlist' => $projectlist]);
    }

    public function actionAdd()

    {
        $model = new ProjectEnquiry();
        
          

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if($model->load(Yii::$app->request->post()))
        {

            $model->save();
            
            Yii::$app->getSession()->setFlash('success', [

                'type' => Alert::TYPE_SUCCESS,

                'duration' => 5000,

                'icon' => 'fa fa-user',

                'message' => 'Project Enquiry  has been added successfully ',

                'title' => ''

            ]);
            
            $this->layout = 'empty';
                $emailBody = $this->render('../emails/enquiry',['model' => $model]);
                $adminemail = "info@comfort-homes.com";
                $this->layout = 'inner';
                UtilFunctions::sendEmail($adminemail,"Inquiry on Comfort Homes.com",$emailBody);

            
            
            
                



            return $this->redirect('thank_you');

        }
    

        return $this->render('project_enquiry',['model' => $model]);

    }

     public function actionThank_you()
    {   
        
        
    		
        return $this->render('thank_you');
    }


 public function actionProjectlists($s)
    {   

       

        $projectlist = Project::find()->where(['pro_name' => $s])->one();
           
            if($projectlist == null)
            {
                $this->redirect('no_project');
            }        
            else{
            
        $seoDataModel = SeoData::find()->where(['page' => 'about'])->one();
        $this->seoData["page_title"] = $seoDataModel->page_title;
        $this->seoData["meta_title"] = $seoDataModel->meta_title;
        $this->seoData["meta_description"] = $seoDataModel->meta_description;
        

        
        $projectstatus = ProjectStatus::find()->where(['id'=> $projectlist->pro_status])->one();
        $projecttype = ProjectType::find()->where(['id'=> $projectlist->pro_type])->one();
        $projectgallery = ProjectGallery::find()->where(['pro_id'=> $projectlist->id])->all();
        $floorplan = Floorplan::find()->where(['pro_id'=> $projectlist->id])->all();
        $projectofferlist = ProjectOffer::find()->where(['pro_id'=> $projectlist->id])->all();
        $projectaddofferlist = ProjectAddOffer::find()->where(['pro_id'=> $projectlist->id])->all();
        $projectamenitieslist = ProjectAmenities::find()->where(['pro_id'=> $projectlist->id])->all();
        $locationlist = Location::find()->where(['id'=> $projectlist->pro_location])->one();
        $locationlists = Location::find()->where(['id'=> $projectlist->pro_locations])->one();
        

        return $this->render('project_details',['projectlist' => $projectlist, 'projectstatus' => $projectstatus, 'projecttype' => $projecttype, 'projectgallery' => $projectgallery, 'floorplan' => $floorplan, 'projectofferlist' => $projectofferlist,'projectaddofferlist' => $projectaddofferlist, 'projectamenitieslist' => $projectamenitieslist, 'locationlist' => $locationlist,'locationlists' => $locationlists]);
    }
    }
}
