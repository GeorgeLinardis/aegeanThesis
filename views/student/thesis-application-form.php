<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<h1>Δήλωση ενδιαφέροντος για διπλωματική</h1>



<div class="student-form">


    <form>
        <div class="form-group">
            <label>Τίτλος Διπλωματικής</label>
            <input type="text" class="form-control" placeholder="<?=$Thesis->title?>" readonly>
        </div>
    </form>
    <?php $form = ActiveForm::begin([
        'options' => [
            'enableAjaxValidation' => true,
            'enctype'=>'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'studentID')->hiddenInput(['readonly'=>'true','value'=>(\app\CustomHelpers\UserHelpers::User()->ID)])->label(false)?>

    <?= $form->field($model, 'professorID')->hiddenInput(['readonly'=>'true','value'=>Yii::$app->request->get('professorID')])->label(false)?>

    <?= $form->field($model, 'thesisID')->textInput(['readonly'=>'true','value'=>Yii::$app->request->get('id')])->label(('Κωδικός Διπλωματικής:'))?>



    <div class="form-group">
        <?= Html::submitButton('Αποστολή δήλωσης ενδιαφέροντος', ['class' => 'btn btn-success' ]) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>