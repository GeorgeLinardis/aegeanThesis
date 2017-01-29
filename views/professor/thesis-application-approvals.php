<?php
use yii\grid\GridView;
use yii\helpers\Html;
?>


<div class="professor-thesis-application-approvals">

    <h1>Αιτήσεις για νέες διπλωματικές</h1>
    <??>


    <?= GridView::widget([
        'dataProvider' => $dataProvider ,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute'=>'thesisID',
                'value'=>('thesis.title')
            ],
            [
                'attribute'=>'masterID',
                'value'=>('thesis.masterID')
            ],

              [
                'attribute'=>'studentID',
                'value'=>function ($model) {
                  return $model->student->lastname.' '. $model->student->firstname;
              },
            ],

            [
                'attribute'=>'professorID',
                'value'=>function ($model) {
                return $model->professor->lastname.' '. $model->professor->firstname;
            },
            ],
            'dateCreated:datetime',
            [
                'label'=>'status',
                'value'=>function ($model) {
                    return $model->thesis->status;
                },
             ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view'=> function ($model){
                        return Html::a('<span class="glyphicon glyphicon-arrow-right"></span>',['thesis-application-answer']);//
                    },




                ],
            ],
            ]
    ]); ?>
</div>
