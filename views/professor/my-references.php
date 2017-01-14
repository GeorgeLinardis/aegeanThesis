<?php
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $dataProvider \app\controllers\ThesisController*/
?>
<?php
$this->title = 'Οι αναφορές μου';
$this->params['breadcrumbs'][] = ['label'=>'Καθηγητής','url'=>'main'];

?>

<div class="professor-my-references">

<?php if ($message):?>

        <div class="col-sm-offset-3 col-sm-9">
            <img src="/images/broken-link.png" class="thumbnail" alt="broken link" id="broken-link-image-statistics-professor">

        </div>
        <?= "<h2>".$message."</h2>"?>

<?php else: ?>


    <?php
    echo $this->render('//references/index', [

        'dataProvider'=>$dataProvider,
        'searchModel' => $searchModel
    ])
    ?>

<?php endif;?>

</div>