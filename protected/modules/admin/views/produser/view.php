<?php
/* @var $this ProduserController */
/* @var $model Produser */
?>

<div id="edit"><p>Производитель добавлен, id: <?php echo $model->prod_id; ?></p></div>
<div id="view_edit">
<?
$this->widget('zii.widgets.CMenu',array(
  'activeCssClass'=>'active',
  'activateParents'=>true,
  'items'=>array(
    array(
      'label'=>'Добавить новый',
      'url'=>array('create'),
    ),
	array(
      'label'=>'Изменить',
      'url'=>array('update', 'id'=>$model->prod_id),
    ),
	 array(
      'label'=>'Удалить',
      'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->prod_id),'confirm'=>'Вы уверенны что хотите удалить?'),
    ),

  ),
));
?>
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'prod_id',
		'name',
		'parent_id',
	),
)); ?>
