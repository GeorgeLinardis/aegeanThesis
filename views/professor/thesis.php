<?php
use yii\helpers\url;
use yii\helpers\Html;

?>
<?php
$this->title = 'Διπλωματικές';
$this->params['breadcrumbs'][] = ['label'=>'Καθηγητής','url'=>'main'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="professor-thesis">
    <h1>Οι <?= Html::encode($this->title) ?> σας </h1>

    <div class="row">
        <div class="col-sm-3">
            <a href= "<?= url::to('/thesis/create')?>" class="thumbnail">
                <img src="/images/professor/professor-thesis-creation(bluediamondgallery).jpg" alt="Create NEW Thesis">
            </a>
            <h5> Δημιουργία νέας διπλωματικής</h5>
        </div>

        <div class="col-sm-3 text-center">
            <a href="<?= url::to('thesis-active')?>" class="thumbnail">
                <img src="/images/professor/professor-thesis-under-construction(pexels).jpeg" alt="Manage Thesis">
            </a>
            <h5> Τρέχουσες διπλωματικές</h5>
        </div>

        <div class="col-sm-3 text-center">
            <a href="<?= url::to('thesis-committee')?>" class="thumbnail">
                <img src="/images/professor/professor-thesis-committee(bluediamondgallery).jpg" alt="Committee Thesis">
            </a>
            <h5> Προς την Επιτροπή</h5>
        </div>

        <div class="col-sm-3 text-center">

            <a href="<?= url::to('thesis-past')?>" class="thumbnail">
                <img src="/images/professor/professor-thesis-past-thesis(pixabay).jpg" alt="OLD Thesis">
            </a>
            <h5> Διπλωματικές στο παρελθόν</h5>

        </div>




    </div>

</div>
