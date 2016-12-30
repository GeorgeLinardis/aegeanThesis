<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReferencesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Πηγές';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="references-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create References', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'title',
            'author',
            'type',
            'URL:url',
            // 'date_created_by_author',
            // 'date_created_by_student',
            // 'date_updated_by_student',
            // 'file:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
