<?php
use yii\helpers\Html;
?>
<?php
$this->title = 'Διπλωματικές';
$this->params['breadcrumbs'][] = ['label'=>'Διαχειριστής','url'=>'index'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-theses">
    <div class="text-center"><h1><?= Html::encode($this->title) ?> </h1></div><br>

    <?php
    echo $this->render('//thesis/index', [

        'dataProvider'=>$dataProvider,
        'searchModel' => $searchModel
    ])
    ?>



</div>
