<?php
use yii\grid\GridView;

/* @var $dataProvider \app\controllers\ThesisController*/
?>
<?php
$this->title = 'Διπλωματικές προς Επιτροπή';
$this->params['breadcrumbs'][] = ['label'=>'Καθηγητής','url'=>'professor/thesis'];
$this->params['breadcrumbs'][] = ['label'=>'Διπλωματικές','url'=>'../professor/thesis'];
$this->params['breadcrumbs'][] = $this->title;
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