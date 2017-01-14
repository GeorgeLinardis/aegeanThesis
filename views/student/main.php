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
    <div class="col-sm-3">
        <a href= "<?= Url::to('/student/my-thesis')?>" class="thumbnail">
            <img src="/images/student/student-mythesis(pexels).jpg" alt="My Thesis">
        </a>
        <h3> Η διπλωματική μου</h3>
    </div>

    <div class="col-sm-3">
        <a href="<?= Url::to('/student/my-references')?>" class="thumbnail">
            <img src="/images/student/student-myreferences(pexels).jpg" alt="My References">
        </a>
        <h3> Οι πηγές μου</h3>
    </div>
    <div class="col-sm-3">
        <a href= "<?= Url::to('/thesis/index')?>" class="thumbnail">
            <img src="/images/student/student-alltheses" alt="All theses">
        </a>
        <h3> Λίστα διπλωματικών</h3>
    </div>

    <div class="col-sm-3">
        <a href="<?= Url::to('/student/student-chat')?>" class="thumbnail">
            <img src="/images/student/student-chat(pixabay).jpg" alt="Professor-chat">
        </a>
        <h3> Επικοινωνία με καθηγητή</h3>
    </div>
</div>
</div>