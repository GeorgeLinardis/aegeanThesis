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

    <div class="row">
        <div class="col-sm-3">
            <a href= "<?= url::to('thesis-create')?>" class="thumbnail">
                <img src="/images/professor/professor-thesis-creation(bluediamondgallery).jpg" alt="Create NEW Thesis">
            </a>
            <h4> Δημιουργία νέας διπλωματικής</h4>
        </div>

        <div class="col-sm-3 text-center">
            <a href="<?= url::to('thesis-active')?>" class="thumbnail">
                <img src="/images/professor/professor-thesis-under-construction(pexels).jpeg" alt="Manage Thesis">
            </a>
            <h4> Τρέχουσες διπλωματικές</h4>
        </div>

        <div class="col-sm-3 text-center">
            <a href="<?= url::to('thesis-committee')?>" class="thumbnail">
                <img src="/images/professor/professor-thesis-committee(bluediamondgallery).jpg" alt="Committee Thesis">
            </a>
            <h4> Προς την Επιτροπή</h4>
        </div>

        <div class="col-sm-3 text-center">

            <a href="<?= url::to('thesis-past')?>" class="thumbnail">
                <img src="/images/professor/professor-thesis-past-thesis(pixabay).jpg" alt="OLD Thesis">
            </a>
            <h4> Διπλωματικές στο παρελθόν</h4>

        </div>




    </div>

</div>
