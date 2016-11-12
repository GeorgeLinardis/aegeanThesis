<?php
/* @var $this ThesisController */
/* @var $model Thesis */

$this->breadcrumbs=array(
	'Thesises'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Thesis', 'url'=>array('index')),
	array('label'=>'Manage Thesis', 'url'=>array('admin')),
);
?>

<h1>Create Thesis</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>