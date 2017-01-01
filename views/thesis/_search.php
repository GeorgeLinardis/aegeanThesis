<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ThesisSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="thesis-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'professorID') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'goal') ?>

    <?php // echo $form->field($model, 'prerequisite_knowledge') ?>

    <?php // echo $form->field($model, 'max_students') ?>

    <?php // echo $form->field($model, 'comments') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'dateCreated') ?>

    <?php // echo $form->field($model, 'datePresented') ?>

    <?php // echo $form->field($model, 'committee1') ?>

    <?php // echo $form->field($model, 'committee2') ?>

    <?php // echo $form->field($model, 'committee3') ?>

    <?php // echo $form->field($model, 'RequestPDf') ?>

    <?php // echo $form->field($model, 'masterID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
