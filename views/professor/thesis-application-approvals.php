<?php
use yii\grid\GridView;
use yii\helpers\Html;
?>

<?php
$this->title = 'Αιτήσεις για νέες διπλωματικές';

?>
<div class="professor-thesis-application-approvals">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Επιλέξτε το σύμβολο <span class="glyphicon glyphicon-arrow-right " style="color:#0080ff"></span> στην δεξιά στήλη για να σας οδηγήσει στην οθόνη έγκρισης της αντίστοιχης αίτησης.</p><br>

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
                    'view'=> function ($url,$model){
                        return Html::a('<span class="glyphicon glyphicon-arrow-right"></span>',['thesis-application-answer',
                            'ThesisID'=>($model->thesisID),
                            'StudentID'=>($model->studentID)

                        ]);//
                    },




                ],
            ],
            ]
    ]); ?>
</div>
