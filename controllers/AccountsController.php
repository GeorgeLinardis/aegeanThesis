<?php

namespace app\controllers;

use app\models\Professor;
use app\models\Student;
use app\models\User;
use Yii;
use yii\web\Controller;


class AccountsController extends Controller
{


    public function actionIndex() //direction to type of user: Professor or student
    {
        return $this->render('index');
    }

    public function actionNewProfessor() // directs to form for new professor
    {
        $model_users = new User();
        $model_professor = new Professor();


        if (isset($_POST['User']))
        {
            $model_users->Username = $_POST['User']['Username'];
            $model_users->Password= $_POST['User']['Password'];
            $model_users->Role='professor';
            $model_professor->userUsername=$_POST['User']['Username'];
            $model_professor->firstname=$_POST['Professor']['firstname'];
            $model_professor->lastname=$_POST['Professor']['lastname'];
            $model_professor->telephone=$_POST['Professor']['telephone'];
            $model_professor->email=$_POST['Professor']['email'];
            $model_professor->url=$_POST['Professor']['url'];
            $model_users->save();
            $model_professor->save();

            if ($model_users->validate())
            {   //LOGS USER BASED ON NEW USER DATA
                $ID = new UserIdentity($_POST['User']['Username'],$_POST['User']['Password']);
                Yii::app()->user->login($ID);
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }




        return $this->render('new-professor' , [
                                'model_users'=>$model_users,
                                'model_professor'=>$model_professor,
            ]);
    }

    public function actionNewStudent() // directs to form for new student
    {
        $model_users = new User();
        $model_students = new Student();

        if (isset($_POST['User']))
        {
            $model_users->Username = $_POST['User']['Username'];
            $model_users->Password= $_POST['User']['Password'];
            $model_users->Role='student';
            $model_students->userUsername=$_POST['User']['Username'];
            $model_students->firstname=$_POST['Student']['firstname'];
            $model_students->lastname=$_POST['Student']['lastname'];
            $model_students->telephone1=$_POST['Student']['telephone1'];
            $model_students->telephone2=$_POST['Student']['telephone2'];
            $model_students->email=$_POST['Student']['email'];
            $model_users->save();
            $model_students->save();

            if ($model_users->validate())
            {   //LOGS USER BASED ON NEW USER DATA
                $ID = new UserIdentity($_POST['User']['Username'],$_POST['User']['Password']);
                Yii::app()->user->login($ID);
                $this->redirect(Yii::app()->user->returnUrl);
            }


        }

        $this->layout = "column1";
        $this->render('new-student',array(
                'model_users'=>$model_users,
                'model_students'=>$model_students));
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