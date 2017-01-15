<?php
use yii\helpers\url;
use yii\helpers\Html;

?>
<?php
$this->title = 'Φοιτητής';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="student-all-theses">
    <h1> Αρχική σελίδα <?= rtrim(Html::encode($this->title),"ς") ?></h1><br>
        <div class="row">
            <div class="col-sm-2">
                <a href= "<?= Url::to('/student/my-thesis')?>" class="thumbnail">
                    <img src="/images/student/student-mythesis(pexels).jpg" alt="My Thesis">
                </a>
                <h4> Η διπλωματική μου</h4>
            </div>

            <div class="col-sm-2">
                <a href="<?= Url::to('/student/my-references')?>" class="thumbnail">
                    <img src="/images/student/student-myreferences(pexels).jpg" alt="My References">
                </a>
                <h4> Οι πηγές μου</h4>
            </div>
            <div class="col-sm-2">
                <a href= "<?= Url::to('/thesis/index')?>" class="thumbnail">
                    <img src="/images/student/student-alltheses" alt="All theses">
                </a>
                <h4> Λίστα διπλωματικών</h4>
            </div>
            <div class="col-sm-2">
                <a href="<?= Url::to('/student/student-chat')?>" class="thumbnail">
                    <img src="/images/student/student-chat(pixabay).jpg" alt="Professor-chat">
                </a>
                <h4> Επικοινωνία με καθηγητή</h4>
            </div>
            <div class="col-sm-2">
                <a href="<?= Url::to('/student/thesis-application-results')?>" class="thumbnail">
                    <img src="/images/student/student-thesis-form.jpg" alt="Thesis-Application-Results">
                </a>
                <h4> Αιτήσεις νέας διπλωματικής</h4>
            </div>
            <div class="col-sm-2">
                <a href="<?= Url::to('/student/student-chat')?>" class="thumbnail">
                    <img src="/images/student/student-chat(pixabay).jpg" alt="Professor-chat">
                </a>
                <h4> Άλλα</h4>
            </div>
</div>
</div>