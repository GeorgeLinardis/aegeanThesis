<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>


<div class="professor-thesis-application-answer">

    <h1>Έγκριση αιτήματος ανάθεσης διπλωματικής</h1><br>

    <div class="col-sm-6">
        <img src="/images/userPhotos/<?php echo (isset($Professor->photo) && ($Professor->photo) != null) ? $Professor->photo: "User_photo_default"?>" alt="User photo" id="aegean-logo"><br>


    <form>
        <div class="form-group">
            <label>Μεταπτυχιακό πρόγραμμα</label>
            <input type="text" class="form-control" placeholder="<?=$Thesis->master->title?>" readonly>
        </div>
    </form>
    <?php $form = ActiveForm::begin([
        'options' => [
            'enableAjaxValidation' => true,
            ],
    ]); ?>
    <?= $form->field($Thesis, 'title')->textInput(['readonly'=>'true','value'=>$Thesis->title])->label('Τίτλος Διπλωματικής')?>

    <?= $form->field($Thesis, 'masterID')->hiddenInput(['readonly'=>'true','value'=>$Thesis->masterID ])->label(false)?>

    <?= $form->field($Thesis, 'max_students')->textInput(['readonly'=>'true','value'=>$Thesis->max_students])->label('Μέγιστος αριθμός φοιτητών')?>

    <?= $form->field($Thesis, 'status')->hiddenInput(['readonly'=>'true','value'=>'έχει ανατεθεί'])->label(false)?>

        <div class="form-group">
            <?= Html::submitButton('Έγκριση αιτήματος', ['class' => 'btn btn-success' ]) ?>

        </div>

        <?php ActiveForm::end(); ?>

        </div>

    <div class="col-sm-6">
        <img src="/images/userPhotos/<?php echo (isset($Student->photo) && ($Student->photo) != null) ? $Student->photo: "User_photo_default"?>" alt="User photo" id="aegean-logo"><br>
        <?php $form = ActiveForm::begin([
            'options' => [
                'enableAjaxValidation' => true,
            ],
        ]); ?>
        <?= $form->field($Student, 'firstname')->textInput(['readonly'=>'true','value'=>$Student->firstname])->label('Όνομα φοιτητή')?>

        <?= $form->field($Student, 'lastname')->textInput(['readonly'=>'true','value'=>$Student->lastname])->label('Επώνυμο φοιτητή')?>

        <?= $form->field($Student, 'skypeUsername')->textInput(['readonly'=>'true','value'=>$Student->skypeUsername])->label('Skype φοιτητή')?>


        <?php ActiveForm::end(); ?>

    </div>



    </div>



</div>
