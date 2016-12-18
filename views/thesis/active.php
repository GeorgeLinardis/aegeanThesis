<?php
use yii\grid\GridView;

/* @var $dataProvider \app\controllers\ThesisController*/
?>

<h2> Τρέχουσες Διπλωματικές </h2><br>
<?=



GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'ID',
        'masterID',
        'title',
        'status',
        'dateCreated',
        ['class' => 'yii\grid\ActionColumn',
         'template'=>'{view}'], //{delete} {update}
        ],
    ]); ?>



