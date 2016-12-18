<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\References */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="references-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList([ 'άλλο' => 'άλλο', 'βιβλίο' => 'βιβλίο', 'paper' => 'Paper', 'URL' => 'URL', 'περιοδικό' => 'περιοδικό', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'URL')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_created_by_author')->textInput() ?>

    <?= $form->field($model, 'date_created_by_student')->textInput() ?>

    <?= $form->field($model, 'date_updated_by_student')->textInput() ?>

    <?= $form->field($model, 'file')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
