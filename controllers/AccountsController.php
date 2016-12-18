<?php

namespace app\controllers;

use app\models\DbUser;
use app\models\Professor;
use app\models\Student;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;


class AccountsController extends Controller
{


//VALIDATION NEEDS FIXING AND REDIRECTING BASED ON LOGIN
    public function actionNewUser() //direction to type of user: Professor or student
    {
        return $this->render('new-user');
    }

    public function actionNewUserProfessor() // directs to form for new professor
    {
        $modelUsers = new DbUser();
        $modelProfessor = new Professor();


        if (isset($_POST['DbUser']))
        {
            $modelUsers->Username = $_POST['DbUser']['Username'];
            $modelUsers->Password= $_POST['DbUser']['Password'];
            $modelUsers->Role='professor';
            $modelProfessor->userUsername =$_POST['DbUser']['Username'];
            $modelProfessor->firstname=$_POST['Professor']['firstname'];
            $modelProfessor->lastname=$_POST['Professor']['lastname'];
            $modelProfessor->telephone=$_POST['Professor']['telephone'];
            $modelProfessor->email=$_POST['Professor']['email'];
            $modelProfessor->url=$_POST['Professor']['url'];

        if ($modelUsers->save() && $modelProfessor->save()){

            return $this->goBack();
            }


        }
        return $this->render('new-user-professor' , [
                                'modelUsers'=>$modelUsers,
                                'modelProfessor'=>$modelProfessor
        ]);
    }

    public function actionNewUserStudent() // directs to form for new student
    {
        $modelUsers = new DbUser();
        $modelStudents = new Student();

        if (isset($_POST['DbUser']))
        {
            $modelUsers->Username = $_POST['DbUser']['Username'];
            $modelUsers->Password= $_POST['DbUser']['Password'];
            $modelUsers->Role='student';
            $modelStudents->userUsername=$_POST['DbUser']['Username'];
            $modelStudents->firstname=$_POST['Student']['firstname'];
            $modelStudents->lastname=$_POST['Student']['lastname'];
            $modelStudents->telephone1=$_POST['Student']['telephone1'];
            $modelStudents->telephone2=$_POST['Student']['telephone2'];
            $modelStudents->email=$_POST['Student']['email'];


            if ($modelUsers->save() && $modelStudents->save()){
                return $this->render('site/index');
            }
        }
        return $this->render('new-user-student',array(
                'modelUsers'=>$modelUsers,
                'modelStudents'=>$modelStudents));
    }

    public function actionProfile()
    {   $Role = DbUser::find()->where(['username'=>(Yii::$app->user->identity->username)])->one();

        if ($Role->Role == 'professor') {
            $model = Professor::findOne(['userUsername' => Yii::$app->user->identity->username]);
        }
        elseif ($Role->Role == 'student') {
            $model = Student::findOne(['userUsername' => Yii::$app->user->identity->username]);
        }
        return $this->render('profile', [
                    'model' => $model,
                    'Role'=>$Role->Role,
                ]
            );



    }






}