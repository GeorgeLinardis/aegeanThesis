<?php
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $dataProvider \app\controllers\ThesisController*/
?>
<?php
$this->title = 'Διπλωματικές στο παρελθόν';
$this->params['breadcrumbs'][] = ['label'=>'Καθηγητής','url'=>'main'];
$this->params['breadcrumbs'][] = ['label'=>'Οι διπλωματικές μου','url'=>'../professor/thesis'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="thesis-past">
    <h1> <?= Html::encode($this->title) ?></h1><br>

    <?php
    echo $this->render('//thesis/index', [

        'dataProvider'=>$dataProvider,
        'searchModel' => $searchModel
    ])
    ?>



</div>