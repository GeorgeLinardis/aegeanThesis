<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\professor */

$this->title = 'Προφίλ ';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="professor-view">


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
            'url:url',
            //'photo',
        ],
    ]) ?>
    <p>Για να οδηγηθείτε στην λίστα με τα μεταπτυχιακά στα οποία είστε μέλος επιλέξτε <a href="/professor/professor-masters">εδώ</a></p>

    <?= Html::a('Τροποποίηση', ['//professor/update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>

</div>
