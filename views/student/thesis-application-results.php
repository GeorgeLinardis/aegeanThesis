<?php
use yii\grid\GridView;
?>

<div id="message">
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>
</div>
<div class="student-thesis-application-results">

    <h1>Δήλωση ενδιαφέροντος διπλωματικών</h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'professorID',
                'value'=>function ($model) {
                    return $model->professor->lastname.' '. $model->professor->firstname;
                },
            ],
            [
                'attribute'=>'thesisID',
                'value'=>('thesis.title')
            ],
            [
                'attribute'=>'studentID',
                'value'=>function ($model) {
                    return $model->student->lastname.' '. $model->student->firstname;
                },

            ],


            'dateCreated:datetime',




        ],
    ]); ?>
</div>
