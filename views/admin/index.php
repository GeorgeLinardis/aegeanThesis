<?php
use yii\helpers\url;
use yii\helpers\Html;

?>
<?php
$this->title = 'Διαχειριστής';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="professor-thesis">
    <h1> Αρχική σελίδα <?= rtrim(Html::encode($this->title),"ς") ?></h1><br>

    <div class="row">
        <div class="col-sm-3">
            <a href= "<?= url::to('all-professors')?>" class="thumbnail">
                <img src="/images/admin/admin-professors(Pixabay)" alt="All Professors">
            </a>
            <h4> Καθηγητές</h4>
        </div>

        <div class="col-sm-3">
            <a href="<?= url::to('all-students')?>" class="thumbnail">
                <img src="/images/admin/admin-students(Pexels)" alt="All-students">
            </a>
            <h4> Φοιτητές</h4>
        </div>

        <div class="col-sm-3">
            <a href="<?= url::to('theses-main')?>" class="thumbnail">
                <img src="/images/admin/admin-theses" alt="All-theses">
            </a>
            <h4> Διπλωματικές</h4>
        </div>

        <div class="col-sm-3">

            <a href="<?= url::to('statistics')?>" class="thumbnail">
                <img src="/images/admin/admin-statistics(Pixabay)" alt="Statistics">
            </a>
            <h4> Σατιστικά</h4>

        </div>




    </div>

</div>
