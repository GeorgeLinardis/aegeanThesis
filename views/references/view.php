<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\References */
if (Yii::$app->request->referrer == 'http://aegean/professor/my-references'){
    $this->title = 'Οι Αναφορές μου';
    $this->params['breadcrumbs'][] = ['label'=>'Καθηγητής','url'=>'/professor/my-references'];
    $this->params['breadcrumbs'][] = $this->title;

}
else{
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Αναφορές', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

}
 ?>


<div class="references-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (\app\CustomHelpers\UserHelpers::UserRole()=='student') :?>
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
            'professorID',
            'studentID',
            'title',
            'author',
            'type',
            'URL:ntext',
            'date_created_by_author:date',
            'date_created_by_student:date',
            'date_updated_by_student:date',
            'file:ntext',
        ],
    ]) ?>


</div>
