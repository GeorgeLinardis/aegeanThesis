<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?php
$this->title = 'Καθηγητής';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="professor-main">
    <h1> Αρχική σελίδα <?= rtrim(Html::encode($this->title),"ς") ?></h1><br>
    <div class="row">
        <div class="col-sm-2">
            <a href= "<?= Url::to('/professor/thesis')?>" class="thumbnail">
                <img src="/images/professor/Professors-main-page-thesis" alt="Theses">
            </a>
            <h4> Οι Διπλωματικές μου </h4>
        </div>

        <div class="col-sm-2">
            <a href="<?= Url::to('/professor/committee')?>" class="thumbnail">
                <img src="/images/professor/Professors-main-page-committees" alt="Committees">
            </a>
            <h4> Επιτροπές τρίτων</h4>
        </div>

        <div class="col-sm-2">
            <a href= "<?= Url::to('/professor/statistics')?>" class="thumbnail">
                <img src="/images/professor/Professors-main-page-statistics(Pixabay)" alt="Statistics">
            </a>
            <h4> Στατιστικά</h4>
        </div>

        <div class="col-sm-2">
            <a href="<?= Url::to('/professor/my-references')?>" class="thumbnail">
                <img src="/images/professor/Professors-main-page-references" alt="My References">
            </a>
            <h4> Πηγές φοιτητών μου</h4>
        </div>
        <div class="col-sm-2">
            <a href="<?= Url::to('/professor/thesis-application-approvals')?>" class="thumbnail">
                <img src="/images/professor/Professor-thesis-interest(pixabay)" alt="Thesis-Approvals">
            </a>
            <h4> Αιτήσεις διπλωματικών</h4>
        </div>
        <div class="col-sm-2">
            <a href="<?= Url::to('/professor/my-references')?>" class="thumbnail">
                <img src="/images/professor/Professors-main-page-references" alt="My-References">
            </a>
            <h4> Αιτήσεις διπλωματικών</h4>
        </div>
    </div>
</div>