<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Student */

$this->title = 'Create Student';

?>
<div class="student-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
