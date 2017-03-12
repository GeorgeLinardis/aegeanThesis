<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use app\CustomHelpers\UserHelpers;
use yii\helpers\ArrayHelper;
use app\models\ProfessorHasMasters;
use app\models\Professor;
/* @var $this yii\web\View */
/* @var $model app\models\Thesis */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="thesis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model,'professorID')->hiddenInput(['readonly'=>'true','value'=>UserHelpers::User()->ID])->label(('Καθηγητής: '.UserHelpers::UserFullName()))?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'goal')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'prerequisite_knowledge')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'max_students')->dropDownList([1 => '1',2 => '2',3 => '3',4 => '4',5 => '5',]) ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'υπο έγκριση' => 'υπο έγκριση',
                                                       'δεν έχει ανατεθεί' => 'δεν έχει ανατεθεί',
                                                       'έχει ανατεθεί' => 'έχει ανατεθεί',
                                                        'για Επιτροπή' => 'για Επιτροπή',
                                                        'ολοκληρώθηκε' => 'ολοκληρώθηκε', ], ['prompt' => 'Επιλογή κατάστασης']) ?>

    <?php echo $form->field($model, 'grade')->textInput(['maxlength' => true]) ?>


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

    <?= $form->field($model, 'dateCompleted')->widget(
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
    <!-- The committee fields are not saved in the database because if it will be saved depends on the email response of the professor
    -->
    <?= $form->field($model, 'committee1')->dropDownList(
                                            ArrayHelper::map(Professor::find()->all(),
                                                "ID",function($model){return $model->firstname.' '.$model->lastname;}),
                                            ['prompt'=>'Επιλέξτε καθηγητή']) ?>

    <?= $form->field($model, 'committee2')->dropDownList(
                                            ArrayHelper::map(Professor::find()->all(),
                                                "ID",function($model){return $model->firstname.' '.$model->lastname;}),
                                            ['prompt'=>'Επιλέξτε καθηγητή']) ?>

    <?= $form->field($model, 'committee3')->dropDownList(
                                            ArrayHelper::map(Professor::find()->all(),
                                                "ID",function($model){return $model->firstname.' '.$model->lastname;}),
                                            ['prompt'=>'Επιλέξτε καθηγητή']) ?>

    <?php // echo $form->field($model, 'RequestPDf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'masterID')->dropDownList(
                        ArrayHelper::map(ProfessorHasMasters::find()
                            ->where(['professorID'=>UserHelpers::User()->ID])->all(),
                            'masterID',function($model){
                                $data = \app\models\Master::find()->where(['ID'=>($model->masterID)])->one();
                                return $data->title.' ('.$data->ID.')'  ;}),
                            ['prompt' => 'Επιλέξτε ένα απο τα προγράμματα σας']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Δημιουργία' : 'Διόρθωση', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
