
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="row">
    <div class="col-sm-6">
        <h3 class="text-center">  <span class="glyphicon glyphicon-blackboard"></span> Νεός Χρήστης Καθηγητής</h3>
        <div class = "text-center">Παρακαλώ συμπληρώστε τα στοιχεία σας στην παρακάτω φόρμα:</div>
        <hr>



        <div class="thesis-form">

           <?php $form = ActiveForm::begin([
               'options' => [
                   'enableAjaxValidation' => true]

           ]); ?>

            <?= $form->field($modelUsers, 'Username')->textInput() ?>

            <?= $form->field($modelUsers, 'Password')->passwordInput() ?>

            <?= $form->field($modelProfessor, 'firstname')->textInput() ?>

            <?= $form->field($modelProfessor, 'lastname')->textInput() ?>

            <?= $form->field($modelProfessor, 'telephone')->textInput() ?>

            <?= $form->field($modelProfessor, 'email')->textInput() ?>

            <?= $form->field($modelProfessor, 'url')->textInput() ?>

            <?= Html::submitButton('Εγγραφή',['class'=>'btn btn-success']) ?>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
    <div class="col-sm-offset-1 col-sm-5">
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        <img src="<?= \yii\helpers\Url::to('@web/images/newUser/keyboard(Pixabay).jpg') ?>" alt="keyboard photo" class="img-rounded" style="max-width: 100%; max-height: 100%">
    </div>
</div>