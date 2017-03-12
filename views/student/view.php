<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\CustomHelpers\UserHelpers;

/* @var $this yii\web\View */
/* @var $model app\models\Student */


if (UserHelpers::UserRole()=="administrator") {
    $this->title = 'Στοιχεία Φοιτητή';
    $this->params['breadcrumbs'][] = ['label'=>'Διαχειριστής','url'=>'/admin/index'];
    $this->params['breadcrumbs'][] = ['label'=>'Φοιτητές','url'=>'/admin/all-students'];
    $this->params['breadcrumbs'][] = $this->title;
}
else {
    $this->title = 'Προφίλ Χρήστη';
    $this->params['breadcrumbs'][] = $this->title;
}
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
            'registrationNumber',
            'firstname',
            'lastname',
            'telephone1',
            'telephone2',
            'email:email',
            'skypeUsername',
            'url:url',
            'comments:ntext',
            'photo',
            [
                'label'=>'Βιογραφικό (max 2MB)',
                'format' => 'raw',
                'value' => ($model->cv!=null && isset($model->cv))?(Html::a("Βιογραφικό χρήστη",["documents\cv"."/".$model->cv],["target"=>"_blank"])):"Ο χρήστης δεν έχει ανεβάσει βιογραφικό"
            ]
        ],
    ]) ?>
    <?php if (UserHelpers::UserRole() != 'administrator') : ?>
    <?= Html::a('Τροποποίηση', ['//student/update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
    <?php endif;?>
</div>
