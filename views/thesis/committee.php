<?php
use yii\grid\GridView;

/* @var $dataProvider \app\controllers\ThesisController*/
?>

<div class="thesis-committee">
<h2> Διπλωματικές προς Επιτροπή </h2><br>

<?=

GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'ID',
        'masterID',
        'title',
        'status',
        ['class' => 'yii\grid\ActionColumn',
         'template'=>'{view}'], //{delete} {update}
        ],
]); ?>


</div>