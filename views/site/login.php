<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use dektrium\user\widgets\Login;

$this->title = 'Είσοδος';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="site-login">
    <div class="col-md-5">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= Login::widget()?>

    </div>

    <div class="col-md-6 col-md-1-offset ">
        <h2 class="text-center">Δεν έχετε λογαριασμό ; </h2><br />

        <a href = "<?= Url::to('/site/new-user')?>">
            <img class="center-block" src = "<?= Url::to('@web/images/loginPage/newuser-logo.png')?>" alt = "Enter" style="height: 90px ;width: 90px">
        </a>
        <h4>Δημιουργία νέου!</h4>

    </div>

</div>
