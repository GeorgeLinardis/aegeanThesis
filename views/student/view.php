<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Student */

$this->title = 'Προφίλ Χρήστη';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-view">


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            //'masterID',
            //'thesisID',
            [   'label'=>'Διπλωματική',
                'value'=>$model->thesis ? $model->thesis->title : "Δεν έχει τεθεί",
            ],

            [   'label'=>'Μεταπτυχιακό',
                'value'=>$model->master?$model->master->title:"Δεν έχει τεθεί",
            ],
            'userUsername',
            'firstname',
            'lastname',
            'telephone1',
            'telephone2',
            'email:email',
            'skypeUsername',
            'url:url',
            'comments:ntext',
            'photo',
        ],
    ]) ?>
    <?= Html::a('Τροποποίηση', ['//student/update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>

</div>
