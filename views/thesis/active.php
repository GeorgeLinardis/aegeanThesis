<?php
use yii\grid\GridView;

/* @var $dataProvider \app\controllers\ThesisController*/
?>
<?php
$this->title = 'Τρέχουσες διπλωματικές';
$this->params['breadcrumbs'][] = ['label'=>'Καθηγητής','url'=>'professor/thesis'];
$this->params['breadcrumbs'][] = ['label'=>'Διπλωματικές','url'=>'../professor/thesis'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="thesis-active">
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



</div>