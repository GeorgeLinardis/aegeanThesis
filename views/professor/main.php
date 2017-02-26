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
            <a href= "<?= Url::to('@web/professor/thesis')?>" class="thumbnail">
                <?=Html::img("@web/images/professor/Professors-main-page-thesis(pixabay)",['alt'=>"My theses photo","class"=>"img-responsive center-block"  ])?>
            </a>
            <h4> Οι διπλωματικές μου </h4>
        </div>

        <div class="col-sm-2">
            <a href="<?= Url::to('@web/professor/committee')?>" class="thumbnail">
                <?=Html::img("@web/images/professor/Professors-main-page-committees(pixabay)",['alt'=>"Committees photo","class"=>"img-responsive center-block"  ])?>
            </a>
            <h4> Επιτροπές τρίτων</h4>
        </div>

        <div class="col-sm-2">
            <a href= "<?= Url::to('@web/professor/statistics')?>" class="thumbnail">
                <?=Html::img("@web/images/professor/Professors-main-page-statistics(pixabay)",['alt'=>"Statistics photo","class"=>"img-responsive center-block"  ])?>
            </a>
            <h4> Στατιστικά στοιχεία</h4>
        </div>

        <div class="col-sm-2">
            <a href="<?= Url::to('@web/professor/my-references')?>" class="thumbnail">
                <?=Html::img("@web/images/professor/Professors-main-page-references(bluediamondgallery)",['alt'=>"My References photo","class"=>"img-responsive center-block"  ])?>
            </a>
            <h4> Πηγές φοιτητών μου</h4>
        </div>
        <div class="col-sm-2">
            <a href="<?= Url::to('@web/professor/thesis-application-approvals')?>" class="thumbnail">
                <?=Html::img("@web/images/professor/Professor-thesis-interest(pixabay)",['alt'=>"Thesis-Approvals photo","class"=>"img-responsive center-block"  ])?>
            </a>
            <h4> Αιτήσεις για νέες διπλωματικές</h4>
        </div>
        <div class="col-sm-2">
            <a href="<?= Url::to('@web/professor/chat-main')?>" class="thumbnail">
                <?=Html::img("@web/images/professor/Professors-main-page-chat(pixabay).jpg",['alt'=>"Chat-room-main photo","class"=>"img-responsive center-block"  ])?>
            </a>
            <h4> Επικοινωνία με φοιτητές</h4>
        </div>
    </div>
</div>