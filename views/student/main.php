<?php
use yii\helpers\url;

?>
<?php
$this->title = 'Φοιτητής';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="student-all-theses">
<div class="row">
    <div class="col-sm-6">
        <a href= "<?= Url::to('/student/my-thesis')?>" class="thumbnail">
            <img src="/images/student/student-mythesis(pexels).jpg" alt="My Thesis">
        </a>
        <h3> Η διπλωματική μου</h3>
    </div>

    <div class="col-sm-6">
        <a href="<?= Url::to('/student/my-references')?>" class="thumbnail">
            <img src="/images/student/student-myreferences(pexels).jpg" alt="My References">
        </a>
        <h3> Οι πηγές μου</h3>
    </div>
</div><br>

<div class="row">
    <div class="col-sm-6">
        <a href= "<?= Url::to('/student/all-theses')?>" class="thumbnail">
            <img src="/images/student/student-alltheses" alt="All theses">
        </a>
        <h3> Λίστα διπλωματικών ΠΜΣ</h3>
    </div>

    <div class="col-sm-6">
        <a href="<?= Url::to('/student/all-theses')?>" class="thumbnail">
            <img src="/images/student/student-else.jpg" alt="My References">
        </a>
        <h3> Κάτι άλλο</h3>
    </div>
</div>
</div>