<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="row">
    <div class="col-sm-6">
        <h3 class="text-center">
            <span class="glyphicon glyphicon-blackboard"></span> Νεός Χρήστης Καθηγητής</h3>

        <div>Παρακαλώ συμπληρώστε τα στοιχεία σας στην παρακάτω φόρμα:</div>
        <hr>

        <div class="thesis-form">

            <?php $form = ActiveForm::begin([
                'options' => [
                    'enableAjaxValidation' => true]
            ]); ?>

            <?= $form->field($modelUsers, 'Username')->textInput() ?>
            <?= $form->field($modelUsers, 'Password')->passwordInput() ?>
            <hr>

            <!--ΣΤΟΙΧΕΙΑ ΚΑΘΗΓΗΤΗ-->


                <?= $form->field($modelProfessor, 'firstname')->textInput() ?>
                <?= $form->field($modelProfessor, 'lastname')->textInput() ?>
                <?= $form->field($modelProfessor, 'telephone1')->textInput() ?>
                <?= $form->field($modelProfessor, 'telephone2')->textInput() ?>
                <?= $form->field($modelProfessor, 'email')->textInput() ?>
                <?= $form->field($modelProfessor, 'skypeUsername')->textInput() ?>
                <?= $form->field($modelProfessor, 'comments')->textInput() ?>
                <?= $form->field($modelProfessor, 'url')->textInput() ?>
                <?= $form->field($modelProfessor, 'photo')->textInput() ?>
            <br />


            <?= Html::submitButton('Εγγραφή',['class'=>'btn btn-success']) ?>
            <?php ActiveForm::end(); ?><br />

        </div>
    </div>
    <div class="col-sm-offset-1 col-sm-5">
        <img src="<?= \yii\helpers\Url::to('@web/images/newUser/keyboard(Pixabay).jpg') ?>" alt="keyboard photo" class="img-rounded" style="max-width: 100%; max-height: 100%">
    </div>
