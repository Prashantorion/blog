<?php



namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Users;
use frontend\custom\UtilFunctions;
use backend\models\Alert;
use backend\models\UsersUpload;
use yii\db\Query;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;

use frontend\models\CourseComments;
use frontend\models\CourseTaken;
use frontend\models\StarRatings;
use backend\models\UserSearch;

class PortaluserController extends \yii\web\Controller
{

	public $layout = 'inner';
	
	 public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','user_list','get_all_users','change_status','user_add','user_edit','users_upload','delete_user'],
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


    public function actionIndex()
    {
        return $this->redirect('user_list');
    }

    public function actionUser_add()
    {
        $model = new Users();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }


        if ($model->load(Yii::$app->request->post())) 
        {  

            $model->added_by = yii::$app->user->identity->id;
            $model->username = $model->user_email;
            $model->password = sha1($model->password);
            $model->password_raw = $model->password;
            $model->user_type = 3;


            $model->user_image = UploadedFile::getInstance($model, 'user_image');
            if($model->user_image)
            {
               $time = time();

                $model->user_image->saveAs('../../frontend/web/uploads/user/' . $model->user_image->baseName .'_'.$time.'.' . $model->user_image->extension);
                $model->user_image= $model->user_image->baseName .'_'.$time. '.' . $model->user_image->extension;
                $model->user_image = yii::$app->params['frontDomain'].'web/uploads/user/'.$model->user_image;
             }
            
            $model->save();

            Yii::$app->getSession()->setFlash('success', [
                'type' => Alert::TYPE_SUCCESS,
                'duration' => 5000,
                'icon' => 'fa fa-user',
                'message' => 'User '.$model->user_name.' has been added successfully ',
                'title' => ''
            ]);

            return $this->redirect('user_add');

        }


