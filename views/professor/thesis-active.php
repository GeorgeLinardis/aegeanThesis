<?php
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $dataProvider \app\controllers\ThesisController*/
?>
<?php
$this->title = 'Τρέχουσες διπλωματικές';
$this->params['breadcrumbs'][] = ['label'=>'Καθηγητής','url'=>'../professor'];
$this->params['breadcrumbs'][] = ['label'=>'Διπλωματικές','url'=>'../professor/thesis'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="thesis-active">
    <h1> <?= Html::encode($this->title) ?></h1><br>

    <?php
    echo $this->render('//thesis/index', [

        'dataProvider'=>$dataProvider,
        'searchModel' => $searchModel
    ])
    ?>



</div>