<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ThesisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Theses';
?>
<div class="thesis-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'ID',
            'professorID',
            'title',
            //'description:ntext',
            //'goal:ntext',
            // 'prerequisite_knowledge:ntext',
            // 'max_students',
            // 'comments:ntext',
             'status',
             'dateCreated',
            // 'datePresented',
            // 'committee1',
            // 'committee2',
            // 'committee3',
            // 'RequestPDf',
             'masterID',

            ['class' => 'yii\grid\ActionColumn',
             'template'=>'{view}{update}{delete}',
             'controller'=>'thesis'

            ],
        ],
    ]); ?>
</div>
