<?php

use yii\helpers\Html;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model app\models\Thesis */

$this->title = 'Νέα Διπλωματική';
$this->params['breadcrumbs'][] = ['label'=>'Καθηγητής','url'=>'../professor'];
$this->params['breadcrumbs'][] = ['label'=>'Διπλωματικές','url'=>'../professor/thesis'];
$this->params['breadcrumbs'][] = $this->title;
?>


<?php Yii::$app->controller->id?>

<div class="thesis-create">
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
