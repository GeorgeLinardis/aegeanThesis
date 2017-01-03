<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Professors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="professor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Professor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'userUsername',
            'firstname',
            'lastname',
            'telephone1',
            // 'telephone2',
            // 'email:email',
            // 'skypeUsername',
            // 'comments:ntext',
            // 'url:ntext',
            // 'photo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
