<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<h1>Δήλωση ενδιαφέροντος για διπλωματική</h1>



<div class="student-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enableAjaxValidation' => true,
            'enctype'=>'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'studentID')->textInput(['value'=>(\app\CustomHelpers\UserHelpers::User()->ID) ,'readonly'=>true])?>

    <?= $form->field($model, 'thesisID')->textInput(['value'=>Yii::$app->request->get('id'),'readonly'=>true])?>

    <?= $form->field($model, 'status')->textInput(['value'=>'δεν έχει εγκριθεί','readonly'=>true])?>

    <div class="form-group">
        <?= Html::submitButton('Αποστολή', ['class' => 'btn btn-success' ]) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>