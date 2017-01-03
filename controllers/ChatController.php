<?php

namespace app\controllers;

use yii;
use yii\web\Controller;
use app\models\Chat;
use app\models\Comment;

class ChatController extends Controller
{

    public function getMsg(){
        $messages =  Chat::find()->where(['Sender'=>['maragkoudakis','linardis']])->orderBy('date_time')->all();


        return $messages;

    }

    public function sendMsg($message){

        $sender = Yii::$app->user->identity->username;
        return $sender;



    }

    public function actionChatRoom()
    {
        $model = new Chat();
        $messages = $this->getMsg();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['//chat/chat-room', /*'id' => $model->ID*/]);
        } else {
            return $this->render('chatRoom',
                ['model'=>$model,
                 'messages'=>$messages]

            );
        }
    }

    public function actionChat(){
        $model = new Comment();
        $this-> render('chat',
            ['model'=>$model]
        );
    }






}