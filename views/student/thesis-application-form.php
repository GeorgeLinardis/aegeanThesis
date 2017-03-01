<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>
<?php
$this->title = '  Δήλωση ενδιαφέροντος για νέα διπλωματικής';
$this->params['breadcrumbs'][] = ['label'=>'Καθηγητής','url'=>'main'];
$this->params['breadcrumbs'][] = $this->title;?>

<div class="row">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="student-form">


        <form>
            <div class="form-group">
                <label>Τίτλος Διπλωματικής</label>
                <input type="text" class="form-control" placeholder="<?=$Thesis->title?>" readonly>
            </div>
            <div class="form-group">
                <label>Καθηγητής</label>
                <input type="text" class="form-control" placeholder="<?=$Thesis->professor->firstname." ".$Thesis->professor->lastname?>" readonly>
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
   <?php if (isset($message) && $message!=null){
    echo "<p class='text-danger'>".$message."<p>";
        }
        ?>
</div>