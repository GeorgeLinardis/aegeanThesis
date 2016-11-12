<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Theses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thesis-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Thesis', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'professorID',
            'studentID',
            'title',
            'description:ntext',
            // 'goal:ntext',
            // 'prerequisite_knowledge:ntext',
            // 'max_students',
            // 'comments:ntext',
            // 'status',
            // 'committee1',
            // 'committee2',
            // 'committee3',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
