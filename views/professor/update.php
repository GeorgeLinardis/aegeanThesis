<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\professor */

$this->title = 'Τροποποίηση χρήστη: ' . $model->firstname.' '.$model->lastname;
$this->params['breadcrumbs'][] = ['label' => 'Προφίλ', 'url' => ['accounts/profile']];
$this->params['breadcrumbs'][] = 'Τροποποίηση';
?>
<div class="professor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
