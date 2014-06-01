<?php
/* @var $this ProduserController */
/* @var $model Produser */

$this->breadcrumbs=array(
	'Produsers'=>array('index'),
	$model->name=>array('view','id'=>$model->prod_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Produser', 'url'=>array('index')),
	array('label'=>'Create Produser', 'url'=>array('create')),
	array('label'=>'View Produser', 'url'=>array('view', 'id'=>$model->prod_id)),
	array('label'=>'Manage Produser', 'url'=>array('admin')),
);
?>

<h1>Update Produser <?php echo $model->prod_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>