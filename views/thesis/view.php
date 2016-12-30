<?php

use yii\widgets\DetailView;
use yii\helpers\Html;



?>

<h2>Αναλυτική εικόνα Διπλωματικής</h2><br />
    <div class="col-sm-8">
    <?=

    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID' ,
            'professorID' ,
            'masterID',
            'title' ,
            'description' ,
            'goal',
            'prerequisite_knowledge',
            'max_students' ,
            'comments' ,
            'status' ,
            'dateCreated' ,
            'datePresented' ,
            'committee1' ,
            'committee2' ,
            'committee3' ,
            'RequestPDf' ,

        ],
    ]); ?>
</div>
<div class="col-sm-4">
    <h4>Δημιουργία αίτησης διπλωματικής σε pdf μορφή:<h4><br />
    <?= Html::a('Δημιουργία PDF', [\yii\helpers\Url::toRoute(['thesis/pdf','id'=>($model->getAttribute('ID'))])], ['class'=>'btn btn-primary']) ; ?>
</div>



