<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Πως λειτουργεί ;';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-tutorials">
    <h1><?= Html::encode($this->title) ?></h1>
    <br>
    <p>Επιλέξτε μια απο τις παρακάτω λειτουργίες του συστήματος που σας ενδιαφέρει:</p>

    <div class="list-group">
        <a href="#tutorials-new-user-steps" class="list-group-item">Αναγκαία πρώτα βήματα χρήστη</a>
        <a href="#tutorials-student-new-thesis" class="list-group-item">Αίτηση θέματος διπλωματικής</a>
        <a href="#tutorials-student-professor-chat" class="list-group-item">Επικοινωνία με επιβλέποντα καθηγητή</a>
        <a href="#tutorials-student-add-reference" class="list-group-item">Προσθήκη νέας πηγής</a>
    </div>
    <br>

     <br>
    <h2>Αναγκαία πρώτα βήματα χρήστη</h2>
    <div class="row" >
        <div class="embed-responsive embed-responsive-16by9" align="center" id="tutorials-new-user-steps">
            <video autoplay loop class="embed-responsive-item">
                <source <?=Html::img("@web/tutorial_videos/tutorials-new-user-steps")?> type=video/mp4>
            </video>
        </div>
    </div>
    <br>
    <h2>Αίτηση θέματος διπλωματικής</h2>
    <div class="row" >
        <div class="embed-responsive embed-responsive-16by9" align="center" id="tutorials-student-new-thesis">
            <video autoplay loop class="embed-responsive-item">
                <source <?=Html::img("@web/tutorial_videos/tutorials-student-new-thesis")?> type=video/mp4>
            </video>
        </div>
    </div>
    <br>
    <h2>Επικοινωνία με καθηγητή</h2>
    <div class="row" >
        <div class="embed-responsive embed-responsive-16by9" align="center" id="tutorials-student-professor-chat">
            <video autoplay loop class="embed-responsive-item">
                <source <?=Html::img("@web/tutorial_videos/tutorials-student-professor-chat")?> type=video/mp4>
            </video>
        </div>
    </div>
    <br>
    <h2>Προσθήκη νέας βιβλιογραφικής αναφοράς</h2>
    <div class="row" >
        <div class="embed-responsive embed-responsive-16by9" align="center" id="tutorials-student-add-reference">
            <video autoplay loop class="embed-responsive-item">
                <source <?=Html::img("@web/tutorial_videos/tutorials-student-add-reference")?> type=video/mp4>
            </video>
        </div>
    </div>
    <br>






</div>

