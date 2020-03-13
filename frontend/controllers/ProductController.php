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

use backend\models\SeoData;

class ProductController extends \yii\web\Controller
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
                        'actions' => ['index','our_products', 'product_lists', 'product_details','productdetails','no_product','all_products'],
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
    public function actionNo_product()
    {   
        return $this->render('no_product');
    }

    public function actionIndex()
    {   
        $seoDataModel = SeoData::find()->where(['page' => 'our_collections'])->one();
        
        $this->seoData["page_title"] = $seoDataModel->page_title;
        $this->seoData["meta_title"] = $seoDataModel->meta_title;
        $this->seoData["meta_description"] = $seoDataModel->meta_description;
        $productList = Products::find()->where(["is_deleted" => 0])->all();

        return $this->render('index', ['productList' => $productList]);
    }


    public function actionOur_products()
    {   

        $seoDataModel = SeoData::find()->where(['page' => 'our_products'])->one();

        
        $this->seoData["page_title"] = $seoDataModel->page_title;
        $this->seoData["meta_title"] = $seoDataModel->meta_title;
        $this->seoData["meta_description"] = $seoDataModel->meta_description;

        $productList = Products::find()->where(['is_deleted' => 0])->all();
        return $this->render('our_products', ['productList' => $productList]);
    }

    public function actionProduct_lists($category)
    {   
        $catModel = Categories::find()->where(['id' => $category])->one();

        $productList = Products::find()->where(['cat_id' => $category ,'is_deleted'=> 0])->all();

        $categoryList = Categories::find()->where(['is_deleted' => 0,'id' => $category])->all();

$prodcount = Products::find()->where(["is_deleted" => 0, 'cat_id' => $category])->count();
        


        return $this->render('product_lists', ['catModel' => $catModel,'productList' => $productList,'prodcount' => $prodcount,'categoryList' => $categoryList]);
    }

     public function actionProduct_details($product)
        {   
         $productModel = Products::find()->where(['search_name' => $product])->one();
         if($productModel == null)
            {
                $this->redirect('no_product');
            }        
            else{
         $prod_Image = ProductsImages::find()->where(['prod_id' => $productModel->id, 'type' => 'Main'])->all();


        $prodimage1 = ProductsImages::find()->where(['prod_id' => $productModel->id])->one();

         $catModel = Categories::findOne($productModel->cat_id);
         //$recipesList = Recipes::fine()->where('cat_id' => $productModel->cat_id)->limit(5)->all();
         
        $productlike = Products::find()->where(['cat_id' => $productModel->id])->one();

         $this->seoData["page_title"] = $productModel->page_title;
         $this->seoData["meta_title"] = $productModel->meta_title;
         $this->seoData["meta_description"] = $productModel->meta_description;

         return $this->render('product_details', ['productModel' => $productModel, 'prod_Image' => $prod_Image, 'catModel' => $catModel,'prodimage1' => $prodimage1]);
            }
        }



        public function actionProductdetails($s)
    {   

$prodModel = Products::find()->where(['url_name' => $s])->one();
 if($prodModel == null)
            {
                $this->redirect('no_project');
            }        
            else{


 $prodimage1 = ProductsImages::find()->where(['prod_id' => $prodModel->id])->one();
  $prod_Image = ProductsImages::find()->where(['prod_id' => $prodModel->id, 'type' => 'Main'])->all();

$prod_Image = ProductsImages::find()->where(['prod_id' => $prodModel->id, 'type' => 'Main'])->one()->prod_image;
 $catModel = Categories::findOne($prodModel->cat_id);
  $productlike = Products::find()->where(['cat_id' => $prodModel->id])->one();
        //$productList = Products::find()->where(['is_deleted' => 0, 'cat_id' => $catModel->id])->all();


        $this->seoData["page_title"] = $catModel->page_title;
        $this->seoData["meta_title"] = $catModel->meta_title;
        $this->seoData["meta_description"] = $catModel->meta_description;


        return $this->render('productdetails', ['prodModel' => $prodModel, 'prod_Image' => $prod_Image, 'catModel' => $catModel,'prodimage1' => $prodimage1]);
      }
    }

    
   


}
