<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\CustomHelpers\UserHelpers;

/* @var $this yii\web\View */
/* @var $model app\models\References */

if (Yii::$app->controller->id=="references") {
    $this->title = 'Επισκόπηση πηγής';
    $this->params['breadcrumbs'][] = ['label' => 'Πηγές', 'url' => '@web/references/index'];
    $this->params['breadcrumbs'][] = $this->title;


}
 ?>


<div class="references-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (UserHelpers::User()->ID==$model->studentID) :?>
        <?= Html::a('Ανανέωση', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Διαγραφή', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Σίγουρα θέλετε να το διαγράψετε ;',
                'method' => 'post',
            ],
        ]) ?>
        <?php endif;?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            [   'label'=>'Καθηγητής/Καθηγήτρια',
                'value'=>(($model->professor->firstname)!=null ||($model->professor->lastname)!=null )?($model->professor->lastname.' '.$model->professor->firstname):$model->professorID,
            ],
            [   'label'=>'Φοιτητής/Φοιτητήτρια',
                'value'=>(($model->student->firstname)!=null ||($model->student->lastname)!=null )?($model->student->lastname.' '.$model->student->firstname):$model->studentID,
            ],
            'title',
            'author',
            'PublishedTo',
            'type',
            [
                'attribute'=>"URL",
                'value'=>$model->URL,
                'format'=>'url',
                'target'=>"_blank",

            ],

            'BipText',

            'date_created_by_author:date',
            'date_created_by_student:date',
            'date_updated_by_student:date',
            //'file:ntext',
        ],
    ]) ?>


</div>
