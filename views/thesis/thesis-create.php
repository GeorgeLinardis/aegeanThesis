<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\thesis */
/* @var $form ActiveForm */
?>


<div class="row">
    <div class="col-sm-6">
        <h3 class="text-center">
            <span class="glyphicon glyphicon-blackboard"></span> Δημιουργία νέας διπλωματικής</h3>

        <div class = "text-center">Παρακαλώ συμπληρώστε τα στοιχεία σας στην παρακάτω φόρμα:</div>

        <div class="thesis-form">



    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'professorID') ?>
        <?= $form->field($model, 'max_students') ?>
        <?= $form->field($model, 'committee1') ?>
        <?= $form->field($model, 'committee2') ?>
        <?= $form->field($model, 'committee3') ?>
        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'description') ?>
        <?= $form->field($model, 'status') ?>
        <?= $form->field($model, 'dateCreated') ?>
        <?= $form->field($model, 'datePresented') ?>
        <?= $form->field($model, 'goal') ?>
        <?= $form->field($model, 'prerequisite_knowledge') ?>
        <?= $form->field($model, 'comments') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>



        </div>
    </div>
    <div class="col-sm-offset-1 col-sm-5">
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        <img src="<?= \yii\helpers\Url::to('@web/images/newUser/keyboard(Pixabay).jpg') ?>" alt="keyboard photo" class="img-rounded" style="max-width: 100%; max-height: 100%">
    </div>
</div>