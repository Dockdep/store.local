<?php
/* @var $this GoodsController */
/* @var $data Goods */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('goods_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->goods_id), array('view', 'id'=>$data->goods_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stock')); ?>:</b>
	<?php echo CHtml::encode($data->stock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_min')); ?>:</b>
	<?php echo CHtml::encode($data->desc_min); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_full')); ?>:</b>
	<?php echo CHtml::encode($data->desc_full); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('currency')); ?>:</b>
	<?php echo CHtml::encode($data->currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pic_min')); ?>:</b>
	<?php echo CHtml::encode($data->pic_min); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pic_full')); ?>:</b>
	<?php echo CHtml::encode($data->pic_full); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('child_id')); ?>:</b>
	<?php echo CHtml::encode($data->child_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keywords')); ?>:</b>
	<?php echo CHtml::encode($data->keywords); ?>
	<br />

	*/ ?>

</div>