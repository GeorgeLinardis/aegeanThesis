<?php

namespace app\controllers;

use app\models\DbUser;
use app\models\Professor;
use app\models\Student;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;


class AccountsController extends Controller
{


//VALIDATION NEEDS FIXING AND REDIRECTING BASED ON LOGIN
    public function actionNewUser() //direction to type of user: Professor or student
    {
        return $this->render('new-user');
    }

    public function actionNewUserAccount($role){
        $modelProfessor = new Professor();
        $modelStudent = new Student();

        return $this->render('new-user-account',[
            'modelProfessor'=>$modelProfessor,
            'modelStudent'=>$modelStudent,
            'role'=>$role]);

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