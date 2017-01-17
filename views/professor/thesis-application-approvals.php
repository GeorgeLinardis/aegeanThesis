<?php
use yii\grid\GridView;
use yii\helpers\Html;
?>


<div class="student-thesis-application-results">

    <h1>Αιτήσεις για νέες διπλωματικές</h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'thesisID',
                'value'=>('thesis.title')
            ],
            [
                'attribute'=>'masterID',
                'value'=>(('thesis.masterID'))
            ],
            'status',
            [
                'attribute'=>'studentID',
                'value'=>('student.lastname')
            ],
            [
                'attribute'=>'professorID',
                'value'=>('professor.lastname')
            ],
            'dateCreated:datetime',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'buttons' => [
                    'update' => function ()
                    {

                        return Html::a('<span class="glyphicon glyphicon-thumbs-up"></span>',['//thesis/view',['id'=>'thesis.ID']]);}
                    ],
           ],
            ]
    ]); ?>
</div>
