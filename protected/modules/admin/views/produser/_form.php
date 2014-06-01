<?php
/* @var $this ProduserController */
/* @var $model Produser */
/* @var $form CActiveForm */
?>

<div class="center_0">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'produser-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	<div class="center_l">
	<div class="f-topic-title_1">
		<p><?php echo $form->labelEx($model,'Введите название:'); ?></p>
		<div>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>200,'id'=>'text-input','style'=>'width:404px;height:25px')); ?>
		<?php echo $form->error($model,'name'); ?>
		</div>
	</div>
	<div id="send_0_0">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', array('class' => 'send','style'=>'width:110px')); ?>
	</div>
	</div>
	<div class="center_r">
	<div class="f-topic-title_1">
		<p><?php echo $form->labelEx($model,'Родительская категория:'); ?></p>
		<div>
        <?php
        $array=$this->categoryArray;
        $key=0;

        function testCategory($array,$key){
            $num=count($array);
            for($i=0; $i<$num; $i++){
                if($array[$i]['parent_id']==$key){
                    echo "<ul>";?>
                    <li><p><input type="radio" name="Produser[parent_id]" value="<?=$array[$i]['prod_id']?>"><?=$array[$i]['name']?></p></li>
                    <?php
                    $key=$array[$i]['prod_id'];
                    testCategory($array,$key);
                    $key=$array[$i]['parent_id'];
                    echo "</ul>";
                }
            }
        }

        testCategory($array,$key);?>
		</div>
	</div>

	

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->