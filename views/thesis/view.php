<?php

use yii\widgets\DetailView;

?>

<h2>Αναλυτική εικόνα Διπλωματικής</h2><br />

<?=

DetailView::widget([
    'model' => $model,
    'attributes' => [
        'ID' ,
        'professorID' ,
        'title' ,
        'description' ,
        'goal',
        'prerequisite_knowledge',
        'max_students' ,
        'comments' ,
        'status' ,
        'dateCreated' ,
        'datePresented' ,
        'committee1' ,
        'committee2' ,
        'committee3' ,
        'RequestPDf' ,

    ],
]); ?>


