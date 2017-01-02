<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>
<div class="col-sm-6">
    <div class="panel-group">
        <div class="panel">
            <div class="panel-heading panel-success"><?= $form->field($model, 'Sender') ?></div>
        </div>
        <div class="panel">
            <div class="panel-heading panel-primary"> <?= $form->field($model, 'message') ?></div>
        </div>
        <div class="panel">
            <div class="panel-heading panel-primary"> <?= $form->field($model, 'reg_date') ?> </div>
        </div>
        <div class="panel-footer">
          <span class="input-group-btn">
                         <?= Html::submitButton('Αποστολή', ['class' => 'btn btn-primary']) ?></span>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>

<div class="col-sm-5">


<pre>
    <?php foreach ($messages as $message) {
                echo $message->Sender.' '.$message->message.'<br>';

                 }
    ?>
</pre>


</div>

