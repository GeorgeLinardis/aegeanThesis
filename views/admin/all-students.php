<?php
use yii\helpers\Html;
?>
<?php
$this->title = 'Φοιτητές';
$this->params['breadcrumbs'][] = ['label'=>'Διαχειριστής','url'=>'index'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-students">
    <div class="text-center"><h1><?= Html::encode($this->title) ?> </h1></div><br>


	<?= $this->render('//student/index', [
        'dataProvider' => $dataProvider,
    ]) ?>




</div>

