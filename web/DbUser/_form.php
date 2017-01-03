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

    <?= $form->field($model, 'Role')->dropDownList([ 'professor' => 'Professor', 'student' => 'Student', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
