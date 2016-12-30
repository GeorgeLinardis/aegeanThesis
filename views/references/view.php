<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\References */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Αναφορές', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="references-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ανανέωση', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Διαγραφή', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'title',
            'author',
            'type',
            'URL:ntext',
            'date_created_by_author',
            'date_created_by_student',
            'date_updated_by_student',
            'file:ntext',
        ],
    ]) ?>
    <?= Html::a('Επιστροφή', ['index'], ['class' => 'btn btn-default']) ?>

</div>
