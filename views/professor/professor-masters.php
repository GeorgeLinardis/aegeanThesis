<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Master;
use app\CustomHelpers\UserHelpers;

/* @var $model app\models\professorHasMasters */

$this->title = 'Τα μεταπτυχιακά μου';
$this->params['breadcrumbs'][] = ['label'=>'Προφίλ','url'=>'/site/profile'];
$this->params['breadcrumbs'][] = $this->title;

?>


<div id="message">
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>
</div>
<div class="professor-masters">
    <h1> <?= (Html::encode($this->title)) ?></h1><br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'masterID',
            [
                'attribute'=>'',
                'value'=>function ($model) {
                    return $model->master->title;
                },
            ],
            'professorID',
            [
                'attribute'=>'',
                'value'=>function ($model) {
                    return $model->professor->lastname.' '. $model->professor->firstname;
                },
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'buttons' => [
                    'delete'=> function ($url,$model){
                        return Html::a('<span class="glyphicon glyphicon-remove"></span>',['delete-master',
                            'id'=>($model->ID),


                        ]);//
                    },




                ],
            ],
    ]]); ?>

</div>

<div class="professor-masters-new">
    <br><h3>Προσθέστε νέο μεταπτυχιακό:</h3>
    <?php $form = ActiveForm::begin([
        'options' => [
            'enableAjaxValidation' => true,
        ]
    ]); ?>

    <?= $form->field($model, 'masterID')->dropDownList(
        ArrayHelper::map(Master::find()->all(),
            "ID","title"),
        ['prompt'=>'Επιλέξτε μεταπτυχιακό']) ?>


    <?= $form->field($model, 'professorID')->hiddenInput(['value'=>UserHelpers::User()->ID])->label(false) ?>



    <div class="form-group">
        <?= Html::submitButton('Προσθήκη' , ['class' => 'btn btn-success' ]) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>

