<?php
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $dataProvider \app\controllers\ThesisController*/
?>
<?php
$this->title = 'Οι Αναφορές μου';
$this->params['breadcrumbs'][] = ['label'=>'Καθηγητής','url'=>'main'];

?>

<div class="professor-my-references">
<?php if (isset($message)):?>

        <div class="col-sm-12">
            <?=Html::img("@web/images/broken-link.png",['alt'=>"Broken link","class"=>"thumbnail img-responsive center-block","style"=>"display: block; margin: 0 auto", "id"=>"broken-link-image-statistics-professor"  ])?>


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