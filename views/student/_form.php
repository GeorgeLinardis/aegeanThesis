<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enableAjaxValidation' => true,
            'enctype'=>'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'masterID')->textInput(['maxlength' => true]) ?>
    sasasa
    <?= $form->field($model, 'thesisID')->textInput() ?>

    <?= $form->field($model, 'userUsername')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telephone1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telephone2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skypeUsername')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'photo')->fileInput()  ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Δημιουργία' : 'Τροποποίηση', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',]) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
