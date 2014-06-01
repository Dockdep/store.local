<?php
/* @var $this GoodsController */
/* @var $model Goods */

$this->menu=array(

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#goods-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'goods-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		/*'goods_id',*/
		'title',
		'stock',
		/*'desc_min',
		'desc_full',*/
		'date',
		/*
		'price',
		'currency',
		'pic_min',
		'pic_full',
		'child_id',
		'gender',
		'description',
		'keywords',
		*/
        'draft',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>