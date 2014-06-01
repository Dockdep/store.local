<?php
/* @var $this ProduserController */
/* @var $model Produser */

$this->breadcrumbs=array(
	'Produsers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Produser', 'url'=>array('index')),
	array('label'=>'Create Produser', 'url'=>array('create')),
	array('label'=>'Update Produser', 'url'=>array('update', 'id'=>$model->prod_id)),
	array('label'=>'Delete Produser', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->prod_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Produser', 'url'=>array('admin')),
);
?>

<h1>View Produser #<?php echo $model->prod_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'prod_id',
		'name',
		'parent_id',
	),
)); ?>
