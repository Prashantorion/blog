<?php



namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Query;
use backend\models\Categories;
use yii\helpers\ArrayHelper;
use backend\models\Type;
use backend\models\Alert;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\widgets\ActiveForm;
use backend\models\Clientspeaks;

class ClientspeaksController extends \yii\web\Controller
{

	public $layout = 'inner';
	
	 public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['add',"view","edit","delete"],
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
        $model = new Clientspeaks();
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
                    'message' => 'Category '.$model->name.' has been added successfully',
                    'title' => ''
                ]);

                return $this->redirect('add');
            }

        }

        return $this->render('add',['model' => $model]);
    }

    public function actionView()
    {
        
        $clientList = Clientspeaks::find()->where(['is_deleted' => 0])->all();

        return $this->render('view',['clientList' => $clientList]);
    }


    public function actionEdit()
    {
        
        $updateModel = new Clientspeaks();

        if(Yii::$app->request->get('id')) 
        {  

                if($updateModel->validate())
                {

                    $model = Clientspeaks::findOne(Yii::$app->request->get('id'));
                    $model->name = $updateModel->name;
                    $model->comment = $updateModel->comment;
                    $model->company_name = $updateModel->company_name;
                   
                                       $model->save();

                    Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_SUCCESS,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'Clientspeaks '.$model->id.' has been updated successfully',
                        'title' => ''
                    ]);

                   return $this->redirect('edit?id='.$model->id);

                }

            
        
        else
                {
 $model = Clientspeaks::findOne(Yii::$app->request->get('id'));
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

            $model = Clientspeaks::findOne(Yii::$app->request->get('id'));
            if($model)
            {
               
               
                $model->is_delete = 1;

                $model->save();

                Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_SUCCESS,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'Category '.$model->id.' has been deleted successfully',
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

    

}
