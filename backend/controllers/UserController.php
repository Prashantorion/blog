<?php



namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\Users;
use backend\custom\UtilFunctions;
use backend\models\Alert;

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
                        'actions' => ['index','update_password','update_details'],
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
        
        $user = Users::findOne(yii::$app->user->identity->id);

        return $this->render('index',['user' => $user]);
    }


    public function actionUpdate_password()
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

                 return $this->render('index',['user' => $user]);
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

                return $this->render('index',['user' => $user]);

            }



        }

        return $this->render('index',['user' => $user]);
    }

    public function actionUpdate_details()
    {
        $user = Users::findOne(yii::$app->user->identity->id);

        if ($user->load(Yii::$app->request->post())) {


            $userModel = Users::findOne(yii::$app->user->identity->id);
            $userModel->user_name = $user->user_name;
            $userModel->user_mobile = $user->user_mobile;
            $userModel->user_email = $user->user_email;
            
            $userModel->update();

             Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_SUCCESS,
                    'duration' => 5000,
                    'icon' => 'fa fa-user',
                    'message' => 'Details Updated Successfully',
                    'title' => ''
                ]);

            return $this->render('index',['user' => $user]);
       
        }

        return $this->render('index',['user' => $user]);
    }

}
