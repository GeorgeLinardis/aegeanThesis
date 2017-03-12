<?php
use yii\helpers\Html;
use yii\grid\GridView;
?>


<?php
$this->title = 'Επικοινωνία με φοιτητές ανα διπλωματική';
$this->params['breadcrumbs'][]=['label'=>'Καθηγητής','url'=>'@web/professor/main'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="professor-chat-main">
    <h1><?= Html::encode($this->title) ?></h1><br>
    <p>Επιλέξτε το σύμβολο <span class="glyphicon glyphicon-comment" style="color:#0080ff"></span> στην δεξιά στήλη για να σας οδηγήσει στην οθόνη επικοινωνίας της αντίστοιχης διπλωματικής.</p><br>


    <?= GridView::widget([
        'dataProvider' => $dataProvider ,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            'ID',
            'title',
            [
                'attribute' => 'description',
                'label'=>'Φοιτητές',
                'value'=>function ($model) {
                    $Students = \app\models\Student::find()->where(['ThesisID'=>$model->ID])->all();
                    $results = "";
                    foreach ($Students as $student){
                        $results .= ($student->lastname)." ".$student->firstname.",\n";
                    };
                    return $results;
                },
            ],

            [
                'attribute'=>'professorID',
                'value'=>function ($model) {
                    return $model->professor->lastname.' '. $model->professor->firstname;
                },
            ],

            'status',
            'dateCreated:datetime',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{comment}',
                'buttons' => [
                    'comment'=> function ($url,$model){
                        return Html::a('<span class="glyphicon glyphicon-comment"></span>',['//chat/chat-room',
                            'ThesisID'=>($model->ID),


                        ]);//
                    },




                ],
            ],
        ]
    ]); ?>

</div>