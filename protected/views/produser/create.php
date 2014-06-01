<?php
/* @var $this ProduserController */
/* @var $model Produser */

$this->breadcrumbs=array(
	'Produsers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Produser', 'url'=>array('index')),
	array('label'=>'Manage Produser', 'url'=>array('admin')),
);
?>

<h1>Create Produser</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>