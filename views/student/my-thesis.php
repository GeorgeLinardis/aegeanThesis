<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
?>

<?php
$this->title = 'Η διπλωματική μου';
$this->params['breadcrumbs'][]=['label'=>'Φοιτητής','url'=>'main'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="student-my-thesis">
    <h1><?= Html::encode($this->title) ?></h1><br>
<?php if(isset($message)): ?>
    <div class="row">
        <div class="col-sm-12">
            <img src="/images/broken-link.png" class="thumbnail broken-link-image" alt="broken link">
            <?= "<h2>".$message."</h2>"?>
        </div>

    </div>
<?php else: ?>
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'ID',
                    //'professorID',
                    [   'label'=>'Επιβλέπων Καθηγητής',
                        'value'=>$model->professor->firstname.' '.$model->professor->lastname ,

                    ],
                    'title',
                    'description:ntext',
                    'goal:ntext',
                    'prerequisite_knowledge:ntext',
                    'max_students',
                    'comments:ntext',
                    'status',
                    'dateCreated:date',
                    'datePresented:date',
                    [   'attribute'=>'committee1',
                        'value'=>(isset($model->committee10)?$model->committee10->lastname.' '.$model->committee10->firstname:" "),
                    ],
                    [   'attribute'=>'committee2',
                        'value'=>(isset($model->committee20)?$model->committee20->lastname.' '.$model->committee20->firstname:" "),
                    ],
                    [   'attribute'=>'committee3',
                        'value'=>(isset($model->committee30)?$model->committee30->lastname.' '.$model->committee30->firstname:" "),
                    ],
                    'RequestPDf',

                    [   'attribute'=>'masterID',
                        'value'=>$model->master->title
                    ],

                ],
            ]) ?>
<?php endif;?>
</div>