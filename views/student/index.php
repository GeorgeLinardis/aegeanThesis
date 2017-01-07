<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
?>
<div class="student-index">

   
    <p>
        <?= Html::a('Νέος Φοιτητής', ['student/create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'masterID',
            //'thesisID',
            'ID',
            //'userUsername',
            'firstname',
             'lastname',
            'telephone1',
            'telephone2',
            'email:email',
            'skypeUsername',
            //'url:ntext',
            //'comments:ntext',
            //'photo',

            ['class' => 'yii\grid\ActionColumn',
             'controller'=>'student'],
        ],
    ]); ?>
</div>
