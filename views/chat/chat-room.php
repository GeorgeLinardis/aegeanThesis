<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\CustomHelpers\UserHelpers;
?>
<div class="professor-chat-room">
    <div class="row">
        <div class="col-sm-8">
            <h3>Συνομιλία</h3>
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
                <?= $form->field($model, 'message')->textarea(['rows' => 6])->label(false)?>
                <?= $form->field($model, 'file')->fileInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Αποστολή μηνύματος', ['class' => 'btn btn-success' ]) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <div class="col-sm-4 ">
            <h3>Διπλωματική:</h3>
            <p class="text-center"><?= $Thesis->title;?><br></p>
            <h3>Μέλη διπλωματικής: </h3><br>
            <div class="col-sm-10">Καθηγητής :<br> <b><?= $Professor->firstname.' '.$Professor->lastname?></b></div>
            <div class="col-sm-2"><img src="/images/userPhotos/<?php echo (isset($Professor->photo) && ($Professor->photo) != null) ? $Professor->photo: "User_photo_default"?>" alt="Professor Photo" ><br></div>

            <?php foreach ($StudentsThesisStudents as $Student){?>
                <div class="col-sm-10"><br>Φοιτητής/Φοιτήτρια :<br> <b> <?= $Student->firstname.' '.$Student->lastname?> </b></div>
                <div class="col-sm-2"> <img src="/images/userPhotos/<?php echo (isset($Student->photo) && ($Student->photo) != null) ? $Student->photo: "User_photo_default"?>" alt="Student Photo" ><br></div>


            <?php }?>
        </div>
    </div>
    <hr>

