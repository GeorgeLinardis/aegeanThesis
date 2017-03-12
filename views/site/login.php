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
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
        <h1><?= Html::encode($this->title) ?></h1>

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Είσοδος',['class'=>'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

            <h4 class="text-danger"><?php if (isset($message)){echo $message."<br>";}?></h4>


            <?php
                if (isset($entry)) {
                    var_dump($entry);
                }
            ?>
        </div>


        <!--
        <?//= Login::widget()?>
        <br>
        <a href="/user/forgot">Ξεχάσατε τον κωδικό σας;</a><br>
        <a href="/user/resend">Δεν έχετε λάβει email επιβεβαίωσης;</a>
        </div>

        <div class="col-md-6 col-md-1-offset ">
            <h2 class="text-center">Δεν έχετε λογαριασμό ; </h2><br />

            <a href = "<?= Url::to('/site/new-user')?>">
                <img class="center-block" src = "<?= Url::to('@web/images/loginPage/newuser-logo.png')?>" alt = "Enter" style="height: 90px ;width: 90px">
            </a>
            <h4>Δημιουργία νέου!</h4>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <a href="ldap">Είσοδος με LDAP</a>

        </div>
    </div>
     -->
    </div>

</div>
