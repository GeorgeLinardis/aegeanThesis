<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="row">
    <p>Θα ήθελα να συμμετέχετε στην παρακάτω επιτροπή:</p>
    <ul>
        <li>Τίτλος: <?php echo $PostData['Thesis']['title']?></li><br>
        <li>Περιγραφή: <?php echo $PostData['Thesis']['description']?></li><br>
        <li>Πρόγραμμα σπουδών: <?php echo $PostData['Thesis']['masterID']?></li>

    </ul>


    <p>Σας ευχαριστώ πολύ,</p>
    <p>Με εκτίμηση</p>
    <b><?php echo $Sender->firstname.' '.$Sender->lastname?></b>


<br><br>
<p><b>Αποδοχή αιτήματος</b><br>
    Στην περίπτωση που <u>ενδιαφέρεστε</u> να συμμετάσχετε στην Επιτροπή μπορείτε να αποδεχθείτε το αίτημα επιλέγοντας τον ακόλoυθο σύνδεσμο:</p>
<?php echo Html::a('Απoδοχή αιτήματος',(Url::to($acceptUrl, true)))?>
<br><br>
<p><b>Απόρριψη αιτήματος</b><br>
    Στην περίπτωση που <u>δεν ενδιαφέρεστε</u> να συμμετάσχετε στην Επιτροπή μπορείτε να απορρίψετε το αίτημα επιλέγοντας τον ακόλoυθο σύνδεσμο:</p>
<?php echo Html::a('Απόρριψη αιτήματος',(Url::to($rejectUrl, true)))?>
</div>
