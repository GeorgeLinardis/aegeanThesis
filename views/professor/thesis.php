<?php
use yii\helpers\url;
use yii\helpers\Html;

?>
<?php
$this->title = 'Οι διπλωματικές μου';
$this->params['breadcrumbs'][] = ['label'=>'Καθηγητής','url'=>'main'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="professor-thesis">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-sm-3">
            <a href= "<?= url::to('@web/professor/thesis-create')?>" class="thumbnail">
                <?=Html::img("@web/images/professor/professor-thesis-creation(bluediamondgallery).jpg",['alt'=>"Create new thesis","class"=>"img-responsive center-block"  ])?>
            </a>
            <h4> Δημιουργία νέας διπλωματικής</h4>
        </div>

        <div class="col-sm-3 text-center">
            <a href="<?= url::to('@web/professor/thesis-active')?>" class="thumbnail">
                <?=Html::img("@web/images/professor/professor-thesis-under-construction(pexels).jpeg",['alt'=>"Manage Thesis","class"=>"img-responsive center-block"  ])?>

            </a>
            <h4> Τρέχουσες διπλωματικές</h4>
        </div>

        <div class="col-sm-3 text-center">
            <a href="<?= url::to('@web/professor/thesis-committee')?>" class="thumbnail">
                <?=Html::img("@web/images/professor/professor-thesis-committee(bluediamondgallery).jpg",['alt'=>"Committee thesis","class"=>"img-responsive center-block"  ])?>
            </a>
            <h4> Προς την Επιτροπή</h4>
        </div>

        <div class="col-sm-3 text-center">

            <a href="<?= url::to('@web/professor/thesis-past')?>" class="thumbnail">
                <?=Html::img("@web/images/professor/professor-thesis-past-thesis(pixabay).jpg",['alt'=>"Old thesis","class"=>"img-responsive center-block"  ])?>
            </a>
            <h4> Ολοκληρωμένες Διπλωματικές</h4>

        </div>




    </div>

</div>
