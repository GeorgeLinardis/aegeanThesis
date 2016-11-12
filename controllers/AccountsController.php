<?php

namespace app\controllers;

use app\models\DbUser;
use app\models\Professor;
use app\models\Student;
use app\models\User;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;


class AccountsController extends Controller
{


    public function actionIndex() //direction to type of user: Professor or student
    {
        return $this->render('index');
    }

    public function actionNewProfessor() // directs to form for new professor
    {
        $modelUsers = new DbUser();
        $modelProfessor = new Professor();


        if (isset($_POST['User']))
        {
            $modelUsers->Username = $_POST['User']['Username'];
            $modelUsers->Password= $_POST['User']['Password'];
            $modelUsers->Role='professor';
            $modelProfessor->userUsername=$_POST['User']['Username'];
            $modelProfessor->firstname=$_POST['Professor']['firstname'];
            $modelProfessor->lastname=$_POST['Professor']['lastname'];
            $modelProfessor->telephone=$_POST['Professor']['telephone'];
            $modelProfessor->email=$_POST['Professor']['email'];
            $modelProfessor->url=$_POST['Professor']['url'];
            $modelProfessor->save();
            $modelProfessor->save();

            if ($modelUsers->validate() && $modelUsers->save())
            {
                $this->redirect(Url::to('site/index'));
            }
        }




        return $this->render('new-professor' , [
                                'modelUsers'=>$modelUsers,
                                'modelProfessor'=>$modelProfessor
        ]);
    }

    public function actionNewStudent() // directs to form for new student
    {
        $modelUsers = new DbUser();
        $modelStudents = new Student();

        if (isset($_POST['User']))
        {
            $modelUsers->Username = $_POST['User']['Username'];
            $modelUsers->Password= $_POST['User']['Password'];
            $modelUsers->Role='student';
            $modelStudents->userUsername=$_POST['User']['Username'];
            $modelStudents->firstname=$_POST['Student']['firstname'];
            $modelStudents->lastname=$_POST['Student']['lastname'];
            $modelStudents->telephone1=$_POST['Student']['telephone1'];
            $modelStudents->telephone2=$_POST['Student']['telephone2'];
            $modelStudents->email=$_POST['Student']['email'];
            $modelStudents->save();
            $modelStudents->save();

            if ($modelUsers->validate() && $modelUsers->save())
            {   //LOGS USER BASED ON NEW USER DATA
                $ID = new UserIdentity($_POST['User']['Username'],$_POST['User']['Password']);
                Yii::app()->user->login($ID);
                $this->redirect(Yii::app()->user->returnUrl);
            }


        }


        return $this->render('new-student',array(
                'modelUsers'=>$modelUsers,
                'modelStudents'=>$modelStudents));
    }

    public function actionProfile()
    {   $model = Professor::model()->find('userUsername=:user',array(':user'=>(Yii::app()->user->name)));
        $username = Yii::app()->user->name;
        $this->render('profile',array(
            'model'=>$model,
            'username'=>$username,)
        );
    }







}