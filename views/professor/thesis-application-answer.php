<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php
$this->title = 'Έγκριση αιτήματος ανάθεσης διπλωματικής';
$this->params['breadcrumbs'][]=['label'=>'Καθηγητής','url'=>'/professor/main'];
$this->params['breadcrumbs'][]=['label'=>'Αιτήσεις για νέες διπλωματικές','url'=>'/professor/thesis-application-approvals'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="professor-thesis-application-answer">

    <h1><?= Html::encode($this->title) ?></h1><br>

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

    <?= $form->field($Thesis, 'dateCreated')->textInput(['readonly'=>'true','value'=>date("d/m/Y", strtotime($Thesis->dateCreated))])->label('Ημερομηνία δημιουργίας')?>

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

        <?= $form->field($Student, 'email')->textInput(['readonly'=>'true','value'=>$Student->email])->label('Email φοιτητή')?>

        <?= $form->field($Student, 'cv')->textInput(['readonly'=>'true','value'=>((isset($Student->cv) && $Student->cv!=null))?$Student->cv:'Ο χρήστης δεν έχει ανεβάσει βιογραφικό'])->label('Βιογραφικό φοιτητή')?>




        <?php ActiveForm::end(); ?>
        <?php if(isset($Student->cv) && $Student->cv!=null):?>
         <p>Για να δείτε το βιογραφικό επιλέξτε <a href="\documents\cv\<?= $Student->cv?>" target="_blank">εδώ</a></p>
        <?php endif;?>
    </div>



    </div>



</div>
