<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Thesis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="thesis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model,'professorID')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'goal')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'prerequisite_knowledge')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'max_students')->dropDownList([1 => '1',2 => '2',3 => '3',4 => '4',5 => '5',]) ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'υπο έγκριση' => 'υπο έγκριση', 'έχει ανατεθεί' => 'έχει ανατεθεί', 'δεν έχει ανατεθεί' => 'δεν έχει ανατεθεί', 'για Επιτροπή' => 'για Επιτροπή', 'ολοκληρώθηκε' => 'ολοκληρώθηκε', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'dateCreated')->textarea() ?>

    <?= $form->field($model, 'datePresented')->widget(
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

    <?= $form->field($model, 'committee1')->textInput() ?>

    <?= $form->field($model, 'committee2')->textInput() ?>

    <?= $form->field($model, 'committee3')->textInput() ?>

    <?= $form->field($model, 'RequestPDf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'masterID')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
