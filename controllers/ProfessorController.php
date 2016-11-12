<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;



class ProfessorController extends Controller
{

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionCommittee()
    {
        $this->render('committee');
    }

    public function actionStatistics()
    {
        $this->render('statistics');
    }

    // Actions about thesis - CREATE - VIEW - COMMITTEE - PAST

    public function actionThesis()
    {
        $this->render('thesis');
    }

    public function actionThesisCreate()
    {   $model = new Thesis() ;
        //used to pass data for professor based on his username in thesis-create view
        $professorUserData = Professor::model()->findByAttributes(array('userUsername'=>(Yii::app()->user->name)));
        $allProfessorsData = Professor::model()->findAll();


        if (isset($_POST['Thesis']))
        {
            $model->professorID = $professorUserData->ID;
            $model->title = $_POST['Thesis']['title'];
            $model->description = $_POST['Thesis']['description'];
            $model->goal = $_POST['Thesis']['goal'];
            $model->prerequisite_knowledge = $_POST['Thesis']['prerequisite_knowledge'];
            $model->max_students = $_POST['Thesis']['max_students'];
            $model->comments = $_POST['Thesis']['comments'];
            $model->status = $_POST['Thesis']['status'];
            $model->committee1 = $_POST['Thesis']['committee1'];
            $model->committee2 = $_POST['Thesis']['committee2'];
            $model->committee3 = $_POST['Thesis']['committee3'];


            if ($model->validate() && $model->save())
            {
               $this->redirect('thesis-view');
            }
        }
        $this->render('thesis-create',array(
                     'model'=>$model,
                     'professorUserData'=>$professorUserData,
                     'allProfessorsData'=>$allProfessorsData,




        ));
    }


    public function actionThesisView()
    {
        $model = new CActiveDataProvider('Thesis',array(
            'pagination'=>array(
                    'pageSize'=>1),
        ));
        $this->render('thesis-view',array(
            'model'=>$model,

        ));
    }

    public function actionThesisCommittee()
    {
        $this->render('thesis-committee');
    }


    public function actionThesisPast()
    {
        $this->render('thesis-past');
    }


    // Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}