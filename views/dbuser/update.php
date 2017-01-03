<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DbUser */

$this->title = 'Update Db User: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Db Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="db-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
