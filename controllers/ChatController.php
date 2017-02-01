<?php

namespace app\controllers;

use yii;
use yii\web\Controller;
use app\models\Chat;
use app\models\Professor;
use app\models\Thesis;
use app\models\Student;

class ChatController extends Controller
{
    public function refresh($anchor = '')
    {
        return Yii::$app->getResponse()->redirect(Yii::$app->getRequest()->getUrl() . $anchor);
    }

    public function getMsg($users){
        $messages =  Chat::find()->where(['username'=> $users])->orderBy(['date_time'=>SORT_DESC])->all();
        return $messages;
    }

    public function sendMsg($message){
        $sender = UserHelpers::Username();
        return $sender;

    }

    public function actionChatRoom($ThesisID){
        $model = new Chat();
        $users=[];
        $Thesis=(Thesis::find()->where(['ID'=>$ThesisID])->one());
        $Professor=Professor::find()->where(['ID'=>$Thesis->professorID])->one();
        $StudentsThesisNumber=count(Thesis::find()->where(['ID'=>$ThesisID])->all());
        $StudentsThesisStudents=(Student::find()->where(['thesisID'=>$ThesisID])->all());
        $users[]=$Professor->userUsername;
        foreach ($StudentsThesisStudents as $Student){
            $users[] = $Student->userUsername;
        }
        $messages = $this->getMsg($users);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->refresh();
        } else {
            return $this->render('chat-room',[
                    'StudentsThesisNumber'=>$StudentsThesisNumber,
                    'StudentsThesisStudents'=>$StudentsThesisStudents,
                    'Professor'=>$Professor,
                    'model'=>$model,
                    'messages'=>$messages,
                    'users'=>$users,
                    'Thesis'=>$Thesis



                ]
            );
        }

    }








}