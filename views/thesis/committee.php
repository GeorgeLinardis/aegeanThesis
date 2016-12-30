<?php
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $dataProvider \app\controllers\ThesisController*/
?>
<?php
$this->title = 'Διπλωματικές προς Επιτροπή';
$this->params['breadcrumbs'][] = ['label'=>'Καθηγητής','url'=>'../professor'];
$this->params['breadcrumbs'][] = ['label'=>'Διπλωματικές','url'=>'../professor/thesis'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thesis-committee">
<h1> <?= Html::encode($this->title) ?> </h1><br>

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