<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\CustomHelpers\UserHelpers;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ThesisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Διπλωματικές';
?>
<div class="thesis-index">

    <?php
    echo $this->render('//thesis/index', [

        'dataProvider'=>$dataProvider,
        'searchModel' => $searchModel
    ])
    ?>

</div>
