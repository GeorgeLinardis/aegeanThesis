<?php

namespace app\controllers;

use app\models\Master;
use Yii;
use yii\web\Controller;
use app\models\Thesis;
use app\models\Student;
use yii\data\ActiveDataProvider;


class StudentController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAllTheses()
    {
        $Student = Student::find()->where(['userUsername'=>(Yii::$app->user->identity->username)])->one();
        $Master = Master::find()->where(['ID'=>($Student->masterID)])->one();
        $dataProvider = new ActiveDataProvider(
            ['query'=>(Thesis::find()->where(['masterID'=>($Student->masterID) ])),
                'pagination'=>['pageSize'=>10]]
        );

        return $this->render('all-theses',
            ['dataProvider'=>$dataProvider,
            'Student'=>$Student,
            'Master'=>$Master]
        );

    }

    public function actionMyThesis()
    {
        return $this->render('my-thesis');
    }

    public function actionMyReferences()
    {
        return $this->render('my-references');
    }

}