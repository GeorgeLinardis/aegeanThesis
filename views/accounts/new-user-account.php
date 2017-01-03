<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php if ($role == 'professor'):

    $this->title = 'Καθηγητής';
    $this->params['breadcrumbs'][]=['label'=>'Νέος Χρήστης','url'=>'new-user'];
    $this->params['breadcrumbs'][] = $this->title;
?>
<?php elseif ($role == 'student'):

    $this->title = 'Φοιτητής';
    $this->params['breadcrumbs'][]=['label'=>'Νέος Χρήστης','url'=>'new-user'];
    $this->params['breadcrumbs'][] = $this->title;
?>
<?php endif ;?>

<div class="accounts-new-user">
    <div class="row">
        <div class="col-sm-6">
            <h3><span class="glyphicon glyphicon-blackboard"></span>
                <?php if ($role == 'professor'):?> Νεός Χρήστης Καθηγητής
                <?php elseif ($role == 'student'):?>Νεός Χρήστης Φοιτητής
                <?php endif ;?></h3>

            <p>Παρακαλώ συμπληρώστε τα στοιχεία σας στην παρακάτω φόρμα:</p>
            <hr>

            <div class="thesis-form">

                <?php $form = ActiveForm::begin([
                    'options' => [
                        'enableAjaxValidation' => true,
                        'enctype'=>'multipart/form-data'],
                ]); ?>
                <!--ΣΤΟΙΧΕΙΑ ΚΑΘΗΓΗΤΗ-->
                <?php if ($role == 'professor'):?>

                <?= $this->render('//professor/create', [
                    'model' => $modelProfessor,

                ])
                ?>
                    <!--ΣΤΟΙΧΕΙΑ ΦΟΙΤΗΤΗ-->
                <?php elseif ($role == 'student'):?>

                <?= $this->render('//student/create', [
                    'model' => $modelStudent,
                ])?>
                <?php endif ;?>



                <?php ActiveForm::end(); ?><br />

            </div>
        </div>
        <div class="col-sm-offset-1 col-sm-5">
            <img src="<?= \yii\helpers\Url::to('@web/images/newUser/keyboard(Pixabay).jpg') ?>" alt="keyboard photo" class="img-rounded">
        </div>
    </div>
