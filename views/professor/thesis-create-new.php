<?php
use yii\helpers\Url;
use yii\helpers\Html;

/* @var $dataProvider \app\controllers\ThesisController*/
?>
<?php
$this->title = 'Νέα Διπλωματική';
$this->params['breadcrumbs'][] = ['label'=>'Καθηγητής','url'=>'../professor'];
$this->params['breadcrumbs'][] = ['label'=>'Διπλωματικές','url'=>'../professor/thesis'];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="professor-thesis-create-new">
    <div class="row">
        <div class="col-sm-6">
            <h3><span class="glyphicon glyphicon-blackboard"></span><?= ' '.Html::encode($this->title) ?></h3>

            <p>Παρακαλώ συμπληρώστε τα στοιχεία σας στην παρακάτω φόρμα:</p><br />

            <div class="thesis-form">
                 <?php  echo $this->render('//thesis/create', ['model'=>$model,])?>
            </div>
        </div>
        <div class="col-sm-offset-1 col-sm-5">
             <img src="<?=Url::to('@web/images/professor/professor-create-thesis(pexels).jpg') ?>" alt="new thesis photo" class="img-rounded">
        </div>
    </div>
</div>