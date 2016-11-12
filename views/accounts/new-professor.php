
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="text-center"> Νεός Χρήστης</h3>
            <div class = "text-center">Παρακαλώ συμπληρώστε τα στοιχεία σας στην παρακάτω φόρμα:</div>
            <hr>
            <div class="form-horizontal ">


                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'new-student',
                    'enableAjaxValidation'=>true,
                    'clientOptions' => array(
                        'validateOnSubmit'=>true,
                        'validateOnChange'=>true,
                        'validateOnType'=>false,
                    ),
                )); ?>


                <?php echo $form->labelEx($model_users,"Username");?>
                <?php echo $form->textField($model_users,"Username",array(
                    'class'=>'form-control',
                    'placeholder'=>'username'));?>
                <?php echo $form->error($model_users,"Username",array('class'=>'text-danger'));?><br />


                <?php echo $form->labelEx($model_users,"Password");?>
                <?php echo $form->passwordField($model_users,"Password",array(
                    'class'=>'form-control',
                    'placeholder'=>'password'));?>
                <?php echo $form->error($model_users,"Password",array('class'=>'text-danger'));?><br />


                <?php echo $form->labelEx($model_professor,"firstname");?>
                <?php echo $form->textField($model_professor,"firstname",array(
                    'class'=>'form-control',
                    'placeholder'=>'Όνομα'));?>
                <?php echo $form->error($model_professor,"firstname",array('class'=>'text-danger'));?><br />


                <?php echo $form->labelEx($model_professor,"lastname");?>
                <?php echo $form->textField($model_professor,"lastname",array(
                    'class'=>'form-control',
                    'placeholder'=>'Επώνυμο'));?>
                <?php echo $form->error($model_professor,"lastname",array('class'=>'text-danger'));?><br />

                <?php echo $form->labelEx($model_professor,"telephone");?>
                <?php echo $form->textField($model_professor,"telephone",array(
                    'class'=>'form-control',
                    'placeholder'=>'Τηλέφωνο'));?>
                <?php echo $form->error($model_professor,"telephone",array('class'=>'text-danger'));?><br />


                <?php echo $form->labelEx($model_professor,"email");?>
                <?php echo $form->textField($model_professor,"email",array(
                    'class'=>'form-control',
                    'placeholder'=>'email'));?>
                <?php echo $form->error($model_professor,"email",array('class'=>'text-danger'));?><br />

                <?php echo $form->labelEx($model_professor,"url");?>
                <?php echo $form->textField($model_professor,"url",array(
                    'class'=>'form-control',
                    'placeholder'=>'Url'));?>
                <?php echo $form->error($model_professor,"url",array('class'=>'text-danger'));?><br />





                <?php echo CHtml::submitButton('Εγγραφή',array('class'=>'btn btn-success'));?>


                <?php $this->endWidget();?>

            </div>

        </div><!-- form -->

        <div class="col-sm-offset-1 col-sm-5">
            <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
            <img src="/images/keyboard(Pixabay).jpg" alt="keyboard photo" class="img-rounded" style="max-width: 100%; max-height: 100%">
        </div>




    </div>
</div>
