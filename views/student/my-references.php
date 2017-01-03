<?php

$this->title = 'Οι Αναφορές μου';
$this->params['breadcrumbs'][]=['label'=>'Φοιτητής','url'=>'../student/main'];



 echo $this->render('//references/index', [
          'searchModel' => $searchModel,
          'dataProvider'=> $dataProvider,
     ]);



?>