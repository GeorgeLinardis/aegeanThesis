<?php
use yii\grid\GridView;

/* @var $dataProvider \app\controllers\ThesisController*/
?>


<h2> Διπλωματικές που έχουν ολοκληρωθεί</h2><br>

<?=

GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'ID',
        'title',
        ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view}'], //{delete} {update}
        ],

]); ?>

