<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\References */

$this->title = 'Ανανέωση Αναφορών: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Φοιτητής', 'url' => ['../student/index']];
$this->params['breadcrumbs'][] = ['label' => 'Οι Aναφορές μου', 'url' => ['../student-references/index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Διόρθωση';
?>
<div class="references-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
