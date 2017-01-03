<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\professor */

$this->title = 'Προφίλ '.$model->firstname.' '.$model->lastname;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="professor-view">


    <p>

        <?php /*echo  Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'userUsername',
            'firstname',
            'lastname',
            'telephone1',
            'telephone2',
            'email:email',
            'skypeUsername',
            'comments:ntext',
            'url:ntext',
            'photo',
        ],
    ]) ?>
    <?= Html::a('Τροποποίηση', ['//professor/update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>

</div>
