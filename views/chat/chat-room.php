<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\CustomHelpers\UserHelpers;
?>
<?php

$this->title="Συνομιλία";
if (UserHelpers::UserRole()=="student"){
$this->params['breadcrumbs'][]=['label'=>'Φοιτητής','url'=>'/student/main'];
$this->params['breadcrumbs'][] = $this->title;
}
elseif (UserHelpers::UserRole()=="professor"){
    $this->params['breadcrumbs'][]=['label'=>'Καθηγητής','url'=>'@web/professor/main'];
    $this->params['breadcrumbs'][]=['label'=>'Επικοινωνία με φοιτητές','url'=>'@web/professor/chat-main'];
    $this->params['breadcrumbs'][] = $this->title;
}?>

<div class="professor-chat-room">
    <div class="row">
        <div class="col-sm-8">
            <h1><?= Html::encode($this->title) ?></h1>
            <div class="chatting-main-window">
                <?php foreach ($messages as $message) {?>
                    <div class="media msg">
                        <a class="pull-left">
                            <span class="glyphicon glyphicon-user"></span>
                        </a>
                        <div class="media-body">
                            <small class="pull-right"> <?= date("d/m/Y G:i", strtotime($message->date_time)) ?> <span class="glyphicon glyphicon-time"></span></small>
                            <?php  if ($message->username == $Professor->userUsername):?>
                                <h5 class="media-heading professor"> <?php echo $Professor->firstname.' '.$Professor->lastname;?></h5>
                            <?php else :?>
                                <h5 class="media-heading student"><?php
                                    foreach ($StudentsThesisStudents as $Student){
                                        if ($message->username ==$Student->userUsername){
                                            echo $Student->firstname.' '.$Student->lastname;
                                        }
                                    };
                                    ?></h5>

                            <?php endif;?>
                            <small class="col-lg-10"><?= $message->message ?></small>
                        </div>
                    </div>
                <?php }?>
            </div>
            <div class="send-wrap ">
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'username')->hiddenInput(['value'=>UserHelpers::Username()])->label(false)?>
                <?= $form->field($model, 'thesisID')->hiddenInput(['value'=>$Thesis->ID])->label(false)?>
                <?= $form->field($model, 'message')->textarea(['rows' => 6])->label(false)?>
                <?= $form->field($model, 'file')->label("Αρχείο")->fileInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Αποστολή', ['class' => 'btn btn-success' ]) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <div class="col-sm-4 ">
            <h3>Διπλωματική:</h3>
            <p class="text-center"><?= $Thesis->title;?><br></p><br>
            <h3>Μέλη διπλωματικής: </h3><br>
                <div class="col-sm-10">Καθηγητής/Καθηγήτρια :<br> <b><?= $Professor->firstname.' '.$Professor->lastname?></b>
                </div>
                <div class="col-sm-2">
                    <?php if((isset($Professor->photo) && ($Professor->photo) != null)){
                        echo Html::img("@web/images/userPhotos/".$Professor->photo,['alt'=>"Professor photo","class"=>"center-block"  ]);
                    }else{
                    echo Html::img("@web/images/userPhotos/User_photo_default",['alt'=>"Professor photo","class"=>"center-block"  ]);}?><br>

                </div>


            <?php foreach ($StudentsThesisStudents as $Student){?>
                <div class="row">
                <div class="col-sm-10"><br>Φοιτητής/Φοιτήτρια :<br> <b> <?= $Student->firstname.' '.$Student->lastname?> </b></div>
                <div class="col-sm-2">
                    <?php if((isset($Student->photo) && ($Student->photo) != null)){
                        echo Html::img("@web/images/userPhotos/".$Student->photo,['alt'=>"Student photo","class"=>"center-block"  ]);
                    }else{
                    echo Html::img("@web/images/userPhotos/User_photo_default",['alt'=>"Student photo","class"=>"center-block"  ]);
                    }?><br>
                </div>
                </div>
                    <?php }?>

        </div>
    </div>
    <div class="row">
        <h3>Λίστα αρχείων</h3>
        <p style="text-align: center">Επιλέξτε απο την παρακάτω λίστα το αρχείο που θέλετε να ανοίξετε</p>
        <div class="col-sm-8 col-sm-offset-2">
            <div class="list-group" style="text-align: center">
                <?php foreach ($messages as $message) {?>
                    <?php if(isset($message->file)&&($message->file)!= null) :?>
                        <a href="\documents\chat_documents\<?=$message->file?>" class="list-group-item" target="_blank"><?= "Κωδικός αρχείου: ".$message->id.". Εστάλη στις: ".date("d/m/Y G:i", strtotime($message->date_time));?> </a>
                    <?php endif;?>
                <?php }?>
            </div>
        </div>
    </div>
</div>
