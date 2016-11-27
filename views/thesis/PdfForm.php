<?php
use app\models\Professor;

?>

<?php $professor = Professor::find()->where(['ID'=> ($model->professorID)])->one();?>
<div class="pdfForm">
    <br />
    <h2 style="text-align: center">ΔΙΠΛΩΜΑΤΙΚΗ ΕΡΓΑΣΙΑ</h2>
    <br>
    <b class="titles-color"> Επιβλέπων Καθηγητής</b><br/>
    <i class="text-color"><?= $professor->firstname." ".$professor->lastname;?></i>
    <br /><br />
    <b class="titles-color"><?= $model->getAttributeLabel('title')?></b><br/>
    <i class="text-color"><?= $model->title;?></i>
    <br />
    <hr>

    <b class="titles-color"><?= $model->getAttributeLabel('description')?></b><br />
    <i class="text-color"><?= $model->description;?></i>
    <br /><br />

    <b class="titles-color"><?= $model->getAttributeLabel('goal')?></b><br />
    <i class="text-color"><?= $model->goal;?></i>
    <br /><br />

    <b class="titles-color"><?= $model->getAttributeLabel('comments')?></b><br />
    <i class="text-color"><?= $model->comments;?></i>
    <br /><br />


    <b class="titles-color"><?= $model->getAttributeLabel('prerequisite_knowledge')?></b><br />
    <i class="text-color"><?= $model->prerequisite_knowledge;?></i>
    <br /><br />

    <b class="titles-color"><?= $model->getAttributeLabel('max_students').": "?></b>
    <i class="text-color"><?= $model->max_students;?></i>
    <br /><br />

    <b class="titles-color"><?= $model->getAttributeLabel('dateCreated').": "?></b>
    <i class="text-color"><?= $model->dateCreated;?></i>
    <br /><br />

</div>













