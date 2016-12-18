<?php

namespace app\controllers;


use yii\web\Controller;
use yii\data\ActiveDataProvider;
use app\models\Thesis;
use app\models\Professor;
use yii;


class ProfessorController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCommittee()
    {   $professorID = Professor::find()->where(['userUsername'=>(Yii::$app->user->identity->username)])->one();

        $dataProvider = new ActiveDataProvider(
            ['query'=>(Thesis::find()->where([
                                'or',
                                ['committee1'=>[$professorID->ID]],
                                ['committee2'=>[$professorID->ID]],
                                ['committee3'=>[$professorID->ID]]

            ])),
                'pagination'=>['pageSize'=>10]]
        );

        return $this->render('committee',
            ['dataProvider'=>$dataProvider,
             'professorID'=>$professorID ]);
    }

    public function actionStatistics()
    {
        return $this->render('statistics');
    }

    // Actions about thesis - CREATE - VIEW - COMMITTEE - PAST

    public function actionThesis()
    {
        return $this->render('thesis');
    }


}