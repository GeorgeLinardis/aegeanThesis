<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DbUser */

$this->title = 'Create Db User';
$this->params['breadcrumbs'][] = ['label' => 'Db Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="db-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
