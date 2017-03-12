<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\References */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="references-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'professorID')->hiddenInput(['readonly'=>'true','value'=>$Professor->ID])->label(('Καθηγητής: '.$Professor->firstname." ".$Professor->lastname))?>

    <?= $form->field($model, 'studentID')->hiddenInput(['readonly'=>'true','value'=>$Student->ID])->label(('Φοιτητής: '.\app\CustomHelpers\UserHelpers::UserFullName()))?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PublishedTo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList([ 'άλλο' => 'άλλο', 'βιβλίο' => 'βιβλίο', 'paper' => 'Paper', 'URL' => 'URL', 'περιοδικό' => 'περιοδικό', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'URL')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'BipText')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'date_created_by_author')->widget(
                            DatePicker::className(), [
                            // inline too, not bad
                            'inline' => false,
                            // modify template for custom rendering
                            //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd'
                            ]
                        ]);?>

    <?=  $form->field($model, 'date_created_by_student')->hiddenInput(['disabled'=>true])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Δημιουργία' : 'Ανανέωση', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Επιστροφή', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
