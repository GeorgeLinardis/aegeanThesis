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
            <a href= "<?= url::to('@web/admin/all-professors')?>" class="thumbnail">
                <?=Html::img("@web/images/admin/admin-professors(Pixabay)",['alt'=>"All Professors","class"=>"img-responsive center-block"  ])?>
            </a>
            <h4> Καθηγητές</h4>
        </div>

        <div class="col-sm-3">
            <a href="<?= url::to('@web/admin/all-students')?>" class="thumbnail">
                <?=Html::img("@web/images/admin/admin-students(Pexels)",['alt'=>"All Students","class"=>"img-responsive center-block"  ])?>
            </a>
            <h4> Φοιτητές</h4>
        </div>

        <div class="col-sm-3">
            <a href="<?= url::to('@web/admin/theses-main')?>" class="thumbnail">
                <?=Html::img("@web/images/admin/admin-theses",['alt'=>"All theses","class"=>"img-responsive center-block"  ])?>
            </a>
            <h4> Διπλωματικές</h4>
        </div>

        <div class="col-sm-3">

            <a href="<?= url::to('@web/admin/statistics')?>" class="thumbnail">
                <?=Html::img("@web/images/admin/admin-statistics(Pixabay)",['alt'=>"Statistics","class"=>"img-responsive center-block"])?>
            </a>
            <h4> Σατιστικά</h4>

        </div>




    </div>

</div>
