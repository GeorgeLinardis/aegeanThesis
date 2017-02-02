<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\CustomHelpers\UserHelpers;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ThesisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Διπλωματικές Πανεπιστημίου';
?>
<div class="thesis-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php if (Yii::$app->controller->id=="thesis"):?>
    <h1><?= Html::encode($this->title) ?></h1><br>
    <?php endif;?>
    <p>Επιλέξτε το σύμβολο <span class="glyphicon glyphicon-eye-open" style="color:#0080ff"></span> στην δεξιά στήλη για να δείτε τα στοιχεία της διπλωματικής αναλυτικότερα.</p><br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'ID',

            //'masterID',
            [
                'attribute' => 'masterID',
                'value' => ('master.title')
            ],

            //'professorID',
            [
                'attribute' => 'professorID',
                'value'=>function ($model) {
                    return $model->professor->lastname.' '. $model->professor->firstname;
                },
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
                'controller'=>'thesis'


            ],
        ],
    ]); ?>
</div>
