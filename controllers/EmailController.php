<?php

namespace app\controllers;

use app\models\Professor;
use yii;
use yii\web\Controller;


class EmailController extends Controller
{

    public function actionCommitteeEmail()
    {

        return $this->render('committee-email');
    }


    public function actionChat()
    {

        return $this->render('chat');
    }

}

