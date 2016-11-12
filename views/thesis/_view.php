<?php
/* @var $this ThesisController */
/* @var $data Thesis */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('professorID')); ?>:</b>
	<?php echo CHtml::encode($data->professorID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('studentID')); ?>:</b>
	<?php echo CHtml::encode($data->studentID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('goal')); ?>:</b>
	<?php echo CHtml::encode($data->goal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prerequisite_knowledge')); ?>:</b>
	<?php echo CHtml::encode($data->prerequisite_knowledge); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('max_students')); ?>:</b>
	<?php echo CHtml::encode($data->max_students); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comments')); ?>:</b>
	<?php echo CHtml::encode($data->comments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('committee1')); ?>:</b>
	<?php echo CHtml::encode($data->committee1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('committee2')); ?>:</b>
	<?php echo CHtml::encode($data->committee2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('committee3')); ?>:</b>
	<?php echo CHtml::encode($data->committee3); ?>
	<br />

	*/ ?>

</div>