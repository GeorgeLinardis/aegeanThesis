<?php
use yii\helpers\url;

?>

<div class="text-center"><h3>Αρχική σελίδα</h3></div>
<div class="row">
    <div class="col-sm-6 text-center">
        <a href= "<?= url::to('/student/my-thesis')?>" class="thumbnail">
            <img src="/images/student/student-mythesis(pexels).jpg" alt="My Thesis">
        </a>
        <div style="text-align: center ;font-weight: bold;"> Η διπλωματική μου</div>
    </div>

    <div class="col-sm-6 text-center">
        <a href="<?= url::to('/student-references/index')?>" class="thumbnail">
            <img src="/images/student/student-myreferences(pexels).jpg" alt="My References">
        </a>
        <div style="text-align: center ;font-weight: bold;"> Οι πηγές μου</div>
    </div>
</div>
<br />

<div class="row">
    <div class="col-sm-6 text-center">
        <a href= "<?= url::to('/student/all-theses')?>" class="thumbnail">
            <img src="/images/student/student-alltheses" alt="All theses">
        </a>
        <div style="text-align: center ;font-weight: bold;"> Λίστα διπλωματικών ΠΜΣ</div>
    </div>

    <div class="col-sm-6 text-center">
        <a href="<?= url::to('/student/all-theses')?>" class="thumbnail">
            <img src="/images/student/student-else.jpg" alt="My References">
        </a>
        <div style="text-align: center ;font-weight: bold;"> Κάτι άλλο</div>
    </div>
</div>
<br />