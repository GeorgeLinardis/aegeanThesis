<?php

use yii\widgets\DetailView;
use yii\helpers\Html;
use yii\helpers\url;

?>
<?php
$this->title = 'Ανάλυση διπλωματικής';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thesis-view">
<h1><?= Html::encode($this->title) ?></h1><br />
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
    <?= Html::a('Δημιουργία PDF', [Url::toRoute(['thesis/pdf','id'=>($model->getAttribute('ID'))])], ['class'=>'btn btn-primary']) ; ?>
    <br><br>
    <h4>Αποστολή αιτήματος προς Μέλος Επιτροπής:<h4><br />
    <?= Html::a('Αποστολή email', [Url::toRoute('email/committee-email')], ['class'=>'btn btn-primary']) ; ?>



</div>
</div>


