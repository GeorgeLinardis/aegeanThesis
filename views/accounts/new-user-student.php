<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="accounts-new-user-student">
<div class="row">
    <div class="col-sm-6">
        <h3><span class="glyphicon glyphicon-education"></span> Νεός Χρήστης Φοιτητής</h3>
        <div>Παρακαλώ συμπληρώστε τα στοιχεία σας στην παρακάτω φόρμα:</div><br>

        <div class="thesis-form">

            <?php $form = ActiveForm::begin([
                'options' => [
                    'enableAjaxValidation' => true]
            ]); ?>

            <?= $form->field($modelUsers, 'Username')->textInput() ?>
            <?= $form->field($modelUsers, 'Password')->passwordInput() ?>
            <hr>

                                    <!--ΣΤΟΙΧΕΙΑ ΦΟΙΤΗΤΗ-->

                <?= $form->field($modelStudents, 'masterID')->textInput() ?>
                <?= $form->field($modelStudents, 'firstname')->textInput() ;?>
                <?= $form->field($modelStudents, 'lastname')->textInput() ;?>
                <?= $form->field($modelStudents, 'telephone1')->textInput() ;?>
                <?= $form->field($modelStudents, 'telephone2')->textInput() ;?>
                <?= $form->field($modelStudents, 'email')->textInput() ;?>
                <?= $form->field($modelStudents, 'skypeUsername')->textInput() ?>
                <?= $form->field($modelStudents, 'comments')->textInput() ?>
                <?= $form->field($modelStudents, 'url')->textInput() ?>
                <?= $form->field($modelStudents, 'masterID')->textInput() ?>
                <?= $form->field($modelStudents, 'photo')->textInput() ?>

            <?= Html::submitButton('Εγγραφή',['class'=>'btn btn-success']) ?>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
    <div class="col-sm-offset-1 col-sm-5">
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        <img src="<?= \yii\helpers\Url::to('@web/images/newUser/keyboard(Pixabay).jpg') ?>" alt="keyboard photo" class="img-rounded" style="max-width: 100%; max-height: 100%">
    </div>
</div>
</div>