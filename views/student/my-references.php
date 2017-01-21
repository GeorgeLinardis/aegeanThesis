<?php

$this->title = 'Οι Αναφορές μου';
$this->params['breadcrumbs'][]=['label'=>'Φοιτητής','url'=>'../student/main'];
?>


<?php if ($message):?>

        <div class="col-sm-12">
            <img class="broken-link-image" src="/images/broken-link.png" alt="broken link">
            <br>
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
