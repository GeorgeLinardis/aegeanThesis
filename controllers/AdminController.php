<?php

namespace app\controllers;


use yii\web\Controller;
use yii;
use app\models\ThesisSearch;


class AdminController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAllTheses()
    {
        $searchModel = new ThesisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('all-theses',
            ['dataProvider'=>$dataProvider,
                'searchModel'=>$searchModel,
            ]);
    }

    public function actionAllStudents()
    {
        return $this->render('all-students');
    }

    public function actionAllProfessors()
    {
        return $this->render('all-Professors');
    }

    public function actionStatistics()
    {
        return $this->render('Statistics');
    }
}