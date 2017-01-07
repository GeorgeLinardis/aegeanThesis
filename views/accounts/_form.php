<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DbUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="db-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Password_Repeat')->passwordInput(['maxlength' => true]) ?>


    <?=
    // Role is generated automatically based on GET attribute and is hidden from user
    $form->field($model, 'Role')->hiddenInput(['value'=>(Yii::$app->request->get('role')=='professor'? 'Professor' : 'Student')])->label(false);

   ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Δημιουργία' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
