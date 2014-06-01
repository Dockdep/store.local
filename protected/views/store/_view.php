<?php
/* @var $this StoreController */
/* @var $data Goods */
?>
<div class="test_block">
    <div class="test_block2">
        <div class="test_block3"></div>
        <div id="day"><?php echo CHtml::encode($categoryName[$data->child_id]['name']); ?></div>
        <div id="white">
            <a href="#" alt="Купить часы - <?php echo CHtml::encode($data->title); ?>" title="Купить часы - <?php echo CHtml::encode($data->title); ?>">
                <img width="145" height="208" src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/50741-45-21.jpg" class="attachment-post-thumbnail wp-post-image" alt="5_1285684776" />
            </a>
        </div>
        <div class="about_watch">
            <div id="about_ab">
                <a href="#">Купить часы - <?php echo CHtml::encode($data->title); ?></a>
            </div>
            <div id="about_cost"><?php echo CHtml::encode($data->price); ?><?php echo CHtml::encode($data->currency); ?></div>
            <div id="about_ab_excerpt">
                <?php echo CHtml::encode($data->desc_min); ?>
                </br>
                <?php echo CHtml::link('Перейти к полному обзору',array('/store/view', 'id' =>$data->id)); ?><br></br>
            </div>
        </div>
    </div>
</div>



	<?php /*

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_full')); ?>:</b>
	<?php echo CHtml::encode($data->desc_full); ?>
	<br />
 	<b><?php echo CHtml::encode($data->getAttributeLabel('stock')); ?>:</b>
	<?php echo CHtml::encode($data->stock); ?>
	<br />


 	<b><?php echo CHtml::encode($data->getAttributeLabel('goods_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->goods_id), array('view', 'id'=>$data->goods_id)); ?>
	<br />


 	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency')); ?>:</b>
	<?php echo CHtml::encode($data->currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pic_min')); ?>:</b>
	<?php echo CHtml::encode($data->pic_min); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pic_full')); ?>:</b>
	<?php echo CHtml::encode($data->pic_full); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('draft')); ?>:</b>
	<?php echo CHtml::encode($data->draft); ?>
	<br />

	*/ ?>
