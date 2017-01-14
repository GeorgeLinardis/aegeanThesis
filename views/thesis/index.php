<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\CustomHelpers\UserHelpers;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ThesisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Διπλωματικές';
?>
<div class="thesis-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'ID',
            'masterID',
            //'professorID',
            [
                'attribute' => 'professorID',
                'value' => ('professor.lastname')
            ],

            'title',
            //'description:ntext',
            //'goal:ntext',
            // 'prerequisite_knowledge:ntext',
            // 'max_students',
            // 'comments:ntext',
             'status',
             'dateCreated:date',
             //'datePresented:date',
            // 'committee1',
            // 'committee2',
            // 'committee3',
            // 'RequestPDf',



            ['class' => 'yii\grid\ActionColumn',
                'template'=> UserHelpers::UserRole()== 'student'? '{view}':'{view}{update}{delete}',


            ],
        ],
    ]); ?>
</div>
