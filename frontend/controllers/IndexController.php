<?php



namespace frontend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Query;
use frontend\custom\UtilFunctions;
use frontend\models\Alert;

class IndexController extends \yii\web\Controller
{

	public $layout = 'inner';
	
	 public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','about_us','contact_us','terms_and_conditions', 'contact_form_submit', 'testimonials', 'our_clients'],
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

        $this->layout = 'main';
        return $this->render('index');
    }

    public function actionAbout_us()
    { 

        return $this->render('about_us');
    }

    public function actionTestimonials()
    { 

        return $this->render('testimonials');
    }

    public function actionOur_clients()
    { 

        return $this->render('our_clients');
    }

    public function actionContact_us()
    { 

        //$contactForm = new ContactForm();
        return $this->render('contact_us');
    }

    public function actionTerms_and_conditions()
    { 

        return $this->render('terms_and_conditions');
    }

    public function actionContact_form_submit()
    {  

        $contactForm = new ContactForm();
                  
        if ($contactForm->load(Yii::$app->request->post())) 
        {   
            
            $emailBody = '<p>A form has been submitted on the website betterkitchen.in. Below are the details.</p>
                              <p>Full Name: '.$contactForm->full_name.'</p>
                              <p>Email Address: '.$contactForm->email_address.'</p>
                              <p>Mobile Number: '.$contactForm->mobile_number.'</p>
                              <p>Message: '.$contactForm->message.'</p>
                              ';


                    //Yii::trace('Got Body '.$emailBody);

                    UtilFunctions::sendEmail('veerendrabhargava@gmail.com','Contact us form filled on betterkitchen.in website',$emailBody);
                    
                   Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_SUCCESS,
                    'duration' => 1000000,
                    'icon' => 'fa fa-user',
                    'message' => 'Thank you for getting in touch with us. We will get back you shortly.',
                    'title' => '']);

            
        }

        return $this->redirect('contact_us');

    }


}
