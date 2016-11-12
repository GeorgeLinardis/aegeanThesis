<?php
/* @var $this ThesisController */
/* @var $model Thesis */

$this->breadcrumbs=array(
	'Thesises'=>array('index'),
	$model->title=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Thesis', 'url'=>array('index')),
	array('label'=>'Create Thesis', 'url'=>array('create')),
	array('label'=>'View Thesis', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Thesis', 'url'=>array('admin')),
);
?>

<h1>Update Thesis <?php echo $model->ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>