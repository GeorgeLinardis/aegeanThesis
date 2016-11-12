<?php
/* @var $this ThesisController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Thesises',
);

$this->menu=array(
	array('label'=>'Create Thesis', 'url'=>array('create')),
	array('label'=>'Manage Thesis', 'url'=>array('admin')),
);
?>

<h1>Thesises</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
