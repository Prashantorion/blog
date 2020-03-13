<?php
namespace frontend\controllers;

use Yii;
use frontend\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Users;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\custom\UtilFunctions;
use frontend\models\Alert;

/**
 * Site controller
 */
class SiteController extends Controller
{

    public $layout = 'inner';
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login','logout','index','forgot_password','password_reset','reset_password','register'],
                'rules' => [
                    [
                        'actions' => ['login','forgot_password','password_reset','reset_password','register'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index','logout'],
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
        
       return $this->redirect('index/');

    }

    public function actionRegister()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new Users();

         if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
       
        
        if ($model->load(Yii::$app->request->post())) {

            if($model->validate())
            {
                
                $model->acceptance_str = sha1(UtilFunctions::getRandomString(6));
                $model->save();


                

                

                Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_DANGER,
                    'duration' => 5000,
                    'icon' => 'fa fa-user',
                    'message' => 'Your account has been registered successfully. An activation link has been sent your email. Please click on it to activate your account.',
                    'title' => ''
                ]);

                return $this->render('login', [
                'model' => $model]);

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

                return $this->render('login', [
                'model' => $model]);
            }
            

        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
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
                
                return $this->goBack();
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

                return $this->render('login', [
                'model' => $model]);
            }
            

        } else {
            return $this->render('login', [
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

        $user = new Users();
                  
        if ($user->load(Yii::$app->request->post())) 
        {   
            $userModel = Users::find()->where(['user_email' => $user->user_email])->one();

            if($userModel)
            {
                $userModel->password_reset_token = md5(yii::$app->getSecurity()->generateRandomKey()) . '_' . time();
                
                if($userModel->save())
                {

                    $emailBody = '<p>You have requested a set new password link for the account at betterkitchen.in</p>
                              <p>Below is the link to set your password.</p>
                              <p><a href="'.yii::$app->params["defaultDomain"].'web/site/password_reset?token='.$userModel->password_reset_token.'" >Click Here</a>'.
                              '</p>
                              <p>If you cannot click the link above, copy paste the below url in your browser.<br/><br/>'.yii::$app->params["defaultDomain"].'web/site/password_reset?token='.$userModel->password_reset_token.'</p>';


                    //Yii::trace('Got Body '.$emailBody);

                    UtilFunctions::sendEmail($userModel->user_email,'Reset Password for betterkitchen.in',$emailBody);
                    
                   Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_SUCCESS,
                    'duration' => 1000000,
                    'icon' => 'fa fa-user',
                    'message' => 'An email with a set new password link has been sent to your registered email address. Please check and reset the password from the link provided. If there is any other issue, please contact your administrator.',
                    'title' => '']);
                }
                else
                {
                    Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_DANGER,
                    'duration' => 10000,
                    'icon' => 'fa fa-user',
                    'message' => 'There was some error in generating a set new password link. Please try again after sometime or contact your administrator.',
                    'title' => ''
                    ]);
                }
            }
            else
            {
                 Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_DANGER,
                    'duration' => 10000,
                    'icon' => 'fa fa-user',
                    'message' => 'Email entered is not found in the system',
                    'title' => ''
                ]);
            }
            


            return $this->render('forgot_password',['model' => $user]);
        }

        return $this->render('forgot_password');

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

        //$this->layout = 'main';
        $user = new Users();
                  
        if ($user->load(Yii::$app->request->post())) 
        {   
            $userModel = Users::find()->where(['user_id' => $user->user_id])->one();

            yii::trace( $user->user_id.' Got User Data '.$user->password.'::'.count($userModel));
            $userModel->password = sha1($user->password);
            $userModel->updated_by = $user->id;
            
             $alert = new Alert();
             $alert->type = Alert::ALERT;

            if($userModel->save())
            {
                $userModel->password_reset_token = "";
                $userModel->save();

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

        $this->goHome();

    }

}
