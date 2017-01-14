<?php

$this->title = 'Οι Αναφορές μου';
$this->params['breadcrumbs'][]=['label'=>'Φοιτητής','url'=>'../student/main'];
?>


<?php if ($message):?>

        <div class="col-sm-offset-3 col-sm-9">
            <img src="/images/broken-link.png" class="thumbnail" alt="broken link" id="broken-link-image-statistics-professor">

        </div>
        <?= "<h2>".$message."</h2>"?>


<?php else :?>
<?
 echo $this->render('//references/index', [
          'searchModel' => $searchModel,
          'dataProvider'=> $dataProvider,
          'Student'=>$Student,

     ]);

?>
<?php endif;?>
