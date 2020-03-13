<?php



namespace frontend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Users;
use frontend\models\UserType;
use frontend\custom\UtilFunctions;
use frontend\models\Alert;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\widgets\ActiveForm;

class UserController extends \yii\web\Controller
{

	public $layout = 'inner';
	
	 public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['register', 'verify', 'settings'],
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

   
    public function actionRegister()
    {
        
        $model = new Users();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) 
        { 

            $model->added_by = -1;
            $model->user_type = 3;
            $model->user_desc = 'Registered User';
            $model->user_status = 1;
            $model->username = $model->user_email;

            $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';

            $passwordStr = '';
            for ($i = 0; $i < 6; $i++) {
                  $passwordStr .= $characters[rand(0, strlen($characters) - 1)];
            }

            $model->password = sha1($passwordStr);
            $model->password_raw = $passwordStr;

            $model->acceptance_str = sha1(UtilFunctions::getRandomString(6));

            if($model->validate())
            {
                $model->save();

                $this->layout = 'empty';
                $emailBody = $this->render('../emails/account_verification',['model' => $model]);

                $this->layout = 'inner';

                UtilFunctions::sendEmail($model->user_email,'Thank you for registering at betterkitchen.in',$emailBody);

                Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_SUCCESS,
                    'duration' => 5000,
                    'icon' => 'fa fa-user',
                    'message' => 'Your account has been registered. An activation link has been sent your email. Please click on it to activate and gain access to the website.',
                    'title' => ''
                ]);

                return $this->redirect('register');
            }

        }

        return $this->render('register',['model' => $model]);
    }

    public function actionVerify($accept)
    {
        if(!empty($accept))
        {
            $userModel = Users::find()->where(['acceptance_str' => $accept])->one();
            if($userModel)
            {
                $userModel->user_status = 0;
                $userModel->password = sha1($userModel->password_raw);
                $userModel->acceptance_str = 'Verified_'.time();
                $userModel->save();


                $this->layout = 'empty';
                $emailBody = $this->render('../emails/credentials',['model' => $userModel]);

                $this->layout = 'inner';

                UtilFunctions::sendEmail($userModel->user_email,'Credentials for betterkitchen.in',$emailBody);


                Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_SUCCESS,
                    'duration' => 5000,
                    'icon' => 'fa fa-user',
                    'message' => 'Thank you. Your account has been activated successfully. Your credentials have been mailed to your registered email address.',
                    'title' => ''
                ]);

                return $this->redirect('../site/login');
            }

            return $this->goHome();
            
        }
        

        return $this->goHome();
    }

    public function actionSettings()
    {
        $user = Users::findOne(yii::$app->user->identity->id);

        if ($user->load(Yii::$app->request->post())) {

            $userModel = Users::find()->where(['password' => sha1($user->old_password)])->one();
            if(!$userModel)
            {
                Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_DANGER,
                    'duration' => 10000,
                    'icon' => 'fa fa-user',
                    'message' => 'Current password entered is incorrect',
                    'title' => ''
                ]);

                 return $this->render('settings',['user' => $user]);
            }
            else
            {
                $userModel->password = sha1($user->password);
                $userModel->update();

                Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_SUCCESS,
                    'duration' => 5000,
                    'icon' => 'fa fa-user',
                    'message' => 'Password Updated Successfully',
                    'title' => ''
                ]);

                return $this->redirect('settings');

            }



        }

        return $this->render('settings',['user' => $user]);
    }

}
