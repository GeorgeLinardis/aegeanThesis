<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\professor */

$this->title = 'Νέος Καθηγητής';
?>
<div class="professor-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
