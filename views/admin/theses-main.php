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
            <a href="<?= url::to('all-theses-active')?>" class="thumbnail">
                <img src="/images/admin/admin-thesis-under-construction(pexels).jpeg" alt="Manage Thesis">
            </a>
            <h4> Τρέχουσες διπλωματικές</h4>
        </div>

        <div class="col-sm-4 text-center">
            <a href="<?= url::to('all-theses-committee')?>" class="thumbnail">
                <img src="/images/admin/admin-thesis-committee(bluediamondgallery).jpg" alt="Committee Thesis">
            </a>
            <h4> Προς την Επιτροπή</h4>
        </div>

        <div class="col-sm-4 text-center">

            <a href="<?= url::to('all-theses-past')?>" class="thumbnail">
                <img src="/images/admin/admin-thesis-past-thesis(pixabay).jpg" alt="OLD Thesis">
            </a>
            <h4> Διπλωματικές στο παρελθόν</h4>

        </div>




    </div>

</div>
