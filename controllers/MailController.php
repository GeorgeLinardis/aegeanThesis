<?php

namespace app\controllers;

use yii;
use yii\web\Controller;


class MailController extends Controller
{

    public function actionCommitteeEmail(){
        Yii::$app->mailer->compose('committee-approval-email')
            ->setFrom('glinardis@gmail.com')
            ->setTo('glinardis@gmail.com')
            ->setSubject('Συμμετοχή σε Επιτροπή')
            ->send();
    }

}
