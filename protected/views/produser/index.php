<?php
/* @var $this ProduserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Produsers',
);

$this->menu=array(
	array('label'=>'Create Produser', 'url'=>array('create')),
	array('label'=>'Manage Produser', 'url'=>array('admin')),
);
?>

<h1>Produsers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
