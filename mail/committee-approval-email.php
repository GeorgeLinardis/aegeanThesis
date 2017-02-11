<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Master;
?>
<?php $MasterTitle = Master::find()->where(['ID'=>$PostData['Thesis']['masterID']])->one() ?>
<div class="row">
    <p>Γειά σας,</p>

    <p>Θα ήθελα να συμμετέχετε στην Επιτροπή της παρακάτω διπλωματικής:</p>
    <ul>
        <li><b>Τίτλος:</b> <?php echo $PostData['Thesis']['title']?></li><br>
        <li><b>Περιγραφή:</b> <?php echo $PostData['Thesis']['description']?></li><br>
        <li><b>Πρόγραμμα σπουδών:</b> <?php echo $MasterTitle->title?></li>
    </ul>


    <p>Σας ευχαριστώ πολύ,</p>
    <p>Με εκτίμηση</p>
    <b><?php echo $Sender->firstname.' '.$Sender->lastname?></b>

<hr>
<br><br>
<p><b>Αποδοχή αιτήματος</b><br>
    Στην περίπτωση που <u>ενδιαφέρεστε</u> να συμμετάσχετε στην Επιτροπή μπορείτε να αποδεχθείτε το αίτημα επιλέγοντας τον ακόλoυθο σύνδεσμο:</p>
<?php echo Html::a('Απoδοχή αιτήματος',(Url::to($acceptUrl, true)))?>
<br><br>
<p><b>Απόρριψη αιτήματος</b><br>
    Στην περίπτωση που <u>δεν ενδιαφέρεστε</u> να συμμετάσχετε στην Επιτροπή μπορείτε να απορρίψετε το αίτημα επιλέγοντας τον ακόλoυθο σύνδεσμο:</p>
<?php echo Html::a('Απόρριψη αιτήματος',(Url::to($rejectUrl, true)))?>
</div>
