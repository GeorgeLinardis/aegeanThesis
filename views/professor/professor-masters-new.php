<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Master;
use yii\helpers\ArrayHelper;
use app\CustomHelpers\UserHelpers;


?>

<div class="professor-masters-new">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enableAjaxValidation' => true,
            ]
    ]); ?>

    <?= $form->field($model, 'masterID')->dropDownList(
        ArrayHelper::map(Master::find()->all(),
            "ID","title"),
        ['prompt'=>'Επιλέξτε μεταπτυχιακό']) ?>


    <?= $form->field($model, 'professorID')->textInput(['value'=>UserHelpers::User()->ID])->label(false) ?>



    <div class="form-group">
        <?= Html::submitButton('Προσθήκη' , ['class' => 'btn btn-success' ]) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
