<?php







namespace backend\controllers;



use Yii;

use yii\filters\VerbFilter;

use yii\filters\AccessControl;

use yii\db\Query;

use backend\custom\UtilFunctions;

use backend\models\Filters;

use backend\models\ChefOfTheYear;

use backend\models\PlannedKitchen;

use backend\models\BestEcoFriendlyKitchen;

use backend\models\BestModernKitchen;

use backend\models\KitchenDisplay;

use backend\models\DesignerKitchen;

use backend\models\BestMenuPlanner;

use backend\models\OpenKitchen;

use backend\models\InstituteOfTheYear;

use backend\models\Contests;

use backend\models\ContestEntries;

use backend\models\FileUploads;

use backend\models\Reports;

use backend\models\Inquiries;

use frontend\models\Users;

use yii\helpers\ArrayHelper;



class ReportController extends \yii\web\Controller

{



	public $layout = 'inner';

	

	 public function behaviors()

    {

        return [

            'access' => [

                'class' => AccessControl::className(),

                'rules' => [

                    [

                        'actions' => ['view','awards','contest'],

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


 public function actionView()
    {
        $inquiriesList = Inquiries::find()->where(['is_deleted'=>0])->all();

        return $this->render('view',['inquiriesList' => $inquiriesList]);
    }


    public function actionAwards()

    {

       

       $model = new Filters();



       if ($model->load(Yii::$app->request->post())) 

       {



            $fromDate = UtilFunctions::convertNormalDateToPhp($model->start_date);

            $toDate = UtilFunctions::convertNormalDateToPhp($model->end_date);



            switch($model->type)

            {

                case 0:



                    $phpExcel = new \PHPExcel();

                    $sheet=0;

      

                    $phpExcel->setActiveSheetIndex($sheet);



                    $phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('R')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('T')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('U')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('V')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('W')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('X')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('AL')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('AM')->setWidth(100);



                    $phpExcel->getActiveSheet()->getStyle('AM')->getAlignment()->setWrapText(true);



                    $phpExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(30);







                    $phpExcel->getActiveSheet()->getStyle('4')->applyFromArray(

                    array(

                            'fill' => array(

                                'type' => \PHPExcel_Style_Fill::FILL_SOLID,

                                'color' => array('rgb' => 'fffd2c')

                            ),

                            'alignment' => array(

                            'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,

                            'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,

                            ),

                            'font' => array(

                                'bold' => true

                            )

                        )

                    );



                     



                    $phpExcel->getActiveSheet()->setTitle("Chef-Of-The-Year-Report")

            

                    ->setCellValue('A4', 'type_of_nomination')

                    ->setCellValue('B4', 'name_of_nominator')

                    ->setCellValue('C4', 'relationship_with_the_chef')

                    ->setCellValue('D4', 'name_of_company')

                    ->setCellValue('E4', 'name_of_branch')

                    ->setCellValue('F4', 'years_worked')

                    ->setCellValue('G4', 'contact_details_mobile')

                    ->setCellValue('H4', 'contact_details_landline')

                    ->setCellValue('I4', 'contact_details_email')

                    ->setCellValue('J4', 'contact_details_address')

                    ->setCellValue('K4', 'contact_details_city')

                    ->setCellValue('L4', 'contact_details_state')

                    ->setCellValue('M4', 'chef_name')

                    ->setCellValue('N4', 'chef_name_of_company')

                    ->setCellValue('O4', 'chef_branch')

                    ->setCellValue('P4', 'chef_type_of_employment')

                    ->setCellValue('Q4', 'chef_position')

                    ->setCellValue('R4', 'people_working_under_chef')

                    ->setCellValue('S4', 'no_of_years_working')

                    ->setCellValue('T4', 'cuisines_specilization')

                    ->setCellValue('U4', 'years_of_experience')

                    ->setCellValue('V4', 'past_achievement_1')

                    ->setCellValue('W4', 'past_achievement_2')

                    ->setCellValue('X4', 'past_achievement_3')

                    ->setCellValue('Y4', 'past_achievement_4')

                    ->setCellValue('Z4', 'past_achievement_5')

                    ->setCellValue('AA4', 'chef_mobile_no')

                    ->setCellValue('AB4', 'chef_office_no')

                    ->setCellValue('AC4', 'chef_email')

                    ->setCellValue('AD4', 'nominator_1_full_name')

                    ->setCellValue('AE4', 'nominator_1_contact_number')

                    ->setCellValue('AF4', 'nominator_1_email')

                    ->setCellValue('AG4', 'nominator_1_designation')

                    ->setCellValue('AH4', 'nominator_2_full_name')

                    ->setCellValue('AI4', 'nominator_2_contact_number')

                    ->setCellValue('AJ4', 'nominator_2_email')

                    ->setCellValue('AK4', 'nominator_2_designation')

                    ->setCellValue('AL4', 'youtube_link')

                    ->setCellValue('AM4', 'file_uploads');





                    $phpExcel->getActiveSheet()

                        ->setCellValue('A1','Report input')

                        ->setCellValue('B1','Start Date')

                        ->setCellValue('C1','End Date')

                        ->setCellValue('B2', $model->start_date)

                        ->setCellValue('C2', $model->end_date);



                   



                    $dataModels = ChefOfTheYear::find()

                    ->where(['>=','created_date', $fromDate.' 00:00:00'])

                    ->andWhere(['<=','created_date',$toDate.' 23:59:59'])

                    ->all();



                    

                    $lfcr = chr(10) . chr(13);



                    $sr = 4;



                    foreach($dataModels as $data)

                    {

                        $sr = $sr + 1;





                        $fileUploadModels = FileUploads::find()->where(['type' => 'chef_of_the_year', 'type_id' => $data->id])->all();



                        $uploadsStr = '';



                        foreach($fileUploadModels as $file)

                        {

                            $fileName = $file->file_name;

                            $filePath = yii::$app->params['frontDomain'].'web/uploads/files/'.$file->actual_file;



                            $uploadsStr = $uploadsStr . $fileName . ': '.$filePath. $lfcr;

                        }

                       

                        $phpExcel->getActiveSheet()

                        ->setCellValue('A'.($sr), $data->type_of_nomination)

                        ->setCellValue('B'.($sr), $data->name_of_nominator)

                        ->setCellValue('C'.($sr), $data->relationship_with_the_chef)

                        ->setCellValue('D'.($sr), $data->name_of_company)

                        ->setCellValue('E'.($sr), $data->name_of_branch)

                        ->setCellValue('F'.($sr), $data->years_worked)

                        ->setCellValue('G'.($sr), $data->contact_details_mobile)

                        ->setCellValue('H'.($sr), $data->contact_details_landline)

                        ->setCellValue('I'.($sr), $data->contact_details_email)

                        ->setCellValue('J'.($sr), $data->contact_details_address)

                        ->setCellValue('K'.($sr), $data->contact_details_city)

                        ->setCellValue('L'.($sr), $data->contact_details_state)

                        ->setCellValue('M'.($sr), $data->chef_name)

                        ->setCellValue('N'.($sr), $data->chef_name_of_company)

                        ->setCellValue('O'.($sr), $data->chef_branch)

                        ->setCellValue('P'.($sr), $data->chef_type_of_employment)

                        ->setCellValue('Q'.($sr), $data->chef_position)

                        ->setCellValue('R'.($sr), $data->people_working_under_chef)

                        ->setCellValue('S'.($sr), $data->no_of_years_working)

                        ->setCellValue('T'.($sr), $data->cuisines_specilization)

                        ->setCellValue('U'.($sr), $data->years_of_experience)

                        ->setCellValue('V'.($sr), $data->past_achievement_1)

                        ->setCellValue('W'.($sr), $data->past_achievement_2)

                        ->setCellValue('X'.($sr), $data->past_achievement_3)

                        ->setCellValue('Y'.($sr), $data->past_achievement_4)

                        ->setCellValue('Z'.($sr), $data->past_achievement_5)

                        ->setCellValue('AA'.($sr), $data->chef_mobile_no)

                        ->setCellValue('AB'.($sr), $data->chef_office_no)

                        ->setCellValue('AC'.($sr), $data->chef_email)

                        ->setCellValue('AD'.($sr), $data->nominator_1_full_name)

                        ->setCellValue('AE'.($sr), $data->nominator_1_contact_number)

                        ->setCellValue('AF'.($sr), $data->nominator_1_email)

                        ->setCellValue('AG'.($sr), $data->nominator_1_designation)

                        ->setCellValue('AH'.($sr), $data->nominator_2_full_name)

                        ->setCellValue('AI'.($sr), $data->nominator_2_contact_number)

                        ->setCellValue('Aj'.($sr), $data->nominator_2_email)

                        ->setCellValue('AK'.($sr), $data->nominator_2_designation)

                        ->setCellValue('AL'.($sr), $data->youtube_link)

                        ->setCellValue('AM'.($sr), $uploadsStr);



                    }



                    //$phpExcel->getActiveSheet()->getStyle('AM')->getAlignment()->setWrapText(true);



                    $objWriter = \PHPExcel_IOFactory::createWriter($phpExcel, 'Excel5');



                    header('Content-Type: application/vnd.ms-excel');

                    $filename = "Chef Of The Year Report-".$model->start_date.'-to-'.$model->end_date.".xls";

                    header('Content-Disposition: attachment;filename='.$filename);

                    header('Cache-Control: max-age=0');

                    

                      



                    $objWriter->save('php://output');



                break;



                case 1:



                    $phpExcel = new \PHPExcel();

                    $sheet=0;

      

                    $phpExcel->setActiveSheetIndex($sheet);



                    $phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('R')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('T')->setWidth(100);



                    $phpExcel->getActiveSheet()->getStyle('T')->getAlignment()->setWrapText(true);



                    $phpExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(30);







                    $phpExcel->getActiveSheet()->getStyle('4')->applyFromArray(

                    array(

                            'fill' => array(

                                'type' => \PHPExcel_Style_Fill::FILL_SOLID,

                                'color' => array('rgb' => 'fffd2c')

                            ),

                            'alignment' => array(

                            'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,

                            'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,

                            ),

                            'font' => array(

                                'bold' => true

                            )

                        )

                    );



                     



                    $phpExcel->getActiveSheet()->setTitle("Planned-Kitchen-Report")

            

                    ->setCellValue('A4', 'name_of_builder')

                    ->setCellValue('B4', 'name_of_organization')

                    ->setCellValue('C4', 'head_office_city')

                    ->setCellValue('D4', 'head_office_pincode')

                    ->setCellValue('E4', 'head_office_state')

                    ->setCellValue('F4', 'head_office_website')

                    ->setCellValue('G4', 'mobile_number')

                    ->setCellValue('H4', 'email_id')

                    ->setCellValue('I4', 'size')

                    ->setCellValue('J4', 'nature')

                    ->setCellValue('K4', 'capacity')

                    ->setCellValue('L4', 'type')

                    ->setCellValue('M4', 'speciality')

                    ->setCellValue('N4', 'days_taken')

                    ->setCellValue('O4', 'design_and_layout')

                    ->setCellValue('P4', 'cabinetry_and_storage_space')

                    ->setCellValue('Q4', 'flooring')

                    ->setCellValue('R4', 'safety_measures')

                    ->setCellValue('S4', 'unique_factor')

                    ->setCellValue('T4', 'files_upload');





                    $phpExcel->getActiveSheet()

                        ->setCellValue('A1','Report input')

                        ->setCellValue('B1','Start Date')

                        ->setCellValue('C1','End Date')

                        ->setCellValue('B2', $model->start_date)

                        ->setCellValue('C2', $model->end_date);



                   



                    $dataModels = PlannedKitchen::find()

                    ->where(['>=','created_date', $fromDate.' 00:00:00'])

                    ->andWhere(['<=','created_date',$toDate.' 23:59:59'])

                    ->all();



                    

                    $lfcr = chr(10) . chr(13);



                    $sr = 4;



                    foreach($dataModels as $data)

                    {

                        $sr = $sr + 1;





                        $fileUploadModels = FileUploads::find()->where(['type' => 'planned_kitchen', 'type_id' => $data->id])->all();



                        $uploadsStr = '';



                        foreach($fileUploadModels as $file)

                        {

                            $fileName = $file->file_name;

                            $filePath = yii::$app->params['frontDomain'].'web/uploads/files/'.$file->actual_file;



                            $uploadsStr = $uploadsStr . $fileName . ': '.$filePath. $lfcr;

                        }

                    



                        $phpExcel->getActiveSheet()

                        ->setCellValue('A'.($sr), $data->name_of_builder)

                        ->setCellValue('B'.($sr), $data->name_of_organization)

                        ->setCellValue('C'.($sr), $data->head_office_city)

                        ->setCellValue('D'.($sr), $data->head_office_pincode)

                        ->setCellValue('E'.($sr), $data->head_office_state)

                        ->setCellValue('F'.($sr), $data->head_office_website)

                        ->setCellValue('G'.($sr), $data->mobile_number)

                        ->setCellValue('H'.($sr), $data->email_id)

                        ->setCellValue('I'.($sr), $data->size)

                        ->setCellValue('J'.($sr), $data->nature)

                        ->setCellValue('K'.($sr), $data->capacity)

                        ->setCellValue('L'.($sr), $data->type)

                        ->setCellValue('M'.($sr), $data->speciality)

                        ->setCellValue('N'.($sr), $data->days_taken)

                        ->setCellValue('O'.($sr), $data->design_and_layout)

                        ->setCellValue('P'.($sr), $data->cabinetry_and_storage_space)

                        ->setCellValue('Q'.($sr), $data->flooring)

                        ->setCellValue('R'.($sr), $data->safety_measures)

                        ->setCellValue('S'.($sr), $data->unique_factor)

                        ->setCellValue('T'.($sr), $uploadsStr);



                    }



                    //$phpExcel->getActiveSheet()->getStyle('AM')->getAlignment()->setWrapText(true);



                    $objWriter = \PHPExcel_IOFactory::createWriter($phpExcel, 'Excel5');



                    header('Content-Type: application/vnd.ms-excel');

                    $filename = "Planned Kitchen Report-".$model->start_date.'-to-'.$model->end_date.".xls";

                    header('Content-Disposition: attachment;filename='.$filename);

                    header('Cache-Control: max-age=0');

                    

                      



                    $objWriter->save('php://output');



                break;



                case 2:



                    $phpExcel = new \PHPExcel();

                    $sheet=0;

      

                    $phpExcel->setActiveSheetIndex($sheet);



                    $phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(100);



                    $phpExcel->getActiveSheet()->getStyle('Q')->getAlignment()->setWrapText(true);



                    $phpExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(30);







                    $phpExcel->getActiveSheet()->getStyle('4')->applyFromArray(

                    array(

                            'fill' => array(

                                'type' => \PHPExcel_Style_Fill::FILL_SOLID,

                                'color' => array('rgb' => 'fffd2c')

                            ),

                            'alignment' => array(

                            'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,

                            'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,

                            ),

                            'font' => array(

                                'bold' => true

                            )

                        )

                    );



                     



                    $phpExcel->getActiveSheet()->setTitle("Best-Eco-Friendly-Kitchen")

            

                    ->setCellValue('A4', 'name')

                    ->setCellValue('B4', 'hotel')

                    ->setCellValue('C4', 'city')

                    ->setCellValue('D4', 'pincode')

                    ->setCellValue('E4', 'state')

                    ->setCellValue('F4', 'website')

                    ->setCellValue('G4', 'mobile_no')

                    ->setCellValue('H4', 'email_id')

                    ->setCellValue('I4', 'capacity')

                    ->setCellValue('J4', 'area')

                    ->setCellValue('K4', 'no_of_employees')

                    ->setCellValue('L4', 'annaul_carbon_footprint')

                    ->setCellValue('M4', 'creativity_and_innovation')

                    ->setCellValue('N4', 'unique_factors')

                    ->setCellValue('O4', 'energy_efficiency')

                    ->setCellValue('P4', 'youtube_link')

                    ->setCellValue('Q4', 'files_upload');





                    $phpExcel->getActiveSheet()

                        ->setCellValue('A1','Report input')

                        ->setCellValue('B1','Start Date')

                        ->setCellValue('C1','End Date')

                        ->setCellValue('B2', $model->start_date)

                        ->setCellValue('C2', $model->end_date);



                   



                    $dataModels = BestEcoFriendlyKitchen::find()

                    ->where(['>=','created_date', $fromDate.' 00:00:00'])

                    ->andWhere(['<=','created_date',$toDate.' 23:59:59'])

                    ->all();



                    

                    $lfcr = chr(10) . chr(13);



                    $sr = 4;



                    foreach($dataModels as $data)

                    {

                        $sr = $sr + 1;





                        $fileUploadModels = FileUploads::find()->where(['type' => 'best_eco_friendly_kitchen', 'type_id' => $data->id])->all();



                        $uploadsStr = '';



                        foreach($fileUploadModels as $file)

                        {

                            $fileName = $file->file_name;

                            $filePath = yii::$app->params['frontDomain'].'web/uploads/files/'.$file->actual_file;



                            $uploadsStr = $uploadsStr . $fileName . ': '.$filePath. $lfcr;

                        }



                        $phpExcel->getActiveSheet()

                        ->setCellValue('A'.($sr), $data->name)

                        ->setCellValue('B'.($sr), $data->hotel)

                        ->setCellValue('C'.($sr), $data->city)

                        ->setCellValue('D'.($sr), $data->pincode)

                        ->setCellValue('E'.($sr), $data->state)

                        ->setCellValue('F'.($sr), $data->website)

                        ->setCellValue('G'.($sr), $data->mobile_no)

                        ->setCellValue('H'.($sr), $data->email_id)

                        ->setCellValue('I'.($sr), $data->capacity)

                        ->setCellValue('J'.($sr), $data->area)

                        ->setCellValue('K'.($sr), $data->no_of_employees)

                        ->setCellValue('L'.($sr), $data->annaul_carbon_footprint)

                        ->setCellValue('M'.($sr), $data->creativity_and_innovation)

                        ->setCellValue('N'.($sr), $data->unique_factors)

                        ->setCellValue('O'.($sr), $data->energy_efficiency)

                        ->setCellValue('P'.($sr), $data->youtube_link)

                        ->setCellValue('Q'.($sr), $uploadsStr);



                    }



                    //$phpExcel->getActiveSheet()->getStyle('AM')->getAlignment()->setWrapText(true);



                    $objWriter = \PHPExcel_IOFactory::createWriter($phpExcel, 'Excel5');



                    header('Content-Type: application/vnd.ms-excel');

                    $filename = "Best Eco Friendly Kitchen Report-".$model->start_date.'-to-'.$model->end_date.".xls";

                    header('Content-Disposition: attachment;filename='.$filename);

                    header('Cache-Control: max-age=0');

                    

                      



                    $objWriter->save('php://output');



                break;



                case 3:



                    $phpExcel = new \PHPExcel();

                    $sheet=0;

      

                    $phpExcel->setActiveSheetIndex($sheet);



                    $phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('R')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('T')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('U')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('V')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('W')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('X')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(100);



                    $phpExcel->getActiveSheet()->getStyle('AG')->getAlignment()->setWrapText(true);



                    $phpExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(30);







                    $phpExcel->getActiveSheet()->getStyle('4')->applyFromArray(

                    array(

                            'fill' => array(

                                'type' => \PHPExcel_Style_Fill::FILL_SOLID,

                                'color' => array('rgb' => 'fffd2c')

                            ),

                            'alignment' => array(

                            'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,

                            'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,

                            ),

                            'font' => array(

                                'bold' => true

                            )

                        )

                    );



                     



                    $phpExcel->getActiveSheet()->setTitle("Best-Modern-Kitchen-Report")

            

                    ->setCellValue('A4', 'name')

                    ->setCellValue('B4', 'location')

                    ->setCellValue('C4', 'organization_name')

                    ->setCellValue('D4', 'city')

                    ->setCellValue('E4', 'pincode')

                    ->setCellValue('F4', 'state')

                    ->setCellValue('G4', 'website')

                    ->setCellValue('H4', 'mobile_no')

                    ->setCellValue('I4', 'email_id')

                    ->setCellValue('J4', 'size')

                    ->setCellValue('K4', 'capacity')

                    ->setCellValue('L4', 'type')

                    ->setCellValue('M4', 'equipment_1_name')

                    ->setCellValue('N4', 'equipment_1_hours_saved')

                    ->setCellValue('O4', 'equipment_1_example')

                    ->setCellValue('P4', 'equipment_2_name')

                    ->setCellValue('Q4', 'equipment_2_hours_saved')

                    ->setCellValue('R4', 'equipment_2_example')

                    ->setCellValue('S4', 'equipment_3_name')

                    ->setCellValue('T4', 'equipment_3_hours_saved')

                    ->setCellValue('U4', 'equipment_3_example')

                    ->setCellValue('V4', 'equipment_4_name')

                    ->setCellValue('W4', 'equipment_4_hours_saved')

                    ->setCellValue('X4', 'equipment_4_example')

                    ->setCellValue('Y4', 'equipment_5_name')

                    ->setCellValue('Z4', 'equipment_5_hours_saved')

                    ->setCellValue('AA4', 'equipment_5_example')

                    ->setCellValue('AB4', 'creativity')

                    ->setCellValue('AC4', 'x_factor')

                    ->setCellValue('AD4', 'energy_efficiency')

                    ->setCellValue('AE4', 'aesthetics')

                    ->setCellValue('AF4', 'youtube_link')

                    ->setCellValue('AG4', 'file_uploads');





                    $phpExcel->getActiveSheet()

                        ->setCellValue('A1','Report input')

                        ->setCellValue('B1','Start Date')

                        ->setCellValue('C1','End Date')

                        ->setCellValue('B2', $model->start_date)

                        ->setCellValue('C2', $model->end_date);



                   



                    $dataModels = BestModernKitchen::find()

                    ->where(['>=','created_date', $fromDate.' 00:00:00'])

                    ->andWhere(['<=','created_date',$toDate.' 23:59:59'])

                    ->all();



                    

                    $lfcr = chr(10) . chr(13);



                    $sr = 4;



                    foreach($dataModels as $data)

                    {

                        $sr = $sr + 1;





                        $fileUploadModels = FileUploads::find()->where(['type' => 'best_modern_kitchen', 'type_id' => $data->id])->all();



                        $uploadsStr = '';



                        foreach($fileUploadModels as $file)

                        {

                            $fileName = $file->file_name;

                            $filePath = yii::$app->params['frontDomain'].'web/uploads/files/'.$file->actual_file;



                            $uploadsStr = $uploadsStr . $fileName . ': '.$filePath. $lfcr;

                        }

                       





                        $phpExcel->getActiveSheet()

                        ->setCellValue('A'.($sr), $data->name)

                        ->setCellValue('B'.($sr), $data->location)

                        ->setCellValue('C'.($sr), $data->organization_name)

                        ->setCellValue('D'.($sr), $data->city)

                        ->setCellValue('E'.($sr), $data->pincode)

                        ->setCellValue('F'.($sr), $data->state)

                        ->setCellValue('G'.($sr), $data->website)

                        ->setCellValue('H'.($sr), $data->mobile_no)

                        ->setCellValue('I'.($sr), $data->email_id)

                        ->setCellValue('J'.($sr), $data->size)

                        ->setCellValue('K'.($sr), $data->capacity)

                        ->setCellValue('L'.($sr), $data->type)

                        ->setCellValue('M'.($sr), $data->equipment_1_name)

                        ->setCellValue('N'.($sr), $data->equipment_1_hours_saved)

                        ->setCellValue('O'.($sr), $data->equipment_1_example)

                        ->setCellValue('P'.($sr), $data->equipment_2_name)

                        ->setCellValue('Q'.($sr), $data->equipment_2_hours_saved)

                        ->setCellValue('R'.($sr), $data->equipment_2_example)

                        ->setCellValue('S'.($sr), $data->equipment_3_name)

                        ->setCellValue('T'.($sr), $data->equipment_3_hours_saved)

                        ->setCellValue('U'.($sr), $data->equipment_3_example)

                        ->setCellValue('V'.($sr), $data->equipment_4_name)

                        ->setCellValue('W'.($sr), $data->equipment_4_hours_saved)

                        ->setCellValue('X'.($sr), $data->equipment_4_example)

                        ->setCellValue('Y'.($sr), $data->equipment_5_name)

                        ->setCellValue('Z'.($sr), $data->equipment_5_hours_saved)

                        ->setCellValue('AA'.($sr), $data->equipment_5_example)

                        ->setCellValue('AB'.($sr), $data->creativity)

                        ->setCellValue('AC'.($sr), $data->x_factor)

                        ->setCellValue('AD'.($sr), $data->energy_efficiency)

                        ->setCellValue('AE'.($sr), $data->aesthetics)

                        ->setCellValue('AF'.($sr), $data->youtube_link)

                        ->setCellValue('AG'.($sr), $uploadsStr);



                    }



                    //$phpExcel->getActiveSheet()->getStyle('AM')->getAlignment()->setWrapText(true);



                    $objWriter = \PHPExcel_IOFactory::createWriter($phpExcel, 'Excel5');



                    header('Content-Type: application/vnd.ms-excel');

                    $filename = "Best Modern Kitchen Report-".$model->start_date.'-to-'.$model->end_date.".xls";

                    header('Content-Disposition: attachment;filename='.$filename);

                    header('Cache-Control: max-age=0');

                    

                      



                    $objWriter->save('php://output');



                break;



                case 4:



                    $phpExcel = new \PHPExcel();

                    $sheet=0;

      

                    $phpExcel->setActiveSheetIndex($sheet);



                    $phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('R')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('T')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('U')->setWidth(100);



                    $phpExcel->getActiveSheet()->getStyle('U')->getAlignment()->setWrapText(true);



                    $phpExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(30);







                    $phpExcel->getActiveSheet()->getStyle('4')->applyFromArray(

                    array(

                            'fill' => array(

                                'type' => \PHPExcel_Style_Fill::FILL_SOLID,

                                'color' => array('rgb' => 'fffd2c')

                            ),

                            'alignment' => array(

                            'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,

                            'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,

                            ),

                            'font' => array(

                                'bold' => true

                            )

                        )

                    );



                     



                    $phpExcel->getActiveSheet()->setTitle("Kitchen-Display-Report")

            

                    ->setCellValue('A4', 'name')

                    ->setCellValue('B4', 'organization_name')

                    ->setCellValue('C4', 'city')

                    ->setCellValue('D4', 'pincode')

                    ->setCellValue('E4', 'state')

                    ->setCellValue('F4', 'website')

                    ->setCellValue('G4', 'mobile_no')

                    ->setCellValue('H4', 'email_id')

                    ->setCellValue('I4', 'name_of_retail_showroom')

                    ->setCellValue('J4', 'store_mobile_no')

                    ->setCellValue('K4', 'store_email_id')

                    ->setCellValue('L4', 'size')

                    ->setCellValue('M4', 'type')

                    ->setCellValue('N4', 'speciality')

                    ->setCellValue('O4', 'days_taken')

                    ->setCellValue('P4', 'revenue')

                    ->setCellValue('Q4', 'visual_appearance')

                    ->setCellValue('R4', 'theme')

                    ->setCellValue('S4', 'store_layout')

                    ->setCellValue('T4', 'youtube_link')

                    ->setCellValue('U4', 'file_uploads');





                    $phpExcel->getActiveSheet()

                        ->setCellValue('A1','Report input')

                        ->setCellValue('B1','Start Date')

                        ->setCellValue('C1','End Date')

                        ->setCellValue('B2', $model->start_date)

                        ->setCellValue('C2', $model->end_date);



                   



                    $dataModels = KitchenDisplay::find()

                    ->where(['>=','created_date', $fromDate.' 00:00:00'])

                    ->andWhere(['<=','created_date',$toDate.' 23:59:59'])

                    ->all();



                    

                    $lfcr = chr(10) . chr(13);



                    $sr = 4;



                    foreach($dataModels as $data)

                    {

                        $sr = $sr + 1;





                        $fileUploadModels = FileUploads::find()->where(['type' => 'kitchen_display', 'type_id' => $data->id])->all();



                        $uploadsStr = '';



                        foreach($fileUploadModels as $file)

                        {

                            $fileName = $file->file_name;

                            $filePath = yii::$app->params['frontDomain'].'web/uploads/files/'.$file->actual_file;



                            $uploadsStr = $uploadsStr . $fileName . ': '.$filePath. $lfcr;

                        }





                        $phpExcel->getActiveSheet()

                        ->setCellValue('A'.($sr), $data->name)

                        ->setCellValue('B'.($sr), $data->organization_name)

                        ->setCellValue('C'.($sr), $data->city)

                        ->setCellValue('D'.($sr), $data->pincode)

                        ->setCellValue('E'.($sr), $data->state)

                        ->setCellValue('F'.($sr), $data->website)

                        ->setCellValue('G'.($sr), $data->mobile_no)

                        ->setCellValue('H'.($sr), $data->email_id)

                        ->setCellValue('I'.($sr), $data->name_of_retail_showroom)

                        ->setCellValue('J'.($sr), $data->store_mobile_no)

                        ->setCellValue('K'.($sr), $data->store_email_id)

                        ->setCellValue('L'.($sr), $data->size)

                        ->setCellValue('M'.($sr), $data->type)

                        ->setCellValue('N'.($sr), $data->speciality)

                        ->setCellValue('O'.($sr), $data->days_taken)

                        ->setCellValue('P'.($sr), $data->revenue)

                        ->setCellValue('Q'.($sr), $data->visual_appearance)

                        ->setCellValue('R'.($sr), $data->theme)

                        ->setCellValue('S'.($sr), $data->store_layout)

                        ->setCellValue('T'.($sr), $data->youtube_link)

                        ->setCellValue('U'.($sr), $uploadsStr);



                    }



                    //$phpExcel->getActiveSheet()->getStyle('AM')->getAlignment()->setWrapText(true);



                    $objWriter = \PHPExcel_IOFactory::createWriter($phpExcel, 'Excel5');



                    header('Content-Type: application/vnd.ms-excel');

                    $filename = "Kitchen Display Report-".$model->start_date.'-to-'.$model->end_date.".xls";

                    header('Content-Disposition: attachment;filename='.$filename);

                    header('Cache-Control: max-age=0');

                    

                      



                    $objWriter->save('php://output');



                break;



                case 5:



                    $phpExcel = new \PHPExcel();

                    $sheet=0;

      

                    $phpExcel->setActiveSheetIndex($sheet);



                    $phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('R')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('T')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('U')->setWidth(100);



                    $phpExcel->getActiveSheet()->getStyle('U')->getAlignment()->setWrapText(true);



                    $phpExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(30);







                    $phpExcel->getActiveSheet()->getStyle('4')->applyFromArray(

                    array(

                            'fill' => array(

                                'type' => \PHPExcel_Style_Fill::FILL_SOLID,

                                'color' => array('rgb' => 'fffd2c')

                            ),

                            'alignment' => array(

                            'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,

                            'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,

                            ),

                            'font' => array(

                                'bold' => true

                            )

                        )

                    );



                     



                    $phpExcel->getActiveSheet()->setTitle("Designer-Kitchen-Report")

            

                    ->setCellValue('A4', 'name_of_property')

                    ->setCellValue('B4', 'name_of_organization')

                    ->setCellValue('C4', 'city')

                    ->setCellValue('D4', 'pincode')

                    ->setCellValue('E4', 'state')

                    ->setCellValue('F4', 'website')

                    ->setCellValue('G4', 'mobile_no')

                    ->setCellValue('H4', 'email_id')

                    ->setCellValue('I4', 'size')

                    ->setCellValue('J4', 'nature')

                    ->setCellValue('K4', 'capacity')

                    ->setCellValue('L4', 'type')

                    ->setCellValue('M4', 'speciality')

                    ->setCellValue('N4', 'days_taken')

                    ->setCellValue('O4', 'desgin')

                    ->setCellValue('P4', 'cabinetry')

                    ->setCellValue('Q4', 'flooring')

                    ->setCellValue('R4', 'safety')

                    ->setCellValue('S4', 'unique')

                    ->setCellValue('T4', 'budget')

                    ->setCellValue('U4', 'file_uploads');





                    $phpExcel->getActiveSheet()

                        ->setCellValue('A1','Report input')

                        ->setCellValue('B1','Start Date')

                        ->setCellValue('C1','End Date')

                        ->setCellValue('B2', $model->start_date)

                        ->setCellValue('C2', $model->end_date);



                   



                    $dataModels = DesignerKitchen::find()

                    ->where(['>=','created_date', $fromDate.' 00:00:00'])

                    ->andWhere(['<=','created_date',$toDate.' 23:59:59'])

                    ->all();



                    

                    $lfcr = chr(10) . chr(13);



                    $sr = 4;



                    foreach($dataModels as $data)

                    {

                        $sr = $sr + 1;





                        $fileUploadModels = FileUploads::find()->where(['type' => 'designer_kitchen', 'type_id' => $data->id])->all();



                        $uploadsStr = '';



                        foreach($fileUploadModels as $file)

                        {

                            $fileName = $file->file_name;

                            $filePath = yii::$app->params['frontDomain'].'web/uploads/files/'.$file->actual_file;



                            $uploadsStr = $uploadsStr . $fileName . ': '.$filePath. $lfcr;

                        }



                        $phpExcel->getActiveSheet()

                        ->setCellValue('A'.($sr), $data->name_of_property)

                        ->setCellValue('B'.($sr), $data->name_of_organization)

                        ->setCellValue('C'.($sr), $data->city)

                        ->setCellValue('D'.($sr), $data->pincode)

                        ->setCellValue('E'.($sr), $data->state)

                        ->setCellValue('F'.($sr), $data->website)

                        ->setCellValue('G'.($sr), $data->mobile_no)

                        ->setCellValue('H'.($sr), $data->email_id)

                        ->setCellValue('I'.($sr), $data->size)

                        ->setCellValue('J'.($sr), $data->nature)

                        ->setCellValue('K'.($sr), $data->capacity)

                        ->setCellValue('L'.($sr), $data->type)

                        ->setCellValue('M'.($sr), $data->speciality)

                        ->setCellValue('N'.($sr), $data->days_taken)

                        ->setCellValue('O'.($sr), $data->desgin)

                        ->setCellValue('P'.($sr), $data->cabinetry)

                        ->setCellValue('Q'.($sr), $data->flooring)

                        ->setCellValue('R'.($sr), $data->safety)

                        ->setCellValue('S'.($sr), $data->unique)

                        ->setCellValue('T'.($sr), $data->budget)

                        ->setCellValue('U'.($sr), $uploadsStr);



                    }



                    //$phpExcel->getActiveSheet()->getStyle('AM')->getAlignment()->setWrapText(true);



                    $objWriter = \PHPExcel_IOFactory::createWriter($phpExcel, 'Excel5');



                    header('Content-Type: application/vnd.ms-excel');

                    $filename = "Designer Kitchen Report-".$model->start_date.'-to-'.$model->end_date.".xls";

                    header('Content-Disposition: attachment;filename='.$filename);

                    header('Cache-Control: max-age=0');

                    

                      



                    $objWriter->save('php://output');



                break;



                case 6:



                    $phpExcel = new \PHPExcel();

                    $sheet=0;

      

                    $phpExcel->setActiveSheetIndex($sheet);



                    $phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('O')->setWidth(100);



                    $phpExcel->getActiveSheet()->getStyle('O')->getAlignment()->setWrapText(true);



                    $phpExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(30);







                    $phpExcel->getActiveSheet()->getStyle('4')->applyFromArray(

                    array(

                            'fill' => array(

                                'type' => \PHPExcel_Style_Fill::FILL_SOLID,

                                'color' => array('rgb' => 'fffd2c')

                            ),

                            'alignment' => array(

                            'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,

                            'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,

                            ),

                            'font' => array(

                                'bold' => true

                            )

                        )

                    );



                     



                    $phpExcel->getActiveSheet()->setTitle("Best-Menu-Planner-Report")

            

                    ->setCellValue('A4', 'name_of_participant')

                    ->setCellValue('B4', 'name_of_organization')

                    ->setCellValue('C4', 'city')

                    ->setCellValue('D4', 'pincode')

                    ->setCellValue('E4', 'state')

                    ->setCellValue('F4', 'website')

                    ->setCellValue('G4', 'mobile_no')

                    ->setCellValue('H4', 'email_id')

                    ->setCellValue('I4', 'experience')

                    ->setCellValue('J4', 'no_of_years_working')

                    ->setCellValue('K4', 'menu_appearance')

                    ->setCellValue('L4', 'health_factor')

                    ->setCellValue('M4', 'price_quotient')

                    ->setCellValue('N4', 'unique_factor')

                    ->setCellValue('O4', 'file_uploads');





                    $phpExcel->getActiveSheet()

                        ->setCellValue('A1','Report input')

                        ->setCellValue('B1','Start Date')

                        ->setCellValue('C1','End Date')

                        ->setCellValue('B2', $model->start_date)

                        ->setCellValue('C2', $model->end_date);



                   



                    $dataModels = BestMenuPlanner::find()

                    ->where(['>=','created_date', $fromDate.' 00:00:00'])

                    ->andWhere(['<=','created_date',$toDate.' 23:59:59'])

                    ->all();



                    

                    $lfcr = chr(10) . chr(13);



                    $sr = 4;



                    foreach($dataModels as $data)

                    {

                        $sr = $sr + 1;





                        $fileUploadModels = FileUploads::find()->where(['type' => 'best_menu_planner', 'type_id' => $data->id])->all();



                        $uploadsStr = '';



                        foreach($fileUploadModels as $file)

                        {

                            $fileName = $file->file_name;

                            $filePath = yii::$app->params['frontDomain'].'web/uploads/files/'.$file->actual_file;



                            $uploadsStr = $uploadsStr . $fileName . ': '.$filePath. $lfcr;

                        }



                        $phpExcel->getActiveSheet()

                        ->setCellValue('A'.($sr), $data->name_of_participant)

                        ->setCellValue('B'.($sr), $data->name_of_organization)

                        ->setCellValue('C'.($sr), $data->city)

                        ->setCellValue('D'.($sr), $data->pincode)

                        ->setCellValue('E'.($sr), $data->state)

                        ->setCellValue('F'.($sr), $data->website)

                        ->setCellValue('G'.($sr), $data->mobile_no)

                        ->setCellValue('H'.($sr), $data->email_id)

                        ->setCellValue('I'.($sr), $data->experience)

                        ->setCellValue('J'.($sr), $data->no_of_years_working)

                        ->setCellValue('K'.($sr), $data->menu_appearance)

                        ->setCellValue('L'.($sr), $data->health_factor)

                        ->setCellValue('M'.($sr), $data->price_quotient)

                        ->setCellValue('N'.($sr), $data->unique_factor)

                        ->setCellValue('O'.($sr), $uploadsStr);



                    }



                    //$phpExcel->getActiveSheet()->getStyle('AM')->getAlignment()->setWrapText(true);



                    $objWriter = \PHPExcel_IOFactory::createWriter($phpExcel, 'Excel5');



                    header('Content-Type: application/vnd.ms-excel');

                    $filename = "Best Menu Planner Report-".$model->start_date.'-to-'.$model->end_date.".xls";

                    header('Content-Disposition: attachment;filename='.$filename);

                    header('Cache-Control: max-age=0');

                    

                      



                    $objWriter->save('php://output');



                break;



                case 7:



                    $phpExcel = new \PHPExcel();

                    $sheet=0;

      

                    $phpExcel->setActiveSheetIndex($sheet);



                    $phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('R')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('T')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('U')->setWidth(100);



                    $phpExcel->getActiveSheet()->getStyle('U')->getAlignment()->setWrapText(true);



                    $phpExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(30);







                    $phpExcel->getActiveSheet()->getStyle('4')->applyFromArray(

                    array(

                            'fill' => array(

                                'type' => \PHPExcel_Style_Fill::FILL_SOLID,

                                'color' => array('rgb' => 'fffd2c')

                            ),

                            'alignment' => array(

                            'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,

                            'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,

                            ),

                            'font' => array(

                                'bold' => true

                            )

                        )

                    );



                     



                    $phpExcel->getActiveSheet()->setTitle("Open Kitchen-Report")

            

                    ->setCellValue('A4', 'name_of_participant')

                    ->setCellValue('B4', 'name_of_organization')

                    ->setCellValue('C4', 'hotel_name')

                    ->setCellValue('D4', 'city')

                    ->setCellValue('E4', 'pincode')

                    ->setCellValue('F4', 'state')

                    ->setCellValue('G4', 'website')

                    ->setCellValue('H4', 'seating_capacity')

                    ->setCellValue('I4', 'restaurant_area')

                    ->setCellValue('J4', 'cuisine')

                    ->setCellValue('K4', 'capacity')

                    ->setCellValue('L4', 'area')

                    ->setCellValue('M4', 'employees')

                    ->setCellValue('N4', 'name_of_kitchen_planner')

                    ->setCellValue('O4', 'structure')

                    ->setCellValue('P4', 'design_and_layout')

                    ->setCellValue('Q4', 'aesthetics')

                    ->setCellValue('R4', 'efficiency')

                    ->setCellValue('S4', 'customer_satisfaction')

                    ->setCellValue('T4', 'youtube_link')

                    ->setCellValue('U4', 'file_uploads');





                    $phpExcel->getActiveSheet()

                        ->setCellValue('A1','Report input')

                        ->setCellValue('B1','Start Date')

                        ->setCellValue('C1','End Date')

                        ->setCellValue('B2', $model->start_date)

                        ->setCellValue('C2', $model->end_date);



                   



                    $dataModels = OpenKitchen::find()

                    ->where(['>=','created_date', $fromDate.' 00:00:00'])

                    ->andWhere(['<=','created_date',$toDate.' 23:59:59'])

                    ->all();



                    

                    $lfcr = chr(10) . chr(13);



                    $sr = 4;



                    foreach($dataModels as $data)

                    {

                        $sr = $sr + 1;





                        $fileUploadModels = FileUploads::find()->where(['type' => 'open_kitchen', 'type_id' => $data->id])->all();



                        $uploadsStr = '';



                        foreach($fileUploadModels as $file)

                        {

                            $fileName = $file->file_name;

                            $filePath = yii::$app->params['frontDomain'].'web/uploads/files/'.$file->actual_file;



                            $uploadsStr = $uploadsStr . $fileName . ': '.$filePath. $lfcr;

                        }



                        $phpExcel->getActiveSheet()

                        ->setCellValue('A'.($sr), $data->name_of_participant)

                        ->setCellValue('B'.($sr), $data->name_of_organization)

                        ->setCellValue('C'.($sr), $data->hotel_name)

                        ->setCellValue('D'.($sr), $data->city)

                        ->setCellValue('E'.($sr), $data->pincode)

                        ->setCellValue('F'.($sr), $data->state)

                        ->setCellValue('G'.($sr), $data->website)

                        ->setCellValue('H'.($sr), $data->seating_capacity)

                        ->setCellValue('I'.($sr), $data->restaurant_area)

                        ->setCellValue('J'.($sr), $data->cuisine)

                        ->setCellValue('K'.($sr), $data->capacity)

                        ->setCellValue('L'.($sr), $data->area)

                        ->setCellValue('M'.($sr), $data->employees)

                        ->setCellValue('N'.($sr), $data->name_of_kitchen_planner)

                        ->setCellValue('O'.($sr), $data->structure)

                        ->setCellValue('P'.($sr), $data->design_and_layout)

                        ->setCellValue('Q'.($sr), $data->aesthetics)

                        ->setCellValue('R'.($sr), $data->efficiency)

                        ->setCellValue('S'.($sr), $data->customer_satisfaction)

                        ->setCellValue('T'.($sr), $data->youtube_link)

                        ->setCellValue('U'.($sr), $uploadsStr);



                    }



                    //$phpExcel->getActiveSheet()->getStyle('AM')->getAlignment()->setWrapText(true);



                    $objWriter = \PHPExcel_IOFactory::createWriter($phpExcel, 'Excel5');



                    header('Content-Type: application/vnd.ms-excel');

                    $filename = "Openn Kitchen Report-".$model->start_date.'-to-'.$model->end_date.".xls";

                    header('Content-Disposition: attachment;filename='.$filename);

                    header('Cache-Control: max-age=0');

                    

                      



                    $objWriter->save('php://output');



                break;



                case 8:



                    $phpExcel = new \PHPExcel();

                    $sheet=0;

      

                    $phpExcel->setActiveSheetIndex($sheet);



                    $phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('R')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('T')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('U')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('V')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('W')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('X')->setWidth(20);

                    $phpExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(100);



                    $phpExcel->getActiveSheet()->getStyle('Y')->getAlignment()->setWrapText(true);



                    $phpExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(30);







                    $phpExcel->getActiveSheet()->getStyle('4')->applyFromArray(

                    array(

                            'fill' => array(

                                'type' => \PHPExcel_Style_Fill::FILL_SOLID,

                                'color' => array('rgb' => 'fffd2c')

                            ),

                            'alignment' => array(

                            'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,

                            'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,

                            ),

                            'font' => array(

                                'bold' => true

                            )

                        )

                    );



                     



                    $phpExcel->getActiveSheet()->setTitle("Best-Institute-Report")

            

                    ->setCellValue('A4', 'institute_name')

                    ->setCellValue('B4', 'address')

                    ->setCellValue('C4', 'date_of_incorporation')

                    ->setCellValue('D4', 'type')

                    ->setCellValue('E4', 'type_other')

                    ->setCellValue('F4', 'level_graduate')

                    ->setCellValue('G4', 'level_post_graduate')

                    ->setCellValue('H4', 'level_research')

                    ->setCellValue('I4', 'level_diploma')

                    ->setCellValue('J4', 'level_other')

                    ->setCellValue('K4', 'level_other_text')

                    ->setCellValue('L4', 'name_of_registrar')

                    ->setCellValue('M4', 'designation')

                    ->setCellValue('N4', 'email_id')

                    ->setCellValue('O4', 'mobile_no')

                    ->setCellValue('P4', 'teacher_quality')

                    ->setCellValue('Q4', 'teacher_motivation')

                    ->setCellValue('R4', 'teacher_availabiity')

                    ->setCellValue('S4', 'curriculum_coursework')

                    ->setCellValue('T4', 'curriculum_design')

                    ->setCellValue('U4', 'infrastructure')

                    ->setCellValue('V4', 'partnership')

                    ->setCellValue('W4', 'awards')

                    ->setCellValue('X4', 'youtube_link')

                    ->setCellValue('Y4', 'file_uploads');





                    $phpExcel->getActiveSheet()

                        ->setCellValue('A1','Report input')

                        ->setCellValue('B1','Start Date')

                        ->setCellValue('C1','End Date')

                        ->setCellValue('B2', $model->start_date)

                        ->setCellValue('C2', $model->end_date);



                   



                    $dataModels = InstituteOfTheYear::find()

                    ->where(['>=','created_date', $fromDate.' 00:00:00'])

                    ->andWhere(['<=','created_date',$toDate.' 23:59:59'])

                    ->all();



                    

                    $lfcr = chr(10) . chr(13);



                    $sr = 4;



                    foreach($dataModels as $data)

                    {

                        $sr = $sr + 1;





                        $fileUploadModels = FileUploads::find()->where(['type' => 'institute_of_the_year', 'type_id' => $data->id])->all();



                        $uploadsStr = '';



                        foreach($fileUploadModels as $file)

                        {

                            $fileName = $file->file_name;

                            $filePath = yii::$app->params['frontDomain'].'web/uploads/files/'.$file->actual_file;



                            $uploadsStr = $uploadsStr . $fileName . ': '.$filePath. $lfcr;

                        }

                       



                        $phpExcel->getActiveSheet()

                        ->setCellValue('A'.($sr), $data->institute_name)

                        ->setCellValue('B'.($sr), $data->address)

                        ->setCellValue('C'.($sr), UtilFunctions::convertPhpToNormalDate($data->date_of_incorporation))

                        ->setCellValue('D'.($sr), $data->type)

                        ->setCellValue('E'.($sr), $data->type_other)

                        ->setCellValue('F'.($sr), $data->level_graduate)

                        ->setCellValue('G'.($sr), $data->level_post_graduate)

                        ->setCellValue('H'.($sr), $data->level_research)

                        ->setCellValue('I'.($sr), $data->level_diploma)

                        ->setCellValue('J'.($sr), $data->level_other)

                        ->setCellValue('K'.($sr), $data->level_other_text)

                        ->setCellValue('L'.($sr), $data->name_of_registrar)

                        ->setCellValue('M'.($sr), $data->designation)

                        ->setCellValue('N'.($sr), $data->email_id)

                        ->setCellValue('O'.($sr), $data->mobile_no)

                        ->setCellValue('P'.($sr), $data->teacher_quality)

                        ->setCellValue('Q'.($sr), $data->teacher_motivation)

                        ->setCellValue('R'.($sr), $data->teacher_availabiity)

                        ->setCellValue('S'.($sr), $data->curriculum_coursework)

                        ->setCellValue('T'.($sr), $data->curriculum_design)

                        ->setCellValue('U'.($sr), $data->infrastructure)

                        ->setCellValue('V'.($sr), $data->partnership)

                        ->setCellValue('W'.($sr), $data->awards)

                        ->setCellValue('X'.($sr), $data->youtube_link)

                        ->setCellValue('Y'.($sr), $uploadsStr);



                    }



                    //$phpExcel->getActiveSheet()->getStyle('AM')->getAlignment()->setWrapText(true);



                    $objWriter = \PHPExcel_IOFactory::createWriter($phpExcel, 'Excel5');



                    header('Content-Type: application/vnd.ms-excel');

                    $filename = "Best Institute Report-".$model->start_date.'-to-'.$model->end_date.".xls";

                    header('Content-Disposition: attachment;filename='.$filename);

                    header('Cache-Control: max-age=0');

                    

                      



                    $objWriter->save('php://output');



                break;

            }



       }

      



        return $this->render('awards',['model' => $model]);

    }





    public function actionContest()

    {

       

       $model = new Filters();



       $contestList = Contests::find()->where(["is_deleted" => 0])->all();

       $contestList= ArrayHelper::map($contestList,'id','title');



       if ($model->load(Yii::$app->request->post())) 

       {



            $fromDate = UtilFunctions::convertNormalDateToPhp($model->start_date);

            $toDate = UtilFunctions::convertNormalDateToPhp($model->end_date);









            $phpExcel = new \PHPExcel();

            $sheet=0;



            $phpExcel->setActiveSheetIndex($sheet);



            $phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);

            $phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);

            $phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);

            $phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);

            $phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(100);



            $phpExcel->getActiveSheet()->getStyle('E')->getAlignment()->setWrapText(true);



            $phpExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(30);







            $phpExcel->getActiveSheet()->getStyle('4')->applyFromArray(

            array(

                    'fill' => array(

                        'type' => \PHPExcel_Style_Fill::FILL_SOLID,

                        'color' => array('rgb' => 'fffd2c')

                    ),

                    'alignment' => array(

                    'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,

                    'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,

                    ),

                    'font' => array(

                        'bold' => true

                    )

                )

            );





            $contestModel = Contests::findOne($model->type);



             $dataModels = ContestEntries::find()

            ->where(['>=','created_date', $fromDate.' 00:00:00'])

            ->andWhere(['<=','created_date',$toDate.' 23:59:59'])

            ->andWhere(['contest_id' => $model->type])

            ->all();





            $phpExcel->getActiveSheet()->setTitle("Contest-Report")

    

            ->setCellValue('A4', 'Name')

            ->setCellValue('B4', 'Mobile No')

            ->setCellValue('C4', 'Email Id')

            ->setCellValue('D4', 'Remarks')

            ->setCellValue('E4', 'Entry Upload');





            $phpExcel->getActiveSheet()

                ->setCellValue('A1','Report input')

                ->setCellValue('B1','Contest Name')

                ->setCellValue('C1',$contestModel->title)

                ->setCellValue('D1','Start Date')

                ->setCellValue('E1','End Date')

                ->setCellValue('D2', $model->start_date)

                ->setCellValue('E2', $model->end_date);



           

            

            $lfcr = chr(10) . chr(13);



            $sr = 4;



            foreach($dataModels as $data)

            {

                $sr = $sr + 1;





                $userModel = Users::findOne($data->added_by);

                $uploadsStr = yii::$app->params['frontDomain'].'web/uploads/files/'.$data->file_upload;



                



                $phpExcel->getActiveSheet()

                ->setCellValue('A'.($sr), $userModel->user_name)

                ->setCellValue('B'.($sr), $userModel->user_mobile)

                ->setCellValue('C'.($sr), $userModel->user_email)

                ->setCellValue('D'.($sr), $data->remarks)

                ->setCellValue('E'.($sr), $uploadsStr);



            }



            //$phpExcel->getActiveSheet()->getStyle('AM')->getAlignment()->setWrapText(true);



            $objWriter = \PHPExcel_IOFactory::createWriter($phpExcel, 'Excel5');



            header('Content-Type: application/vnd.ms-excel');

            $filename = "Contest Report-".$model->start_date.'-to-'.$model->end_date.".xls";

            header('Content-Disposition: attachment;filename='.$filename);

            header('Cache-Control: max-age=0');

            

              



            $objWriter->save('php://output');







        }



        return $this->render('contest',['model' => $model, 'contestList' => $contestList]);

    }

    



}

