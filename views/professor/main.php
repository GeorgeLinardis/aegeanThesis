<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?php
$this->title = 'Καθηγητής';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="professor-main">
    <div class="row">
        <div class="col-sm-6">
            <a href= "<?= Url::to('/professor/thesis')?>" class="thumbnail">
                <img src="/images/professor/Professors-main-page-thesis" alt="Theses">
            </a>
            <h3> Οι Διπλωματικές μου </h3>
        </div>

        <div class="col-sm-6">
            <a href="<?= Url::to('/professor/committee')?>" class="thumbnail">
                <img src="/images/professor/Professors-main-page-committees" alt="Committees">
            </a>
            <h3> Επιτροπές τρίτων</h3>
        </div>
    </div><br>

    <div class="row">
        <div class="col-sm-6">
            <a href= "<?= Url::to('/professor/statistics')?>" class="thumbnail">
                <img src="/images/professor/Professors-main-page-statistics(Pixabay)" alt="Statistics">
            </a>
            <h3> Στατιστικά</h3>
        </div>

        <div class="col-sm-6">
            <a href="<?= Url::to('/student/all-theses')?>" class="thumbnail">
                <img src="/images/professor/Professors-main-page-references" alt="My References">
            </a>
            <h3> Πηγές φοιτητών μου</h3>
        </div>
    </div>
</div>