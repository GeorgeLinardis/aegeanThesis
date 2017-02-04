<?php

namespace app\controllers;

use yii;
use yii\web\Controller;
use app\models\Chat;
use app\models\Professor;
use app\models\Thesis;
use app\models\Student;
use yii\web\UploadedFile;

class ChatController extends Controller
{
    public function refresh($anchor = '')
    {
        return Yii::$app->getResponse()->redirect(Yii::$app->getRequest()->getUrl() . $anchor);
    }

    public function getMsg($users,$ThesisID){
        $messages =  Chat::find()->where(['username'=> $users,'thesisID'=>$ThesisID])->orderBy(['date_time'=>SORT_ASC])->all();
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
        $messages = $this->getMsg($users,$ThesisID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (UploadedFile::getInstance($model,'file')){
                $file = UploadedFile::getInstance($model,'file');
                $fileName='ThesisID'."_".$model->thesisID.'_FileID_'.$model->id.".".$file->getExtension();
                $model->message = $model->message.'(Εστάλη αρχείο με κωδικό:'.$model->id.")";
                $file->saveAs('documents\chat_documents'."/".$fileName);
                $model->file = $fileName;
                $model->save();
            }
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