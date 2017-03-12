<?php
use app\models\Professor;
use yii\helpers\Html;

?>
<div class="thesis-past-form">
    <?php $professor = Professor::find()->where(['ID'=> (\app\CustomHelpers\UserHelpers::User()->ID)])->one();?>

    <div class="pdfForm">
        <br />
        <h5 style="text-align: left; color:dimgray">ΠΑΝΕΠΙΣΤΗΜΙΟ ΑΙΓΑΙΟΥ <br><?= $model->master->title?><br><br></h5>

        <h2 style="text-align: center">ΔΙΠΛΩΜΑΤΙΚΗ ΕΡΓΑΣΙΑ</h2>
        <br>
        <b class="titles-color"><?= $model->getAttributeLabel('title')?></b><br/>
        <i class="text-color"><?= $model->title;?></i>
        <br /><br />

        <b class="titles-color"> Επιβλέπων Καθηγητής</b><br/>
        <i class="text-color"><?= $professor->firstname." ".$professor->lastname;?></i>
        <br /><br />

        <b class="titles-color">Φοιτητές/Φοιτήτρια</b><br/>
        <i class="text-color">
            <?php foreach ($modelStudents as $student){
            echo $student->student->firstname." ".$student->student->lastname." - ".$student->student->registrationNumber."<br>";
        }?>
       </i>
        <br />

        <b class="titles-color"><?= $model->getAttributeLabel('grade').": "?></b>
        <i class="text-color"><?= $model->grade;?></i>
        <br /><br />

        <b class="titles-color"><?= $model->getAttributeLabel('committee1').": "?></b>
        <i class="text-color"><?php $committee1 = Professor::find()->where(['ID'=> ($model->committee1)])->one(); echo $committee1->lastname.' '.$committee1->firstname."<br>"?></i>
        <?php if(isset($model->committee10->signature )&& (!empty($model->committee10->signature))):?>
            <?php echo Html::img("@web/images/userPhotos/signatures/".$model->committee10->signature ,['alt'=>"Professor1 signature","class"=>"professor-signature img-responsive","style"=>"width:180px ; height:90px"]); ?>
        <?php endif;?>
        <br /><br />

        <b class="titles-color"><?= $model->getAttributeLabel('committee2').": "?></b>
        <i class="text-color"><?php $committee2 = Professor::find()->where(['ID'=> ($model->committee2)])->one(); echo $committee2->lastname.' '.$committee2->firstname."<br>"?></i>
        <?php if(isset($model->committee20->signature )&& (!empty($model->committee20->signature))):?>
            <?php echo Html::img("@web/images/userPhotos/signatures/".$model->committee20->signature ,['alt'=>"Professor2 signature","class"=>"professor-signature img-responsive","style"=>"width:180px ; height:90px"]); ?>
        <?php endif;?>
        <br /><br />


        <b class="titles-color"><?= $model->getAttributeLabel('committee3').": "?></b>
        <i class="text-color"><?php $committee3 = Professor::find()->where(['ID'=> ($model->committee3)])->one(); echo $committee3->lastname.' '.$committee3->firstname."<br>"?></i>
        <?php if(isset($model->committee30->signature )&& (!empty($model->committee30->signature))):?>
            <?php echo Html::img("@web/images/userPhotos/signatures/".$model->committee30->signature ,['alt'=>"Professor3 signature","class"=>"professor-signature img-responsive","style"=>"width:180px ; height:90px"]); ?>
        <?php endif;?>
        <br /><br />

        <b class="titles-color"><?= $model->getAttributeLabel('dateCompleted').": "?></b>
        <i class="text-color"><?= $model->dateCompleted;?></i>
        <br /><br />


    </div>




</div>







































