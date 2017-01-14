<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Student */

$this->title = 'Τροποποίηση στοιχείων';
$this->params['breadcrumbs'][] = ['label' => 'Προφίλ', 'url' => ['site/profile']];
$this->params['breadcrumbs'][] = 'Τροποποίηση';
?>
<div class="student-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
