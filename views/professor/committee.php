<?php
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $dataProvider \app\controllers\ThesisController*/
?>
<?php
$this->title = 'Τρέχουσες Επιτροπές';
$this->params['breadcrumbs'][] = ['label'=>'Καθηγητής','url'=>'index'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="professor-committee">
<h1> <?= Html::encode($this->title) ?></h1>
Οι Επιτροπές στις οποίες λαμβάνετε μέρος την τρέχουσα περίοδο είναι οι εξής:<br><br>



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

</div>