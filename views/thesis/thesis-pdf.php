<?php
use app\models\Professor;

?>
<div class="thesis-past-form">
    <?php $professor = Professor::find()->where(['ID'=> (\app\CustomHelpers\UserHelpers::User()->ID)])->one();?>

    <div class="pdfForm">
        <br />
        <h5 style="text-align: left; color:dimgray">ΠΑΝΕΠΙΣΤΗΜΙΟ ΑΙΓΑΙΟΥ <br><?= $model->master->title?><br><br></h5>

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

        <b class="titles-color"><?= $model->getAttributeLabel('committee1').": "?></b>
        <i class="text-color"><?php $committee1 = Professor::find()->where(['ID'=> ($model->committee1)])->one(); echo $committee1->lastname.' '.$committee1->firstname?></i>
        <br /><br />

        <b class="titles-color"><?= $model->getAttributeLabel('committee2').": "?></b>
        <i class="text-color"><?php $committee2 = Professor::find()->where(['ID'=> ($model->committee2)])->one(); echo $committee2->lastname.' '.$committee2->firstname?></i>
        <br /><br />

        <b class="titles-color"><?= $model->getAttributeLabel('committee3').": "?></b>
        <i class="text-color"><?php $committee3 = Professor::find()->where(['ID'=> ($model->committee3)])->one(); echo $committee3->lastname.' '.$committee3->firstname?></i>
        <br /><br />

        <b class="titles-color"><?= $model->getAttributeLabel('dateCreated').": "?></b>
        <i class="text-color"><?= $model->dateCreated;?></i>
        <br /><br />

    </div>




</div>

