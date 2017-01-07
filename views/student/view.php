<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Student */

$this->title = 'Προφίλ ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'masterID',
            'thesisID',
            'ID',
            'userUsername',
            'firstname',
            'lastname',
            'telephone1',
            'telephone2',
            'email:email',
            'skypeUsername',
            'url:ntext',
            'comments:ntext',
            'photo',
        ],
    ]) ?>
    <?= Html::a('Τροποποίηση', ['//student/update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>

</div>
