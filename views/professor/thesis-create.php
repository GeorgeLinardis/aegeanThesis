<?php /* @var $model ProfessorController
@var $professorData ProfessorController
@var $allProfessorsData ProfessorController
 */
?>

<div class="container">
    <h1 class="text-center"><?php ?>Δημιουργία νέας διπλωματικής</h1><br />


    <div class="row">
        <div class="col-sm-offset-1 col-sm-5">
            <div class="form-horizontal">

                <?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'thesis-new-form',
                    'enableAjaxValidation'=>true,
                    'clientOptions' => array(
                        'validateOnSubmit'=>true,
                        'validateOnChange'=>true,
                        'validateOnType'=>false,
                    ),
                )); ?>
                <br /><br />
                <div class="row">
                    <?php echo $form->labelEx($model,'professorID'); ?>
                    <?php echo $form->textField($model,'professorID',array(
                        'disabled'=>true,
                        'class'=>'form-control',
                        'value'=>($professorUserData->fullName()),
                    )); ?>
                    <?php echo $form->error($model,'professorID',array('class'=>'text-danger')); ?>
                </div>


                <div class="row">
                    <?php echo $form->labelEx($model,'title'); ?>
                    <?php echo $form->textField($model,'title',array(
                        'class'=>'form-control',
                        'placeholder'=>'Τίτλος',
                    )); ?>
                    <?php echo $form->error($model,'title',array('class'=>'text-danger')); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'description'); ?>
                    <?php echo $form->textArea($model,'description',array(
                        'class'=>'form-control',
                        'placeholder'=>'Περιγραφή',
                    )); ?>
                    <?php echo $form->error($model,'description',array('class'=>'text-danger')); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'goal'); ?>
                    <?php echo $form->textArea($model,'goal',array(
                        'class'=>'form-control',
                        'placeholder'=>'Στόχος',
                    )); ?>
                    <?php echo $form->error($model,'goal',array('class'=>'text-danger')); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'prerequisite_knowledge'); ?>
                    <?php echo $form->textArea($model,'prerequisite_knowledge',array(
                        'class'=>'form-control',
                        'placeholder'=>'Προαπαιτούμενες γνώσεις',
                    )); ?>
                    <?php echo $form->error($model,'prerequisite_knowledge',array('class'=>'text-danger')); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'max_students'); ?>
                    <?php echo $form->dropDownList($model,'max_students',
                        array('1','2','3','4','5'),
                        array('class'=>'form form-control')
                    ); ?>
                    <?php echo $form->error($model,'max_students',array('class'=>'text-danger')); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'comments'); ?>
                    <?php echo $form->textArea($model,'comments',array(
                        'class'=>'form-control',
                        'placeholder'=>'Σχόλια',
                    )); ?>
                    <?php echo $form->error($model,'comments',array('class'=>'text-danger')); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'status'); ?>
                    <?php echo $form->dropDownList($model,'status',
                        array('δεν έχει ανατεθεί','έχει ανατεθεί','είναι υπο έγκριση'),
                        array('class'=>'form form-control')
                    ) ; ?>
                    <?php echo $form->error($model,'status',array('class'=>'text-danger')); ?>
                </div><br />

                <br />
            </div><!--/ 1st form -->

        </div> <!--/ 1st column-->

        <!-- Επιτροπή -->
        <div class="col-sm-offset-1 col-sm-5">
            <div class="form-horizontal">
                <h4 class="text-center">Επιτροπή</h4>
                <div class="row">
                    <?php echo $form->labelEx($model,'committee1'); ?>
                    <?php echo $form->dropDownList($model,'committee1',
                        CHtml::listData($allProfessorsData,'ID',function($allProfessorsData){ return $allProfessorsData->firstname." ".$allProfessorsData->lastname ;} )                                  ,
                        array('class'=>'form-control',
                            'empty'=>"Επιλέξτε καθηγητή"  ))
                    ?>
                    <?php echo $form->error($model,'committee1',array('class'=>'text-danger')); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'committee2'); ?>
                    <?php echo $form->dropDownList($model,'committee2',
                        CHtml::listData($allProfessorsData,'ID',function($allProfessorsData){ return $allProfessorsData->firstname." ".$allProfessorsData->lastname ;} )                                  ,
                        array('class'=>'form-control',
                            'empty'=>"Επιλέξτε καθηγητή"  )
                    ); ?>
                    <?php echo $form->error($model,'committee2',array('class'=>'text-danger')); ?>
                </div>

                <div class="row">
                    <?php echo $form->labelEx($model,'committee3'); ?>
                    <?php echo $form->dropDownList($model,'committee3',
                        CHtml::listData($allProfessorsData,'ID',function($allProfessorsData){ return $allProfessorsData->firstname." ".$allProfessorsData->lastname ;} )                                  ,
                        array('class'=>'form-control',
                            'empty'=>"Επιλέξτε καθηγητή"  ))
                    ?>
                    <?php echo $form->error($model,'committee3',array('class'=>'text-danger')); ?>
                </div><br />

                <?php echo CHtml::submitButton('Δημιουργία',array('class'=>'btn btn-block btn-success'));?>
                <?php $this->endWidget(); ?>

            </div><!--/ 2nd form -->
        </div><!--/ 2nd column-->
    </div>
</div>
