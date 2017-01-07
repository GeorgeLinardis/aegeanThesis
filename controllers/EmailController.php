<?php

namespace app\controllers;

use yii;
use yii\web\Controller;


class EmailController extends Controller
{

    public function actionCommitteeEmail()
    {

        return $this->render('committee-email');
    }


    public function actionCreateCommitteeEmail()
    {
        Yii::$app->mailer
            ->compose('committee-approval-email')
            ->setFrom('glinardis@gmail.com')
            ->setTo('glinardis@gmail.com')
            ->setSubject('Συμμετοχή σε Επιτροπή')
            ->send();
    }

    public function actionChat()
    {

        return $this->render('chat');
    }

}

