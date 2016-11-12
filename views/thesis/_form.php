<?php
/* @var $this ThesisController */
/* @var $model Thesis */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'thesis-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'professorID'); ?>
		<?php echo $form->textField($model,'professorID'); ?>
		<?php echo $form->error($model,'professorID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'studentID'); ?>
		<?php echo $form->textField($model,'studentID'); ?>
		<?php echo $form->error($model,'studentID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'goal'); ?>
		<?php echo $form->textArea($model,'goal',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'goal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prerequisite_knowledge'); ?>
		<?php echo $form->textArea($model,'prerequisite_knowledge',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'prerequisite_knowledge'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'max_students'); ?>
		<?php echo $form->textField($model,'max_students'); ?>
		<?php echo $form->error($model,'max_students'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'committee1'); ?>
		<?php echo $form->textField($model,'committee1'); ?>
		<?php echo $form->error($model,'committee1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'committee2'); ?>
		<?php echo $form->textField($model,'committee2'); ?>
		<?php echo $form->error($model,'committee2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'committee3'); ?>
		<?php echo $form->textField($model,'committee3'); ?>
		<?php echo $form->error($model,'committee3'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->