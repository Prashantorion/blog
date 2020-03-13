<?php
namespace backend\controllers;

use Yii;
use backend\models\LoginForm;
use backend\models\PasswordResetRequestForm;
use backend\models\ResetPasswordForm;
use backend\models\SignupForm;
use backend\models\ContactForm;
use backend\models\Users;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\custom\UtilFunctions;
use backend\models\Alert;
use yii\helpers\Html;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login','logout','index','register','forgot_password','password_reset','reset_password'],
                'rules' => [
                    [
                        'actions' => ['login','register','forgot_password','password_reset','reset_password'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index','logout'],
                        'allow' => true,
                        'roles' => ['@'],
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

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect('dashboard/');
        }
        

        // if (!\Yii::$app->user->isGuest) {
        //     return $this->goHome();
        // }

        // $model = new LoginForm();

        return $this->render('login',[
                'model' => $model,
            ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {

            if($model->login())
            {
                return $this->redirect('../dashboard/');
            }
            else
            {

                Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_DANGER,
                    'duration' => 5000,
                    'icon' => 'fa fa-user',
                    'message' => 'Username or Password is Incorrect',
                    'title' => ''
                ]);

                //$alert = new Alert();
               // $alert->type = Alert::ALERT;
                //$alert->message = "Username or Password is incorrect";

                return $this->render('login', [
                'model' => $model]);
            }
            

        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionRegister()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $alert = new Alert();
        $alert->type = Alert::ALERT;

        $model = new Users();
        if ($model->load(Yii::$app->request->post())) {

            $userModel = Users::find()->where(['user_email' => $model->user_email])->one();
            if($userModel)
            {
                $alert->message = 'An email with '.$model->user_email.' is already registered. If you have forgotton your password, please click on the forgot password link';
                    return $this->render('register', [
                 'model' => $model, 'alert'=>$alert,
                ]);
            }
            
            $model->username = $model->user_email;
            $password = UtilFunctions::getRandomString(6);



            $model->password = sha1($password);
            $model->user_type = 3;
            $model->added_by = 0;

             


              yii::trace($model->username.' '.$model->user_name.' '.$model->user_mobile.'Got Register Data '.$model->password);

            if($model->validate())
            {
                $model->save();
                $alert->message = 'An email has been sent to '.$model->user_email.' with your login credentials. Please login with those credentials in the system.';
                
                $emailBody = '<p>Thank you for registering with JantaSteel. Below are your log-in credentials. </p>
                              <p>Username: <b>'.$model->user_email.'</b></p>
                              <p>Username: <b>'.$password.'</b></p>
                              <p>Use the below link to login into the portal.</p>
                              <p><a href="'.yii::$app->params["defaultDomain"].'web/site/login">Click Here</a>
                              </p>
                              <p>If you cannot click the link above, copy paste the below url in your browser.<br/><br/>'.yii::$app->params["defaultDomain"].'web/site/login</p>';


                UtilFunctions::sendEmail($model->user_email,"Registration on JantaSteel.com",$emailBody);

                $model = new Users();


            }
            else
            {
                $alert->message = 'The email '.$model->user_email.' is already registerd in the system. Click on forgot password if you want to reset.';
            }
      
           

            return $this->render('register', [
                'model' => $model, 'alert'=>$alert,
            ]);

        } else {

            return $this->render('register', [
                'model' => $model,
            ]);

        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }


    public function actionForgot_password()
    {  
        $alert = new Alert();
            $alert->type = Alert::ALERT;

        $user = new Users();
                  
        if ($user->load(Yii::$app->request->post())) 
        {   


            

            $userModel = Users::find()->where(['user_email' => $user->user_email])->one();

            if($userModel)
            {
                $userModel->password_reset_token = md5(yii::$app->getSecurity()->generateRandomKey()) . '_' . time();
                
                if($userModel->save())
                {
                    
                    $this->layout = 'empty';
                    $emailBody = $this->render('../emails/forgetpassword',['userModel' => $userModel]);

                   /* $emailBody = '<p>You have requested a reset link for the account at www.brasslinehirer.com</p>
                              <p>Below is the link to reset your password.</p>
                              <p><a href="'.yii::$app->params["defaultDomain"].'web/site/password_reset?token='.$userModel->password_reset_token.'" >Click Here</a>'.
                              '</p>
                              <p>If you cannot click the link above, copy paste the below url in your browser.<br/><br/>'.yii::$app->params["defaultDomain"].'web/site/password_reset?token='.$userModel->password_reset_token.'</p>';*/


                    //Yii::trace('Got Body '.$emailBody);
                    
                    $this->layout = 'main';
                    UtilFunctions::sendEmail($userModel->user_email,'Reset Password for Brasslineindia.com',$emailBody);
                    $alert->message = 'An email with a set new password link has been sent to your registered email address. Please check and reset the password from the link provided. If there is any other issue, please contact your administrator.';

                    
                    
                    Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_SUCCESS,
                    'duration' => 10000,
                    'icon' => 'fa fa-user',
                    'message' => 'An email with a reset link has been sent to you registered email address. Please check and reset the password from the link provided. If there is any other issue, please contact your administrator',
                    'title' => ''
                ]);

                }
                else
                {
                    $alert->message = 'There was some error in generating a set new password link. Please try again after sometime or contact us.';
                    
                    Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_DANGER,
                    'duration' => 5000,
                    'icon' => 'fa fa-user',
                    'message' => 'There was some error in generating a reset link. Please try again after sometime or contact your administrator',
                    'title' => ''
                    ]);
                }
            }
            else
            {
                 Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_DANGER,
                    'duration' => 5000,
                    'icon' => 'fa fa-user',
                    'message' => 'Email entered is not found in the system',
                    'title' => ''
                ]);
            }
            


            return $this->render('forgot_password',['model' => $user,'alert'=>$alert]);
        }

        return $this->render('forgot_password',['alert'=>$alert]);

    }


     public function actionPassword_reset()
       {  

            if(Yii::$app->request->get('token'))
            {
                $userModel = Users::find()->where(['password_reset_token' => Yii::$app->request->get('token')])->one();
                if($userModel)
                {
                    return $this->render('reset_password',['model' => $userModel]);
                }
                else
                {
                    $this->goHome();
                }
            }

             $this->goHome();

        }

     public function actionReset_password_now()
    {  
        
        $alert = new Alert();
        $alert->type = Alert::ALERT;

        $this->layout = 'main';
        $user = new Users();
                  
        if ($user->load(Yii::$app->request->post())) 
        {   
            $userModel = Users::find()->where(['user_id' => $user->user_id])->one();

            //yii::trace( $user->user_id.' Got User Data '.$user->password.'::'.count($userModel));
            $userModel->password = sha1($user->password);
            $userModel->updated_by = $user->id;
            
             $alert = new Alert();
             $alert->type = Alert::ALERT;

            if($userModel->save())
            {
                $userModel->password_reset_token = "";
                $userModel->save();

                $alert->message = 'Your password has been reset successfully';
                Yii::$app->getSession()->setFlash('success', [

                    'type' => Alert::TYPE_SUCCESS,

                    'duration' => 5000,

                    'icon' => 'fa fa-user',

                    'message' => 'Your Password has been reset successfully.',

                    'title' => ''

                ]);
                return $this->redirect('login');
            }
            else
            {
                $alert->message = 'There was some error in resetting your password. Please try again after sometime or contact your administrator';
                
                Yii::$app->getSession()->setFlash('success', [

                    'type' => Alert::TYPE_DANGER,

                    'duration' => 5000,

                    'icon' => 'fa fa-user',

                    'message' => 'There was some error in resetting your password. Please try again after sometime or contact your administrator',

                    'title' => ''
                     ]);

            }


            return $this->render('reset_password',['model' => $user,'alert' => $alert]);
        }

       

    }

}
