<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Thesis */

$this->title = 'Ανανέωση διπλωματικής'
//$this->params['breadcrumbs'][] = ['label' => 'Theses', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->ID]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="thesis-update">

    <h1><?= Html::encode($this->title) ?></h1><br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
