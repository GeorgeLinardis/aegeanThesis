<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use dektrium\user\widgets\Login;

$this->title = 'Είσοδος';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="site-login">
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
        <h1><?= Html::encode($this->title) ?></h1>
            <p>Παρακαλώ εισάγετε τα στοιχεία σας:</p>


            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Είσοδος',['class'=>'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

            <h4 class="text-danger"><?php if (isset($message)){echo $message."<br>";}?></h4>
            <p>Έχετε την δυνατότητα να συνδεθείτε στην demo έκδοση του ιστότοπου και με τα παρακάτω στοιχεία:</p>
            <div class="row">
                <div class="col-sm-6 text-center" ><b><u>ΚΑΘΗΓΗΤΗΣ</u></b><br> <b>Username:</b>professor_demo <b>Password:</b>professor</div>
                <div class="col-sm-6 text-center"><b><u>ΦΟΙΤΗΤΗΣ</u></b><br> <b>Username:</b>student_demo <b>Password:</b>student</div>
            </div>




        </div>
    </div>



</div>
