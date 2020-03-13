<?php



namespace frontend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Query;
use frontend\custom\UtilFunctions;
use frontend\models\Alert;
use backend\models\Categories;
use backend\models\Products;
use backend\models\ProductsImages;
use backend\models\Inquiries;
use backend\models\InquiriesProducts;

class CartController extends \yii\web\Controller
{

    public $layout = 'inner';
    
     public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'add_to_cart', 'delete_from_cart','update_from_cart', 'confirm_inquiry', 'thank_you','confirm'],
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

        $session = Yii::$app->session;

        $cart = $session['cart'];
        $cartQty = $session['cartQty'];

        $idsArr = array();

        if($cart)
        {
            foreach($cart as $productId)
            {
                $idsArr[count($idsArr)] = $productId;
            }
        }
        

        if(count($idsArr) == 0)
        {
            $idsArr[0] = -1;
        }
       

        $idsArr = implode(",",$idsArr);

        $model = new Inquiries();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) 
        { 
            if($model->validate())
            {

                $model->save();

                $session = Yii::$app->session;

                $cart = $session['cart'];
                $cartQty = $session['cartQty'];

                $productNameArr = array();

                if($cart)
                {
                    foreach($cart as $productId)
                    {
                        $inqProd = new InquiriesProducts();
                        $inqProd->inquiry_id = $model->id;
                        $inqProd->product_id = $productId;
                        $inqProd->qty = $cartQty[$productId];

                        
                        $inqProd->save();

                    }
                }




                $session = Yii::$app->session;

                $cart = $session['cart'];
                $cartQty = $session['cartQty'];

                $idsArr = array();

                foreach($cart as $productId)
                {
                    $idsArr[count($idsArr)] = $productId;
                }

                $idsArr = implode(",",$idsArr);

                $productList = Products::find()->where(['is_deleted' => 0])->andWhere('id in ('.$idsArr.')')->all();

                $this->layout = 'empty';

                $emailBody = $this->render('../emails/client_thank_you', ['model' => $model,'productList' => $productList, 'cartQty' => $cartQty]);

                UtilFunctions::sendEmail($model->email,'Your Inquiry on www.brasslineindia.com',$emailBody);


                $this->layout = 'empty';

                $emailBody = $this->render('../emails/inquiry', ['model' => $model,'productList' => $productList, 'cartQty' => $cartQty]);

                    //Yii::trace('Got Body '.$emailBody);

                UtilFunctions::sendEmail('brasslineindia@gmail.com','New Inquiry from Website',$emailBody);


                $cart = array();
                $session['cart'] = $cart;


                // Yii::$app->getSession()->setFlash('success', [
                //     'type' => Alert::TYPE_SUCCESS,
                //     'duration' => 5000,
                //     'icon' => 'fa fa-user',
                //     'message' => 'Thank you. Your inquiry has been sent successfully. You will hear from us soon.',
                //     'title' => ''
                // ]);

                return $this->redirect('thank_you');

            }

        }
        


        $productList = Products::find()->where(['is_deleted' => 0])->andWhere('id in ('.$idsArr.')')->all();
        return $this->render('index', ['productList' => $productList, 'cartQty' => $cartQty,'model' => $model]);
    }

    public function actionAdd_to_cart($productId,$qty)
    {
        $session = Yii::$app->session;

        $cart = $session['cart'];
        $cartQty = $session['cartQty'];

        if($cart)
        {
            foreach($cart as $productIdCheck)
            {
                if($productIdCheck == $productId)
                {
                    return 'Product is already added.';
                }
                
            }
        }
        else
        {
            $cart = array();
            $cartQty = array();
        }

        $cart[count($cart)] = $productId;
        $cartQty[$productId] = $qty;

        $session['cart'] = $cart;
        $session['cartQty'] = $cartQty;

        return '1';

    }

    public function actionDelete_from_cart($productId)
    {
        $session = Yii::$app->session;

        $cart = $session['cart'];
        $cartQty = $session['cartQty'];

        if($cart)
        {
            $count = -1;
            foreach($cart as $productIdCheck)
            {
                $count++;
                if($productIdCheck == $productId)
                {
                    unset($cart[$count]);
                    unset($cartQty[$productId]);

                    $cart = array_values($cart);
                    //$cartQty = array_values($cartQty);

                    $session['cart'] = $cart;
                    $session['cartQty'] = $cartQty;

                    return '1';
                }
                
            }
        }

        

        return 'Product not added to cart.';

    }

    public function actionUpdate_from_cart($productId,$qty)
    {
        $session = Yii::$app->session;
        $cart = $session['cart'];
        $cartQty = $session['cartQty'];
        
         if($cart)
        {
            foreach($cart as $productIdCheck)
            {
                
                
            }
        }
        else
        {
            $cart = array();
            $cartQty = array();
        }
        
        $cart[count($cart)] = $productId;
        $cartQty[$productId] = $qty;
        
        $session['cart'] = $cart;
        $session['cartQty'] = $cartQty;
        
        return '1';

    }

    public function actionConfirm_inquiry()
    {
        $model = new Inquiries();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) 
        { 
            if($model->validate())
            {

                $model->save();

                $session = Yii::$app->session;

                $cart = $session['cart'];
                $cartQty = $session['cartQty'];

                $productNameArr = array();

                if($cart)
                {
                    foreach($cart as $productId)
                    {
                        $inqProd = new InquiriesProducts();
                        $inqProd->inquiry_id = $model->id;
                        $inqProd->product_id = $productId;
                        $inqProd->qty = $cartQty[$productId];

                        
                        $inqProd->save();

                    }
                }




                $session = Yii::$app->session;

                $cart = $session['cart'];
                $cartQty = $session['cartQty'];

                $idsArr = array();

                foreach($cart as $productId)
                {
                    $idsArr[count($idsArr)] = $productId;
                }

                $idsArr = implode(",",$idsArr);

                $productList = Products::find()->where(['is_deleted' => 0])->andWhere('id in ('.$idsArr.')')->all();

                $this->layout = 'empty';

                $emailBody = $this->render('../emails/client_thank_you', ['model' => $model,'productList' => $productList, 'cartQty' => $cartQty]);

                UtilFunctions::sendEmail($model->email,'Your Inquiry on www.brasslineindia.com',$emailBody);


                $this->layout = 'empty';

                $emailBody = $this->render('../emails/inquiry', ['model' => $model,'productList' => $productList, 'cartQty' => $cartQty]);

                    //Yii::trace('Got Body '.$emailBody);

                UtilFunctions::sendEmail('brasslineindia@gmail.com','New Inquiry from Website',$emailBody);


                $cart = array();
                $session['cart'] = $cart;


                // Yii::$app->getSession()->setFlash('success', [
                //     'type' => Alert::TYPE_SUCCESS,
                //     'duration' => 5000,
                //     'icon' => 'fa fa-user',
                //     'message' => 'Thank you. Your inquiry has been sent successfully. You will hear from us soon.',
                //     'title' => ''
                // ]);

                return $this->redirect('thank_you');

            }

        }


        return $this->render('confirm', ['model' => $model]);

    }

    public function actionThank_you()
    {   
        return $this->render('thank_you');
    }

  public function actionConfirm()
    {   
        return $this->render('confirm');
    }
}
