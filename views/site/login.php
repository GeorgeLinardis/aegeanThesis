<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\url;

$this->title = 'Είσοδος';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="site-login">
    <div class="col-md-9">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Εισάγετε τα στοιχεία σας για να συνδεθείτε:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Είσοδος', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

    <div class="col-lg-offset-1" style="color:#999;">

    </div>
    </div>
    <div class="col-md-3">
        <h2 class="text-center">Δεν έχετε λογαριασμό ; </h2><br />

        <a href = "<?= Url::to('/accounts/new-user')?>">
            <img class="center-block" src = "<?= Url::to('@web/images/loginPage/newuser-logo.png')?>" alt = "Enter" style="height: 90px ;width: 90px">
        </a>
        <div class="text-center "><h4>Δημιουργία νέου!</h4></div><br>

    </div>

</div>