        return $this->render('user_add',['model' => $model]);
    }


    public function actionUser_edit()
    {
       
       $model = Users::findOne(Yii::$app->request->get('id'));

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if(Yii::$app->request->get('id')) 
        { 

            if($model->load(Yii::$app->request->post())) 
            {  

                $model->user_image = UploadedFile::getInstance($model, 'user_image');
                if($model->user_image)
                {
                   $time = time();

                    $model->user_image->saveAs('../../frontend/web/uploads/user/' . $model->user_image->baseName .'_'.$time.'.' . $model->user_image->extension);
                    $model->user_image= $model->user_image->baseName .'_'.$time. '.' . $model->user_image->extension;
                    $model->user_image = yii::$app->params['frontDomain'].'web/uploads/user/'.$model->user_image;

                    $deletefile = Users::findone(Yii::$app->request->get('id'))->user_image;

                    $deletefile = substr($deletefile,strripos($deletefile,'/')+1,strlen($deletefile));

                    yii::trace(' Document Root '.$_SERVER['DOCUMENT_ROOT']."mooc/frontend/web/uploads/user/".$deletefile);

                    $serverfilePath = $_SERVER['DOCUMENT_ROOT']."mooc/frontend/web/uploads/user/".$deletefile;

                    if(is_file($serverfilePath)) {
                      unlink('../../frontend/web/uploads/user/'.$deletefile);      
                      }

                 }
                
                if($model->change_password == "1")
                {
                    $model->password_raw = $model->password;
                    $model->password = sha1($model->password);
                }
                else
                {
                     $oldModel = Users::findOne(Yii::$app->request->get('id'));
                    $model->password = $oldModel->password;
                    $model->password_raw = $oldModel->password_raw;
                }

                $model->save();

                Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_SUCCESS,
                    'duration' => 5000,
                    'icon' => 'fa fa-user',
                    'message' => 'User '.$model->user_name.' has been updated successfully ',
                    'title' => ''
                ]);

                return $this->redirect('user_edit?id='.$model->id);

            }
            else
            {
                return $this->render('user_edit',['model' => $model]);
            }
        }


        return $this->redirect('user_list');
    }

    public function actionUser_list()
    {
        return $this->render('user_list');
    }

    public function actionChange_status()
    {
        $model = new Users();

        if ($model->load(Yii::$app->request->post())) 
        { 
            $userIdsArr = explode(",", $model->check_list);
            for($i=0;$i<count($userIdsArr);$i++)
            {
                $userId = $userIdsArr[$i];
                $userModel = Users::findOne($userId);
                $userModel->user_status = $model->to_enable;
                                
                yii::trace($userId.":: Before Save Status ::".$model->to_enable);

                if($model->to_enable == 0)
                {
                     $emailBody = '<p>Your account has been successfully activated at www.tajir.com</p>
                              <p>Below are the credentials for your account</p>
                              <p>Username: <b>'.$userModel->username.'</b></p>
                              <p>Password: <b>'.$userModel->password_raw.'</b></p>

                              <p><a href="'.yii::$app->params["frontDomain"].'web/index/" >www.tajir.com</a>'.
                              '</p>
                              <p>If you cannot click the link above, copy paste the below url in your browser.<br/><br/>'.yii::$app->params["frontDomain"].'web/index/</p>';

                    UtilFunctions::sendEmail($userModel->user_email,'Account Activation For www.tajir.com',$emailBody);
                }

                $userModel->save();
            }

            if($model->to_enable == 1)
            {
               Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_SUCCESS,
                    'duration' => 5000,
                    'icon' => 'fa fa-user',
                    'message' => count($userIdsArr).' user(s) has been added disabled successfully.',
                    'title' => ''
                ]); 
            }
            else
            {
                Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_SUCCESS,
                    'duration' => 5000,
                    'icon' => 'fa fa-user',
                    'message' => count($userIdsArr).' user(s) has been added enabled successfully.',
                    'title' => ''
                ]); 
            }
            
        }

        return $this->redirect('user_list');
    }

    public function actionUsers_upload()
    {
        $model = new UsersUpload();

        if ($model->load(Yii::$app->request->post())) 
        { 
            $model->upload_file = UploadedFile::getInstances($model, 'upload_file');

            if (!empty($model->upload_file))
            {
                foreach ($model->upload_file as $file) 
                {

                  $file->saveAs("uploads/temp/" .$file->baseName . '.' . $file->extension);

                  $sheetData = "";
                  try
                  {
                    $objPHPExcel = \PHPExcel_IOFactory::load("uploads/temp/" .$file->baseName . '.' . $file->extension);
                    $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                  }
                  catch(Exception $e)
                  {
                    return $this->redirect(['user_list']);
                  }
                  
                  Yii::trace("Got A ".count($sheetData));

                  //print_r($sheetData);


                  $tempEmailId = array();
                  $tempEmpId = array();

                  $actualCount = 0;
                  $errorCount = 0;
                  for($i=2;$i<=count($sheetData);$i++)
                  {
                    $userName = $sheetData[$i]["A"];
                    $userEmail = $sheetData[$i]["B"];
                    $userMobile = $sheetData[$i]["C"];
                    $userPassword = $sheetData[$i]["D"];
                    $userEmpId = $sheetData[$i]["E"];
                    
                   if($userName != '' && $userEmail != '' && $userMobile != '' && $userPassword != '' && $userEmpId != '')
                   {

                        yii::trace('Got Uploaded Data '.$userName.'::'.$userEmail.'::'.$userMobile.'::'.$userPassword.'::'.$userEmpId.'::');
                        $modelSave = new Users();
                        $modelSave->user_name = (string)$userName;
                        $modelSave->user_email = (string)$userEmail;
                        $modelSave->user_mobile = (string)$userMobile;
                        $modelSave->password = (string)$userPassword;
                       
                        $modelSave->username = $userEmail;
                        $modelSave->user_type = 3;
                        $modelSave->added_by = yii::$app->user->identity->id;

                        $errorData = ActiveForm::validate($modelSave);

                        //print_r($errorData);

                        $errorStr = "";

                        $errorKeys = array_keys($errorData);
                        for($j=0;$j<count($errorData);$j++)
                        {
                            $errorStr = $errorStr . $errorData[$errorKeys[$j]][0] . '<br/>';
                            //print_r($errorStr);
                        }
                        
                        if (in_array($modelSave->user_email, $tempEmailId)) {

                            continue;
                        }
                        else
                        {
                            $tempEmailId[] = $modelSave->user_email;
                        }

                        

                        if(count($errorData) == 0)
                        {
                            $model->user_name[($actualCount)] =  $userName;
                            $model->user_email[($actualCount)] =  $userEmail;
                            $model->user_mobile[($actualCount)]=  $userMobile;
                            $model->password[($actualCount)] =  $userPassword;
                            
                            $actualCount++;
                        }
                        else
                        {
                            $model->error_user_name[($errorCount)] =  $userName;
                            $model->error_user_email[($errorCount)] =  $userEmail;
                            $model->error_user_mobile[($errorCount)]=  $userMobile;
                            $model->error_password[($errorCount)] =  $userPassword;
                            $model->error_details[($errorCount)] =  $errorStr;

                             $errorCount++;
                        }
                        
                    }
                        
                    }

                    return $this->render('user_upload_file',['model' => $model]);

                }
             
           }
           else
           {
            yii::trace('Into Actual Uploading of Users '.count($model->user_name));

               for($i=0;$i<count($model->user_name);$i++)
               {
                    $modelSave = new Users();
                    $modelSave->user_name = $model->user_name[$i];
                    $modelSave->user_email = $model->user_email[$i];
                    $modelSave->user_mobile = $model->user_mobile[$i];
                    $modelSave->password = sha1($model->password[$i]);
                    $modelSave->password_raw = $model->password[$i];
                    
                    $modelSave->username = $model->user_email[$i];
                    $modelSave->user_type = 3;
                    $modelSave->added_by = yii::$app->user->identity->id;

                    $modelSave->save();
               }
                
                    Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_SUCCESS,
                    'duration' => 5000,
                    'icon' => 'fa fa-user',
                    'message' => count($model->user_name).' user(s) have been added successfully ',
                    'title' => ''
                ]);

               return $this->redirect('users_upload');     
           }
        }

        return $this->render('user_upload',['model' => $model]);
    }

    public function actionDelete_user($id)
    {
        if($id)
        {
            Users::deleteAll(['user_id' => $id]);


            Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_SUCCESS,
                    'duration' => 5000,
                    'icon' => 'fa fa-user',
                    'message' => ' User has been deleted successfully ',
                    'title' => ''
                ]);

            return $this->redirect('user_list');
        }
    }

    public function actionGet_all_users(){


        $post = Yii::$app->request->post();
        $start = $post['start'];
        $length = $post['length'];
        $search = $post['search'];
        $search = $search["value"];

        
        $order = $post['order'];
        $order = $order[0];

        $sortColumn = $order['column'];
        $sortOperation = $order['dir'];

        $queryFull = new Query;
        $queryFiltered = new Query;
        $queryCountAll = new Query;

        $orderBy = null;

        switch($sortColumn)
        {

            case "0";
                    $sortColumn = "user_id";
                break;

            case "1";
                $sortColumn = "user_name";
            break;

            case "2";
                $sortColumn = "user_email";
            break;


            case "3";
                $sortColumn = "user_mobile";
            break;


            case "4";
                $sortColumn = "user_status";
            break;

        }


        //$userQueryAll = Users::find()->all();


        $queryCountAll  ->select(['count(*)'])  
                    ->from('tbl_users_portal')
                    ->where('user_type="3"')
                    ->all();


        $queryFull  ->select(['count(*)'])  
                    ->from('tbl_users_portal')
                    ->where('user_type="3"')
                    ->andFilterWhere(['or',['like','tbl_users_portal.user_name',$search],['like','tbl_users_portal.user_email',$search],['like','tbl_users_portal.user_mobile',$search]])
                    ->orderBy($sortColumn.' '.$sortOperation)
                    ->all();

        $queryFiltered  ->select(['tbl_users_portal.user_id','tbl_users_portal.user_image','tbl_users_portal.user_name','tbl_users_portal.user_email','tbl_users_portal.user_mobile','tbl_users_portal.user_status'])  
                    ->from('tbl_users_portal') 
                    ->where('user_type="3"')  
                    ->andFilterWhere(['or',['like','tbl_users_portal.user_name',$search],['like','tbl_users_portal.user_email',$search],['like','tbl_users_portal.user_mobile',$search]])
                    ->offset($start)->limit($length)
                    ->orderBy($sortColumn.' '.$sortOperation)
                    ->all();        


        $command = $queryCountAll->createCommand();
        $countAll = $command->queryAll(); 

        $command = $queryFull->createCommand();
        $messageSetAll = $command->queryAll(); 

        $countAll = $countAll[0]['count(*)'];
        $messageSetAll = $messageSetAll[0]['count(*)'];

        $command = $queryFiltered->createCommand();
        $messagesFiltered = $command->queryAll();           

          
        $dataArr = array();
        for($i=0;$i<count($messagesFiltered);$i++)
        {
            $detailsArr = array();
            $detailsArr['user_id'] = $messagesFiltered[$i]['user_id'];
            $detailsArr['user_image'] = $messagesFiltered[$i]['user_image'];
            $detailsArr['user_name'] = $messagesFiltered[$i]['user_name'];
            $detailsArr['user_email'] = $messagesFiltered[$i]['user_email'];
            $detailsArr['user_mobile'] = $messagesFiltered[$i]['user_mobile'];
            $detailsArr['user_status'] = $messagesFiltered[$i]['user_status'];
            
            $dataArr[] = $detailsArr;
        }

         //yii::trace('Details Array '.count($detailsArr));

        $output = array('data' => $dataArr,'recordsTotal' => $countAll,'recordsFiltered' => $messageSetAll);

        Yii::$app->response->format = 'json';
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header('Content-Type: application/json');

        return $output;
    
     }

}
