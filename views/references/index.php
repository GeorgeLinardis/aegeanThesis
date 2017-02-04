<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReferencesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
if (Yii::$app->controller->id=="references") {
    $this->title = 'Κατάλογος Αναφορών';
    $this->params['breadcrumbs'][] = $this->title;
}
elseif (Yii::$app->controller->id=="student"){
    $this->title = 'Οι πηγές μου';
    $this->params['breadcrumbs'][] = $this->title;
}
elseif (Yii::$app->controller->id=="professor"){
$this->title = 'Πηγές φοιτητών μου';
$this->params['breadcrumbs'][] = $this->title;}
?>
<div class="references-index">

        <h1><?= Html::encode($this->title) ?></h1><br>


    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?php
        if (Yii::$app->controller->id == 'student'){
        echo Html::a('Δημιουργία Αναφοράς', ['references/create'], ['class' => 'btn btn-success']);
        }; ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'ID',
            'title',
            'author',
            'type',
            //'professorID',
            //'URL:url',
             'date_created_by_author:date',
             //'date_created_by_student:date',
             //'date_updated_by_student:date',
            // 'file:ntext',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'controller'=>'references'

                ],

        ],
    ]); ?>
</div>
