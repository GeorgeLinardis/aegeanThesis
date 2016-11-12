<?php
/* @var $this ThesisController */
/* @var $model Thesis */

$this->breadcrumbs=array(
	'Thesises'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Thesis', 'url'=>array('index')),
	array('label'=>'Create Thesis', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#thesis-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Thesises</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'thesis-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID',
		'professorID',
		'studentID',
		'title',
		'description',
		'goal',
		/*
		'prerequisite_knowledge',
		'max_students',
		'comments',
		'status',
		'committee1',
		'committee2',
		'committee3',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
