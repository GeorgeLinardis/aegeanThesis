<?php

namespace app\controllers;


use yii\web\Controller;



class ProfessorController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCommittee()
    {
        return $this->render('committee');
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

    public function actionThesisCreate()
    {
        return $this->render('thesis-create');
    }


    public function actionThesisView()
    {
        return $this->render('thesis-view');
    }

    public function actionThesisCommittee()
    {
        return $this->render('thesis-committee');
    }


    public function actionThesisPast()
    {
        return $this->render('thesis-past');
    }

}