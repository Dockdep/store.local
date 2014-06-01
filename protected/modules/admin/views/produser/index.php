<?php
/* @var $this ProduserController */
/* @var $model Produser */
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#produser-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'produser-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'prod_id',
		'name',
		'parent_id',
        'category_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
