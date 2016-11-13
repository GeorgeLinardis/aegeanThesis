<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Thesis */
/* @var $form yii\widgets\ActiveForm */
?>
<?php var_dump($_POST)?>
<div class="thesis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'professorID')->textInput() ?>

    <?= $form->field($model, 'studentID')->textInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'goal')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'prerequisite_knowledge')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'max_students')->textInput() ?>

    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'υπο έγκριση' => 'υπο έγκριση', 'έχει ανατεθεί' => 'έχει ανατεθεί', 'δεν έχει ανατεθεί' => 'δεν έχει ανατεθεί', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'committee1')->textInput() ?>

    <?= $form->field($model, 'committee2')->textInput() ?>

    <?= $form->field($model, 'committee3')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
