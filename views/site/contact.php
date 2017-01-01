
<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $dataProvider app\models\Professor */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;

$this->title = 'Επικοινωνία Καθηγητές';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'firstname',
            'lastname',
            'telephone1',
            'telephone2',
            'email:email',
            'url:url',

        ],
    ]) ?>
</div>

