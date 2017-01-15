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
                'attribute'=>'thesisID',
                'value'=>('thesis.title')
            ],
            'status',
            [
                'attribute'=>'studentID',
                'value'=>('student.lastname')
            ],
            'dateCreated:datetime',




        ],
    ]); ?>
</div>
