<?php



namespace backend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Query;
use backend\models\Products;
use backend\models\Alert;
use backend\models\ProductsImages;
use backend\models\ProductsColor;
use yii\web\UploadedFile;
use backend\models\Categories;
use yii\helpers\ArrayHelper;
use backend\custom\UtilFunctions;
use yii\imagine\Image;
use Imagine\Image\Box;

class ProductController extends \yii\web\Controller
{

	public $layout = 'inner';
	
	 public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['add',"view","edit","delete","price","update","new"],
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
        $model = new Products();

        $catList = Categories::find()->where(["is_deleted" => 0])->all();
        foreach($catList as $cat)
        {
            $cat->cat_name = $cat->cat_name;
        }
        
        $catList=ArrayHelper::map($catList,'id','cat_name');

        if ($model->load(Yii::$app->request->post())) 
        {  

            $model->added_by = yii::$app->user->identity->id;
            //$model->cat_id = -1;
            
            $model->prod_display_image = UploadedFile::getInstance($model, 'prod_display_image');
            $model->main_image = UploadedFile::getInstances($model, 'main_image');
           

            if($model->validate())
            {
                
                $time = time();

                $model->prod_display_image->saveAs('uploads/displayimage/' . $model->prod_display_image->baseName .'_'.$time.'.' . $model->prod_display_image->extension);
                $model->prod_display_image= $model->prod_display_image->baseName .'_'.$time. '.' . $model->prod_display_image->extension;

                            

                 foreach ($model->main_image as $main_image) 
                {

                $main_image->saveAs('uploads/products/' . $main_image->baseName .'_'.$time.'.' . $main_image->extension);
                $main_image= $main_image->baseName .'_'.$time. '.' . $main_image->extension;
                
                $model->save();
                $prodImageModel = new ProductsImages();
                $prodImageModel->prod_id = $model->id;
                $prodImageModel->prod_image = $main_image;
                $prodImageModel->type = 'Main';

                $prodImageModel->save();


                }


                Yii::$app->getSession()->setFlash('success', [
                    'type' => Alert::TYPE_SUCCESS,
                    'duration' => 5000,
                    'icon' => 'fa fa-user',
                    'message' => 'Product '.$model->prod_name.' has been added successfully',
                    'title' => ''
                ]);

                return $this->redirect('add');
            }

        }

