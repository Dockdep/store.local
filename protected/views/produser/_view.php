<?php
/* @var $this ProduserController */
/* @var $data Produser */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('prod_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->prod_id), array('view', 'id'=>$data->prod_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_id); ?>
	<br />


</div>