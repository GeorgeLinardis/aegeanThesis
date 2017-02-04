<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Thesis */

$this->title = 'Δημιουργία νέας διπλωματικής';
$this->params['breadcrumbs'][] = ['label'=>'Καθηγητής','url'=>'../professor'];
$this->params['breadcrumbs'][] = ['label'=>'Οι διπλωματικές μου','url'=>'../professor/thesis'];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="thesis-create">
    <h1><?= Html::encode($this->title) ?></h1><br>
    <div class="row">
        <div class="col-sm-6">
            <br>
            <p>Παρακαλώ συμπληρώστε τα στοιχεία σας στην παρακάτω φόρμα:</p><br />

            <div class="thesis-form">
                <?= $this->render('//thesis/_form', [
                    'model' => $model,

                ]) ?>

            </div>
        </div>
        <div class="col-sm-offset-1 col-sm-5">
            <img src="<?=Url::to('@web/images/professor/professor-create-thesis(pexels).jpg') ?>" alt="new thesis photo" class="img-rounded">
        </div>

    </div>

</div>
