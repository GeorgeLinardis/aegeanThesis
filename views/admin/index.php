<?php
use yii\helpers\url;
use yii\helpers\Html;

?>
<?php
$this->title = 'Διαχειριστής';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="professor-thesis">
    <div class="text-center"><h1><?= Html::encode($this->title) ?> </h1></div><br>

    <div class="row">
        <div class="col-sm-3">
            <a href= "<?= url::to('all-professors')?>" class="thumbnail">
                <img src="/images/admin/admin-professors(Pexels)" alt="All Professors">
            </a>
            <h5> Καθηγητές</h5>
        </div>

        <div class="col-sm-3 text-center">
            <a href="<?= url::to('all-students')?>" class="thumbnail">
                <img src="/images/admin/admin-students(Pexels)" alt="All-students">
            </a>
            <h5> Φοιτητές</h5>
        </div>

        <div class="col-sm-3 text-center">
            <a href="<?= url::to('all-theses')?>" class="thumbnail">
                <img src="/images/admin/admin-theses" alt="All-theses">
            </a>
            <h5> Διπλωματικές</h5>
        </div>

        <div class="col-sm-3 text-center">

            <a href="<?= url::to('statistics')?>" class="thumbnail">
                <img src="/images/admin/admin-statistics(Pixabay)" alt="Statistics">
            </a>
            <h5> Σατιστικά</h5>

        </div>




    </div>

</div>
