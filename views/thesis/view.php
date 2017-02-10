<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\CustomHelpers\UserHelpers;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Thesis */

    $this->title = $model->title;
if ($model->professorID==UserHelpers::User()->ID) {
    $this->params['breadcrumbs'][] = ['label' => 'Καθηγητής', 'url' => '/professor/main'];
    $this->params['breadcrumbs'][] = ['label' => 'Οι διπλωματικές μου', 'url' => '/professor/thesis'];
    $this->params['breadcrumbs'][] = $this->title;
}
else  {
    $this->params['breadcrumbs'][] = ['label' => 'Διπλωματικές Πανεπιστημίου', 'url' => '/thesis/index'];

    $this->params['breadcrumbs'][] = $this->title;
}
?>

    <div class="thesis-view">
    <div class="row">
        <div class="col-sm-9">
            <h1><?= Html::encode($this->title) ?></h1><br>

            <p>
                <?php if (UserHelpers::User()->ID== $model->professorID) :?>
                <?= Html::a('<span class="glyphicon glyphicon-list-alt"></span> Αίτηση PDF', ['thesis-pdf','id'=>($model->ID)], ['class' => 'btn btn-primary' ]) ?>
                <?php  if (UserHelpers::UserRole()!= 'administrator'){echo  Html::a('Ανανέωση', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ;}?>
                <?= Html::a('Διαγραφή', ['delete', 'id' => $model->ID], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Σίγουρα θέλετε να διαγράψετε την καταχώτηση αυτή;',
                        'method' => 'post',
                    ],
                ]) ?>
                <?php endif;?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'ID',
                    'professorID',
                    [   'label'=>'Επιβλέπων Καθηγητής',
                        'value'=>$model->professor->firstname.' '.$model->professor->lastname ,

                    ],
                    'title',
                    'description:ntext',
                    'goal:ntext',
                    'prerequisite_knowledge:ntext',
                    'max_students',
                    'comments:ntext',
                    'status',
                    'dateCreated:date',
                    'datePresented:date',
                    [   'attribute'=>'committee1',
                        'value'=>(isset($model->committee10)?$model->committee10->lastname.' '.$model->committee10->firstname:" "),
                    ],
                    [   'attribute'=>'committee2',
                        'value'=>(isset($model->committee20)?$model->committee20->lastname.' '.$model->committee20->firstname:" "),
                    ],
                    [   'attribute'=>'committee3',
                        'value'=>(isset($model->committee30)?$model->committee30->lastname.' '.$model->committee30->firstname:" "),
                    ],
                    'RequestPDf',

                    [   'attribute'=>'masterID',
                        'value'=>$model->master->title,
                        
                    ],

                ],
            ]) ?>
        </div>

        <div class="col-sm-3">

            <?php if(UserHelpers::UserRole()=="student" && UserHelpers::User()->masterID==$model->masterID) :?>
            <br><br><h3>Δηλώστε ενδιαφέρον για την διπλωματική:</h3>
            <?= Html::a('Δήλωση', ['//student/thesis-application-form','id'=>$model->ID,'professorID'=>$model->professorID], ['class' => 'btn btn-primary center-block']) ?>
        </div>
        <?php endif;?>
    </div>
</div>
