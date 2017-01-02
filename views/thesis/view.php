<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Thesis */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Theses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thesis-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'professorID',
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
                'value'=>$model->committee10->lastname.' '.$model->committee10->firstname
            ],
            [   'attribute'=>'committee2',
                'value'=>$model->committee20->lastname.' '.$model->committee20->firstname
            ],
            [   'attribute'=>'committee3',
                'value'=>$model->committee30->lastname.' '.$model->committee30->firstname
            ],
            'RequestPDf',
            [   'attribute'=>'masterID',
                'value'=>$model->master->title
            ],

        ],
    ]) ?>

</div>
