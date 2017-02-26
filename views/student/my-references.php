<?php
use yii\helpers\Html;
?>
<?php

$this->title = 'Οι πηγές μου';
$this->params['breadcrumbs'][]=['label'=>'Φοιτητής','url'=>'../student/main'];
?>

<div class="row">
    <?php if (isset($message)):?>

            <div class="col-sm-12">
                <?=Html::img("@web/images/broken-link.png",['alt'=>"broken link","class"=>"broken-link-image"  ])?>
            <br>
            </div>
            <?= "<h2>".$message."</h2>"?>


    <?php else :?>

    <?php
        echo $this->render('//references/index', [
              'searchModel' => $searchModel,
              'dataProvider'=> $dataProvider,
              'Student'=>$Student,

         ]);

    ?>
    <?php endif;?>
</div>