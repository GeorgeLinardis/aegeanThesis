<?php

namespace app\controllers;

use app\models\Professor;
use app\models\Thesis;
use yii;
use yii\web\Controller;


class EmailController extends Controller
{
    /* This function gets the data needed to create email send to professors that will be committee members.
    * $SenderID,$ReceiverID,$ThesisID is an integer
    * $PostData is an array
   */

    public static function CreateCommitteeEmail($SenderID,$ReceiverID,$PostData,$ThesisID)
    {
        $Sender = Professor::find()->where(['id'=>($SenderID)])->one();
        $Receiver = Professor::find()->where(['id'=>$ReceiverID])->one();
        $static_key = "afvsdsdjkldfoiuy4uiskahkhsajbjksasdasdgf43gdsddsf";
        $id = $ThesisID . "_" .$ReceiverID."_". $static_key;
        $enc_id = base64_encode($id);
        $rejectUrl = (Yii::$app->homeUrl.'email/reject-thesis-email-respond') . "?id=" . $enc_id."&action=reject";
        $acceptUrl = (Yii::$app->homeUrl.'email/accept-thesis-email-respond') . "?id=" . $enc_id."&action=accept";

        // sends email to professors that have been chosen as committee members
        Yii::$app->mailer
            ->compose('committee-approval-email',['Sender'=>$Sender,'Receiver'=>$Receiver,'PostData'=>$PostData,'rejectUrl'=>$rejectUrl,'acceptUrl'=>$acceptUrl])
            ->setFrom($Sender->email)
            ->setTo($Receiver->email)//$Receiver->email)
            ->setSubject('Αίτημα συμμετοχής σε Επιτροπή απο :'.' '.$Sender->firstname.' '.$Sender->lastname)
            ->send();

    }

    /* This function decoded the response received professor when he click the response link .
   */

    public function ThesisEmailRespondDecode(){
        $ids = Yii::$app->getRequest()->getQueryParam('id');
        $urlData = array('ids'=>$ids);
        $iddecoded = base64_decode($ids);
        $idsalt = explode('_', $iddecoded);
        $thesis_id = $idsalt[0];
        $professor_id=$idsalt[1];
        $salt = $idsalt[2];

        return ([$thesis_id,$professor_id]);

    }

    /* This function uses the decoded id returned from ThesisEmailRespondDecode function and inserts null as value
     * to the Committee member that rejected the position in the Committee
     * */

    public function actionRejectThesisEmailRespond()
    {
        $thesis_id = $this->ThesisEmailRespondDecode()[0];
        $professorID= $this->ThesisEmailRespondDecode()[1];

        $Referred_thesis = Thesis::find()->where(['ID'=>$thesis_id])->one();
        // I'm using if and not else if because maybe from human mistake a professor has been proposed as a committee member in 2 or 3 cells in the application form
        if ($Referred_thesis->committee1 == $professorID) {
            $Referred_thesis->committee1 = null;}
        if ($Referred_thesis->committee2 == $professorID ){
            $Referred_thesis->committee2 = null;}
        if ($Referred_thesis->committee3 == $professorID) {
            $Referred_thesis->committee3 = null;
        }

        $Referred_thesis->save();

        return $this->render('reject-thesis-email-respond',[
            'thesis_id'=>$thesis_id,
            'thesis_title'=>$Referred_thesis->title
        ]);
    }

    /* This function uses the decoded id returned from ThesisEmailRespondDecode function and inserts the
     * Committee member id as a value since he accepted the position in the Committee
     * */

    public function actionAcceptThesisEmailRespond()
    {
        $thesis_id = $this->ThesisEmailRespondDecode()[0];
        $professorID= $this->ThesisEmailRespondDecode()[1];

        $Referred_thesis = Thesis::find()->where(['ID'=>$thesis_id])->one();
        if ($Referred_thesis->committee1 == null && $Referred_thesis->committee2!=$professorID && $Referred_thesis->committee3!=$professorID) {
            $Referred_thesis->committee1 = $professorID;

        }
        elseif ($Referred_thesis->committee2 == null && $Referred_thesis->committee1!=$professorID && $Referred_thesis->committee3!=$professorID){
            $Referred_thesis->committee2 = $professorID;

        }
        elseif ($Referred_thesis->committee3 == null && $Referred_thesis->committee1!=$professorID && $Referred_thesis->committee2!=$professorID) {
            $Referred_thesis->committee3 = $professorID;

        }

        $Referred_thesis->save();

        return $this->render('accept-thesis-email-respond',[
            'thesis_id'=>$thesis_id,
            'thesis_title'=>$Referred_thesis->title
        ]);
    }

}

