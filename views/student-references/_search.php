<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StudentReferencesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="references-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'author') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'URL') ?>

    <?php // echo $form->field($model, 'date_created_by_author') ?>

    <?php // echo $form->field($model, 'date_created_by_student') ?>

    <?php // echo $form->field($model, 'date_updated_by_student') ?>

    <?php // echo $form->field($model, 'file') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
