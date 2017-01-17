<?php
use yii\helpers\Html;
?>

<p>Κύριε Καθηγητά,</p>

<p>Θα ήθελα να συμμετέχετε στην παρακάτω επιτροπή:</p>
<ul>
    <li>Τίτλος: <?php echo $PostData['Thesis']['title']?></li><br>
    <li>Περιγραφή: <?php echo $PostData['Thesis']['description']?></li><br>
    <li>Πρόγραμμα σπουδών: <?php echo $PostData['Thesis']['masterID']?></li>

</ul>


<p><b>Αποδοχή αιτήματος</b><br>
Για να αποδεχτείτε το αίτημα παρακαλώ επιλέξτε τον ακόλoυθο σύνδεσμο:</p><br>
<?php
$key = Yii::$app->security->generateRandomString();
echo Html::a('Αποδοχή αιτήματος',Yii::$app->urlManager->createAbsoluteUrl(['professor/thesis-application-approvals','key'=>$key]))?>

<p><b>Απόρριψη αιτήματος</b><br>
Για να αποδεχτείτε το αίτημα παρακαλώ επιλέξτε τον ακόλoυθο σύνδεσμο:</p>
<?php
$key = Yii::$app->security->generateRandomString();
echo Html::a('Απόρριψη αιτήματος',Yii::$app->urlManager->createAbsoluteUrl(['professor/thesis-application-approvals','key'=>$key]))?>


<p>Σας ευχαριστώ πολύ,</p>
<p>Με εκτίμηση</p>
<b><?php echo $Sender->firstname.' '.$Sender->lastname?></b>