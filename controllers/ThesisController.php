<?php

namespace app\controllers;

use app\models\Thesis;
use yii\data\ActiveDataProvider;

class ThesisController extends \yii\web\Controller
{
     public function actionIndex(){
        return $this->render('index');
    }

    public function actionView(){
        return $this->render('view');
    }


    public function actionCreate(){
        $model = new Thesis();

        return $this->render('create',
                      ['model'=>$model]
                        );
    }



    public function actionActive(){

        $dataProvider = new ActiveDataProvider(
            ['query'=>(Thesis::find()->where(['status'=>['δεν έχει ανατεθεί','υπο έγκριση'] ])),
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


}
