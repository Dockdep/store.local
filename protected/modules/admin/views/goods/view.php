<div id="edit"><p>Товар добавлен, просмотрите заполненные поля:</p></div>
<div id="view_edit">
<?php
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
      'url'=>array('update', 'id'=>$model->id),
    ),
	
	array(
      'label'=>'Удалить',
      'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверенны что хотите удалить?'),
    ),
  ),
));
?>
</div>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'stock',
		'desc_min',
		'desc_full',
		'date',
		'price',
		'currency',
		'pic_min',
		'pic_full',
		'child_id',
		'gender',
		'description',
		'keywords',
        'draft',
	),
)); ?>

