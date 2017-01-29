<?php
use yii\grid\GridView;
?>


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
