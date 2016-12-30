<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $dataProvider \app\controllers\ThesisController*/
?>
<?php
$this->title = 'Ολοκληρωμένες Διπλωματικές ';
$this->params['breadcrumbs'][] = ['label'=>'Καθηγητής','url'=>'../professor'];
$this->params['breadcrumbs'][] = ['label'=>'Διπλωματικές','url'=>'../professor/thesis'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thesis-past">
<h1><?= Html::encode($this->title) ?></h1><br>

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