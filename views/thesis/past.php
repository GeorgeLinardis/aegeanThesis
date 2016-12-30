<?php
use yii\grid\GridView;

/* @var $dataProvider \app\controllers\ThesisController*/
?>

<div class="thesis-past">
<h2> Διπλωματικές που έχουν ολοκληρωθεί</h2><br>

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