<?php
use yii\helpers\url;
use yii\helpers\Html;

?>
<?php
$this->title = 'Διπλωματικές';
$this->params['breadcrumbs'][] = ['label'=>'Καθηγητής','url'=>'index'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="professor-thesis">
    <div class="text-center"><h1>Οι <?= Html::encode($this->title) ?> σας </h1></div><br>

    <div class="row">
        <div class="col-sm-3">
            <a href= "<?= url::to('/thesis/create')?>" class="thumbnail">
                <img src="/images/professor/professor-thesis-creation(bluediamondgallery).jpg" alt="Create NEW Thesis">
            </a>
            <div> Δημιουργία νέας διπλωματικής</div>
        </div>

        <div class="col-sm-3 text-center">
            <a href="<?= url::to('/thesis/active')?>" class="thumbnail">
                <img src="/images/professor/professor-thesis-under-construction(pexels).jpeg" alt="Manage Thesis">
            </a>
            <div> Τρέχουσες διπλωματικές</div>
        </div>

        <div class="col-sm-3 text-center">
            <a href="<?= url::to('/thesis/committee')?>" class="thumbnail">
                <img src="/images/professor/professor-thesis-committee(bluediamondgallery).jpg" alt="Committee Thesis">
            </a>
            <div> Προς την Επιτροπή</div>
        </div>

        <div class="col-sm-3 text-center">

            <a href="<?= url::to('/thesis/past')?>" class="thumbnail">
                <img src="/images/professor/professor-thesis-past-thesis(pixabay).jpg" alt="OLD Thesis">
            </a>
            <div> Διπλωματικές στο παρελθόν</div>

        </div>




    </div>

</div>
