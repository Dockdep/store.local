<?php
/* @var $this GoodsController */
/* @var $model Goods */
/* @var $form CActiveForm */
?>

<div class="center_0">
	<div class="center_l">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'goods-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    )); ?>


    <?php echo $form->errorSummary($model); ?>

    <div class="f-topic-title_1"><!--Заголовок(текст инпут)-->
        <p><?php echo $form->labelEx($model,'Заголовок:'); ?></p>
		<div>
        <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>120,'id'=>'text-input','style'=>'width:404px;height:25px')); ?>
        <?php echo $form->error($model,'title'); ?>
		</div>
    </div>

    <div class="f-topic-title_1"><!--текст ареа-->
        <p><?php echo $form->labelEx($model,'Краткое описание:'); ?></p>
		<div>
        <?php echo $form->textArea($model,'desc_min',array('rows'=>6, 'cols'=>50,'id'=>'text-input','style'=>'width:404px;height:80px')); ?>
        <?php echo $form->error($model,'desc_min'); ?>
		</div>
    </div>

    <div class="f-topic-title_1"><!--текст ареа-->
        <p><?php echo $form->labelEx($model,'Дополнительное описание:'); ?></p>
		<div>
        <?php echo $form->textArea($model,'desc_full',array('rows'=>6, 'cols'=>50,'id'=>'text-input','style'=>'width:404px;height:80px')); ?>
        <?php echo $form->error($model,'desc_full'); ?>
		</div>
    </div>

    <div class="f-topic-title_1"><!---->
        <p><?php echo $form->labelEx($model,'"description"'); ?></p>
		<div>
        <?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50,'id'=>'text-input','style'=>'width:404px;height:80px')); ?>
        <?php echo $form->error($model,'description'); ?>
		</div>
    </div>

    <div class="f-topic-title_1"><!---->
        <p><?php echo $form->labelEx($model,'"keywords"'); ?></p>
		<div>
        <?php echo $form->textArea($model,'keywords',array('rows'=>6, 'cols'=>50,'id'=>'text-input','style'=>'width:404px;height:80px')); ?>
        <?php echo $form->error($model,'keywords'); ?>
		</div>
    </div>

    <div class="f-topic-title_2"><!--цифровой инпут-->
        <p><?php echo $form->labelEx($model,'Цена:'); ?></p>
		<div>
        <?php echo $form->numberField($model,'price',array('id'=>'text-input','style'=>'width:115px;height:25px;font-size:16px')); ?>
        <?php echo $form->error($model,'price'); ?>
		</div>
    </div>

    <div class="f-topic-title_2"><!--радио батн-->
        <p><?php echo $form->labelEx($model,'Выберите валюту:'); ?></p>
		<div>
        <?php echo $form->radioButtonList($model,'currency',array('$','По Запросу!'),array('labelOptions'=>array('style'=>'display:inline'),'separator'=>'&ensp;&ensp;&ensp;',)); ?>
        <?php echo $form->error($model,'currency'); ?>
		</div>
    </div>
	
	</div>
	<div class="center_r">
	
	<div id="send"><p>Публикация</p>
<div id="send_0">
    <div id="send_1">
        <?php echo CHtml::submitButton('В Черновик', array('name' => 'Goods[draft]','class' => 'send')); ?>
    </div>
    <div id="send_2">
        <?php echo CHtml::submitButton('Опубликовать', array('name' => 'Goods[draft]','class' => 'send')); ?>
    </div>
</div>
</div>
	
    <div class="f-topic-title_2"><!--Наличие(радио батн)-->
        <p><?php echo $form->labelEx($model,'Выберите наличие:'); ?></p>
		<div>
        <?php echo $form->radioButtonList($model,'stock',array('0'=>'Нет в наличии','1'=>'Есть в наличии!'),array('labelOptions'=>array('style'=>'display:inline'),'separator'=>'&ensp;&ensp;&ensp;',)); ?>
        <?php echo $form->error($model,'stock'); ?>
		</div>
    </div>

    

    <div class="f-topic-title_2"><!--радио батн-->
         <p><?php echo $form->labelEx($model,'Пол часов:'); ?></p>
		<div>
        <?php echo $form->radioButtonList($model,'gender',array('Мужские','Женские','Унисекс'),array('labelOptions'=>array('style'=>'display:inline'),'separator'=>'&ensp;&ensp;&ensp;',)); ?>
        <?php echo $form->error($model,'gender'); ?>
		</div>
    </div>

        <div class="f-topic-title_2"><!--радио батн-->
            <p><?php echo $form->labelEx($model,'Тип часов:'); ?></p>
            <div>
                <?php echo $form->radioButtonList($model,'type',array('Классические','Спортивные','Ювелирные','С усложнениями','Настольные'),array('labelOptions'=>array('style'=>'display:inline'),'separator'=>'&ensp;&ensp;&ensp;',)); ?>
                <?php echo $form->error($model,'type'); ?>
            </div>
        </div>

    <div class="f-topic-title_2"><!--файл-->
        <p><?php echo $form->labelEx($model,'Фото товара:'); ?></p>
		<div>
        <input name="pic_min" id="Goods_pic_min" type="file">
            <?php
            if($model->pic_min){
            ?>
            <input type="text" name="Goods_pic_test" value="<?php echo $model->pic_min ?>"/>
            <img src="<?php echo Yii::app()->request->baseUrl.'/pic/'.$model->pic_min; ?>" alt=""/>
            <?php }?>
    </div>
    </div>
	
	

	<div class="form_3">
		<div class="form_3_1"><!--чекбокс-->
        <?php echo $form->labelEx($model,'Выберите категорю'); ?></div>
        <div id="scrollList">
            <?php
            $array=$this->categoryArray;
            $key=0;

            function testCategory($array,$key, $model){
                $num=count($array);
                for($i=0; $i<$num; $i++){
                    if($array[$i]['parent_id']==$key){
                        echo "<ul>";?>
                        <li><p><input type="checkbox"
                                      <? if($model->child_id==$array[$i]['prod_id']){?>
                                          checked
                                       <?}?>
                                      name="Goods[child_id]" value="<?=$array[$i]['prod_id']?>"><?=$array[$i]['name']?></p>
                        <?php
                        $key=$array[$i]['prod_id'];
                        testCategory($array,$key, $model);
                        $key=$array[$i]['parent_id'];
                        echo "</li>";
                        echo "</ul>";
                    }
                }
            }

            testCategory($array,$key,$model);?>
        </div>
		<div class="all"><span class="hideAllList">Скрыть всё</span> | <span class="showAllList">раскрыть всё</span></div>
	</div>
	</div>
    <?php $this->endWidget(); ?>
</div><!-- form -->
<script>
    jQuery(document).ready(function(){
        $("#scrollList>ul ul").addClass("dropBlock").slideUp(0);
        $("#scrollList>ul>li").addClass("drop");
        $("#scrollList>ul>li>p").addClass("dropCss");
        $(".hideAllList").click(function(){
            $(".dropBlock").slideUp(500);
        });
        $(".showAllList").click(function(){
            $(".dropBlock").slideDown(500);
        })
        $(".drop").each(function(){
            var num = $(this).find(".dropBlock");
            // удалить знак восклицания
            if(!num.length){
                console.log(num.length);
                $(this).addClass("haveSubBlock");
            }
        })
        $(".dropCss").click(function(){
            $(this).parent(".drop").find(".dropBlock").slideToggle();
        })


    })
</script>