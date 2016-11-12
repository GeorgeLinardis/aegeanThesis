<?php
/* @var $this ThesisController */
/* @var $model Thesis */

$this->breadcrumbs=array(
	'Thesises'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Thesis', 'url'=>array('index')),
	array('label'=>'Create Thesis', 'url'=>array('create')),
	array('label'=>'Update Thesis', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete Thesis', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Thesis', 'url'=>array('admin')),
);
?>

<h1>View Thesis #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'professorID',
		'studentID',
		'title',
		'description',
		'goal',
		'prerequisite_knowledge',
		'max_students',
		'comments',
		'status',
		'committee1',
		'committee2',
		'committee3',
	),
)); ?>