        return $this->render('add',['model' => $model,'catList' => $catList]);
    }

    public function actionView()
    {
        $productsList = Products::find()->where(['is_deleted' => 0])->all();

        return $this->render('view',['productsList' => $productsList]);
    }


    public function actionEdit()
    {
        
        $updateModel = new Products();

        $catList = Categories::find()->where(["is_deleted" => 0])->all();
        $catList=ArrayHelper::map($catList,'id','cat_name');

        if(Yii::$app->request->get('id')) 
        {  
            if($updateModel->load(Yii::$app->request->post()))
            {
                
                $updateModel->prod_display_image = UploadedFile::getInstance($updateModel, 'prod_display_image');
                $updateModel->main_image = UploadedFile::getInstances($updateModel, 'main_image');
                
                 if(!empty($updateModel->prod_display_image)) 
                   {
                    $time = time();

                    $updateModel->prod_display_image->saveAs('uploads/displayimage/' . $updateModel->prod_display_image->baseName .'_'.$time.'.' . $updateModel->prod_display_image->extension);
                    $updateModel->prod_display_image= $updateModel->prod_display_image->baseName .'_'.$time. '.' . $updateModel->prod_display_image->extension;

                    

                    $deletefile = Products::findone(Yii::$app->request->get('id'))->prod_display_image;
                    
                    $serverfilePath = Yii::getAlias('@app/web/uploads/displayimage/'.$deletefile);

                     if(is_file($serverfilePath))
                    {
                        unlink('uploads/displayimage/'.$deletefile);
                       
                    }
                    
                    }
                else
                   {
                         $updateModel->prod_display_image = Products::findone(Yii::$app->request->get('id'))->prod_display_image;
                   }
                   
                   if(!empty($updateModel->main_image)) 
                   {
                    $time = time();
                    
                    $deletefile1 = ProductsImages::find()->where(['prod_id' => Yii::$app->request->get('id')])->all();
                    foreach($deletefile1 as $deletefile1)
                    {
                        $deletefile1->delete();
                     }
                     
                     foreach ($updateModel->main_image as $main_image) 
                {
                    $main_image->saveAs('uploads/products/' . $main_image->baseName .'_'.$time.'.' . $main_image->extension);
                    $main_image= $main_image->baseName .'_'.$time. '.' . $main_image->extension;
                    $prodImageModel = new ProductsImages();
                    $prodImageModel->prod_id = Yii::$app->request->get('id');
                    $prodImageModel->prod_image = $main_image;
                    $prodImageModel->type = 'Main';
                    $prodImageModel->save();
            
                }
                   }
                   else
                   {
                         $updateModel->main_image = ProductsImages::find()->where(['prod_id' => $model->id])->all();
                   }
                   
                   if($updateModel->validate())
                     {
                         
                    $model = Products::findOne(Yii::$app->request->get('id'));
                    $model->prod_name = $updateModel->prod_name;
                    $model->cat_id = $updateModel->cat_id;
                    $model->prod_desc = $updateModel->prod_desc;
                    $model->prod_display_image = $updateModel->prod_display_image;
                    
                    $model->main_image= $updateModel->main_image;
                    
                    $productdel = ProductsImages::find()->where(['prod_id' => $model->id])->all();
                foreach($productdel as $productdel)
                {
                    $productdel->delete();
                }
                
                foreach ($model->main_image as $main_image) 
                {

                $main_image->saveAs('uploads/products/' . $main_image->baseName .'_'.$time.'.' . $main_image->extension);
                $main_image= $main_image->baseName .'_'.$time. '.' . $main_image->extension;
                
                $model->save();
               
                $prodImageModel = new ProductsImages();
                $prodImageModel->prod_id = $model->id;
                $prodImageModel->prod_image = $main_image;
                $prodImageModel->type = 'Main';

                $prodImageModel->save();


                }
                    $model->order_id = $updateModel->order_id;
                    $model->updated_by = yii::$app->user->identity->id;
                    $model->page_title = $updateModel->page_title;
                    $model->meta_title = $updateModel->meta_title;
                    $model->meta_description = $updateModel->meta_description;
                    $model->url_name = $updateModel->url_name;
                    
                    $errors = UtilFunctions::validateModel($model);
                    yii::trace('Model Errors '.$errors);
                    
                    $model->save();
                    
                    Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_SUCCESS,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'Product '.$model->prod_name.' has been updated successfully',
                        'title' => ''
                    ]);
                    
                    return $this->redirect('edit?id='.$model->id);
                    
                     }
                     
                      else
                {
                    $updateModel->id = Yii::$app->request->get('id');



                    return $this->render('edit',['model' => $updateModel,'catList' => $catList, 'productsList' => $productsList]);
                }
            }
            else
            {
                $model = Products::findOne(Yii::$app->request->get('id'));


                return $this->render('edit',['model' => $model,'catList' => $catList]);
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

            $model = Products::findOne(Yii::$app->request->get('id'));
            if($model)
            {

                $model->deleted_by = yii::$app->user->identity->id;
                $model->deleted_date = date("Y-m-d H:i:s");
                $model->is_deleted = 1;
                $model->main_image = 1;

                $model->save();

                Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_SUCCESS,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'Product '.$model->prod_name.' has been deleted successfully',
                        'title' => ''
                    ]);

            }
            else
            {
                Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_DANGER,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'Product Not Found',
                        'title' => ''
                    ]);
            }

            return $this->redirect('view');

        }
    }

    public function actionPrice()

    {
        $colModel = new ProductsColor();
        
        $productsList = Products::find()->where(['is_deleted' => 0])->all();
          

        if (Yii::$app->request->isAjax && $colModel->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($colModel);
        }

        if($colModel->load(Yii::$app->request->post()))
        {
            $colModel->prod_color_image = UploadedFile::getInstance($colModel, 'prod_color_image');

            
            
                
                $time = time();

                $colModel->prod_color_image->saveAs('uploads/colorimage/' . $colModel->prod_color_image->baseName .'_'.$time.'.' . $colModel->prod_color_image->extension);

                $colModel->prod_color_image= $colModel->prod_color_image->baseName .'_'.$time. '.' . $colModel->prod_color_image->extension;

                $colModel->save();

            Yii::$app->getSession()->setFlash('success', [

                'type' => Alert::TYPE_SUCCESS,

                'duration' => 5000,

                'icon' => 'fa fa-user',

                'message' => 'Products Color has been added successfully ',

                'title' => ''

            ]);



            return $this->redirect('view');

        

        

    }
    

        return $this->render('view',['productsList' => $productsList]);

    }


    public function actionUpdate()
    {
       
        
        if(Yii::$app->request->get('id'))
        {
            $model = Products::findOne(Yii::$app->request->get('id'));
            if($model)
            {
                if($model->prod_latest == 1)
                {
                    $model->prod_latest = 0;
                    $model->save();
                }
                else{
                
                     $model->prod_latest = 1;

                     $model->save();
                }

                      Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_SUCCESS,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'Product  has been added as a Featured successfully',
                        'title' => ''
                    ]);
            }

            else
                {
                        Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_DANGER,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'Product Not Found',
                        'title' => ''
                    ]);
                 }

        return $this->redirect('view');
    }

 }

 public function actionNew()
    {
       
        
        if(Yii::$app->request->get('id'))
        {
            $model = Products::findOne(Yii::$app->request->get('id'));
            if($model)
            {
                if($model->prod_new == 1)
                {
                    $model->prod_new = 0;
                    $model->save();
                }
                else{
                
                     $model->prod_new = 1;

                     $model->save();
                }

                      Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_SUCCESS,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'Product  has been added as a New successfully',
                        'title' => ''
                    ]);
            }

            else
                {
                        Yii::$app->getSession()->setFlash('success', [
                        'type' => Alert::TYPE_DANGER,
                        'duration' => 5000,
                        'icon' => 'fa fa-user',
                        'message' => 'Product Not Found',
                        'title' => ''
                    ]);
                 }

        return $this->redirect('view');
    }

 }
    

}
