<?php
/* @var $this StoreController */
/* @var $model Goods */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'goods-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stock'); ?>
		<?php echo $form->textField($model,'stock'); ?>
		<?php echo $form->error($model,'stock'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc_min'); ?>
		<?php echo $form->textArea($model,'desc_min',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc_min'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc_full'); ?>
		<?php echo $form->textArea($model,'desc_full',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc_full'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currency'); ?>
		<?php echo $form->textField($model,'currency',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pic_min'); ?>
		<?php echo $form->textField($model,'pic_min',array('size'=>60,'maxlength'=>135)); ?>
		<?php echo $form->error($model,'pic_min'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pic_full'); ?>
		<?php echo $form->textField($model,'pic_full',array('size'=>60,'maxlength'=>135)); ?>
		<?php echo $form->error($model,'pic_full'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'child_id'); ?>
		<?php echo $form->textField($model,'child_id'); ?>
		<?php echo $form->error($model,'child_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keywords'); ?>
		<?php echo $form->textArea($model,'keywords',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'keywords'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'draft'); ?>
		<?php echo $form->textField($model,'draft'); ?>
		<?php echo $form->error($model,'draft'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->