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

    <div class="list-group">
        <a href="#tutorials-new-user" class="list-group-item">Είσοδος χρήστη / δημιουργία νέου χρήστη</a>
        <a href="#tutorials-new-thesis" class="list-group-item">Δημιουργία νέας διπλωματικής</a>
    </div>

    <div class="row">
        <h3 class="text-left" id="tutorials-new-user">Είσοδος χρήστη / δημιουργία νέου χρήστη</h3>
        <div class="col-sm-10 embed-responsive embed-responsive-16by9">
            <video autoplay loop class="embed-responsive-item">
                <source src=/tutorial_videos/tutorial-new-user.mp4 type=video/mp4>
            </video>
        </div>
    </div>
    <div class="row">
        <h3 class="text-left" id="tutorials-new-thesis">Δημιουργία νέας διπλωματικής</h3>
        <div class="col-sm-10 embed-responsive embed-responsive-16by9">
            <video autoplay loop class="embed-responsive-item">
                <source src=/tutorial_videos/tutorial-new-thesis.mp4 type=video/mp4>
            </video>
            <br>
        </div>
    </div>


</div>

