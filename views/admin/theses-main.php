<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?php
$this->title = 'Διπλωματικές';
$this->params['breadcrumbs'][] = ['label'=>'Διαχειριστής','url'=>'index'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="admin-all-theses">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">

        <div class="col-sm-4 text-center">
            <a href="<?= url::to('@web/admin/all-theses-active')?>" class="thumbnail">
                <?=Html::img("@web/images/admin/admin-thesis-under-construction(pexels).jpeg",['alt'=>"Manage Thesis","class"=>"img-responsive center-block"  ])?>
            </a>
            <h4> Τρέχουσες διπλωματικές</h4>
        </div>

        <div class="col-sm-4 text-center">
            <a href="<?= url::to('@web/admin/all-theses-committee')?>" class="thumbnail">
                <?=Html::img("@web/images/admin/admin-thesis-committee(bluediamondgallery).jpg",['alt'=>"Committee","class"=>"img-responsive center-block"  ])?>
            </a>
            <h4> Προς την Επιτροπή</h4>
        </div>

        <div class="col-sm-4 text-center">

            <a href="<?= url::to('@web/admin/all-theses-past')?>" class="thumbnail">
                <?=Html::img("@web/images/admin/admin-thesis-past-thesis(pixabay).jpg",['alt'=>"Old thesis","class"=>"img-responsive center-block"  ])?>
            </a>
            <h4> Διπλωματικές στο παρελθόν</h4>

        </div>




    </div>

</div>
