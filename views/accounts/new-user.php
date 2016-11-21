
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="row">
    <div class="col-sm-6">
        <h3 class="text-center">
        <?php if ($Role == 'professor'):?>
            <span class="glyphicon glyphicon-blackboard"></span> Νεός Χρήστης Καθηγητής</h3>

        <?php elseif ($Role == 'student') :?>
        <span class="glyphicon glyphicon-blackboard"></span> Νεός Χρήστης Φοιτητής</h3>
        <?php endif?>
        <div class = "text-center">Παρακαλώ συμπληρώστε τα στοιχεία σας στην παρακάτω φόρμα:</div>
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
            <?php if ($Role == 'professor'):?>

                <?= $form->field($modelProfessor, 'firstname')->textInput() ?>
                <?= $form->field($modelProfessor, 'lastname')->textInput() ?>
                <?= $form->field($modelProfessor, 'telephone1')->textInput() ?>
                <?= $form->field($modelProfessor, 'telephone2')->textInput() ?>
                <?= $form->field($modelProfessor, 'email')->textInput() ?>
                <?= $form->field($modelProfessor, 'skypeUsername')->textInput() ?>
                <?= $form->field($modelProfessor, 'comments')->textInput() ?>
                <?= $form->field($modelProfessor, 'url')->textInput() ?>

                                    <!--ΣΤΟΙΧΕΙΑ ΦΟΙΤΗΤΗ-->
            <?php elseif ($Role == 'student') :?>

                <?= $form->field($modelStudents, 'firstname')->textInput() ;?>
                <?= $form->field($modelStudents, 'lastname')->textInput() ;?>
                <?= $form->field($modelStudents, 'telephone1')->textInput() ;?>
                <?= $form->field($modelStudents, 'telephone2')->textInput() ;?>
                <?= $form->field($modelStudents, 'email')->textInput() ;?>
                <?= $form->field($modelStudents, 'comments')->textInput() ?>
                <?= $form->field($modelStudents, 'url')->textInput() ?>
                <?= $form->field($modelStudents, 'masterID')->textInput() ?>

            <?php endif?>

            <?= Html::submitButton('Εγγραφή',['class'=>'btn btn-success']) ?>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
    <div class="col-sm-offset-1 col-sm-5">
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        <img src="<?= \yii\helpers\Url::to('@web/images/newUser/keyboard(Pixabay).jpg') ?>" alt="keyboard photo" class="img-rounded" style="max-width: 100%; max-height: 100%">
    </div>
</div>