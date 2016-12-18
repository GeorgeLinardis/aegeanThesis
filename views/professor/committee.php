<?php
use yii\grid\GridView;

/* @var $dataProvider \app\controllers\ThesisController*/
?>


<h2> Οι τρέχουσες Επιτροπές</h2>
Οι Επιτροπές στις οποίες λαμβάνετε μέρος την τρέχουσα περίοδο είναι οι εξής:<br /><br />



<?=

GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'ID',
        'masterID',
        'title',
        'status',
        'datePresented',
        ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view}'], //{delete} {update}
    ],
]); ?>
