<?php

namespace app\controllers;

use app\models\Thesis;
use kartik\mpdf\Pdf;
use yii\data\ActiveDataProvider;

class ThesisController extends \yii\web\Controller
{
     public function actionIndex(){
        return $this->render('index');
    }

    public function actionView($id){
        $model = Thesis::find()->where(['id'=> $id])->one();

        return $this->render('view',
            ['model'=>$model]);

    }


    public function actionCreate(){
        $model = new Thesis();

        return $this->render('create',
                      ['model'=>$model]
                        );
    }



    public function actionActive(){

        $dataProvider = new ActiveDataProvider(
            ['query'=>(Thesis::find()->where(['status'=>['έχει ανατεθεί','δεν έχει ανατεθεί','υπο έγκριση'] ])),
             'pagination'=>['pageSize'=>10]]
        );

        return $this->render('active',
            ['dataProvider'=>$dataProvider]);
    }


    public function actionCommittee(){
        $dataProvider = new ActiveDataProvider(
            ['query'=>(Thesis::find()->where(['status'=>['για Επιτροπή'] ])),
                'pagination'=>['pageSize'=>10]]
        );

        return $this->render('committee',
            ['dataProvider'=>$dataProvider]);
    }



    public function actionPast(){
        $dataProvider = new ActiveDataProvider(
            ['query'=>(Thesis::find()->where(['status'=>['ολοκληρώθηκε'] ])),
                'pagination'=>['pageSize'=>10]]
        );

        return $this->render('past',
            ['dataProvider'=>$dataProvider]);
    }

    public function actionPdf($id){
        $model = Thesis::find()->where(['id'=> $id])->one();
        $content = $this->renderPartial('pdfForm',array('id'=>$id,'model'=>$model));
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Thesis Report Title'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>[$model->getAttributeLabel('ID').": ".$id ],
                'SetFooter'=>['Σελίδα : {PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();



    }





}
