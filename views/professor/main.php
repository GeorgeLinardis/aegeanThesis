<?php
use yii\helpers\Html;
use app\models\Professor;
?>

<?php
$this->title = 'Καθηγητής';

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="professor-main">

    <h1><?= Html::encode($this->title) ?></h1>

Καλησπέρα σας <?= $name; ?>


</div>