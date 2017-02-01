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
                <img src="/images/professor/Professors-main-page-thesis" alt="My Theses photo">
            </a>
            <h4> Οι Διπλωματικές μου </h4>
        </div>

        <div class="col-sm-2">
            <a href="<?= Url::to('/professor/committee')?>" class="thumbnail">
                <img src="/images/professor/Professors-main-page-committees" alt="Committees photo">
            </a>
            <h4> Επιτροπές τρίτων</h4>
        </div>

        <div class="col-sm-2">
            <a href= "<?= Url::to('/professor/statistics')?>" class="thumbnail">
                <img src="/images/professor/Professors-main-page-statistics(Pixabay)" alt="Statistics photo">
            </a>
            <h4> Στατιστικά</h4>
        </div>

        <div class="col-sm-2">
            <a href="<?= Url::to('/professor/my-references')?>" class="thumbnail">
                <img src="/images/professor/Professors-main-page-references" alt="My References photo">
            </a>
            <h4> Πηγές φοιτητών μου</h4>
        </div>
        <div class="col-sm-2">
            <a href="<?= Url::to('/professor/thesis-application-approvals')?>" class="thumbnail">
                <img src="/images/professor/Professor-thesis-interest(pixabay)" alt="Thesis-Approvals photo">
            </a>
            <h4> Αιτήσεις για νέες διπλωματικές</h4>
        </div>
        <div class="col-sm-2">
            <a href="<?= Url::to('/professor/chat-main')?>" class="thumbnail">
                <img src="/images/professor/Professors-main-page-chat.jpg" alt="Chat-room-main photo">
            </a>
            <h4> Επικοινωνία με φοιτητές</h4>
        </div>
    </div>
</div>