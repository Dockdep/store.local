<?php if(!empty($_GET['tag'])): ?>
    <h1>Materials Tagged with <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php endif; ?>
<?php if(!empty($search->string)): ?>
    <div class="about_text">Результаты поиска по запросу "&nbsp<i><?php echo CHtml::encode($search->string); ?></i>&nbsp" </div>
<?php endif; ?>

<?php foreach($materials as $material): ?>
    <div class="test_block">
        <div class="test_block2">
            <div class="test_block3"></div>
            <div id="day"><?php //echo CHtml::encode($categoryName[$material->child_id]['name']); ?></div>
            <div id="white">
                <a href="#" alt="Купить часы - <?php echo CHtml::encode($material->title); ?>" title="Купить часы - <?php echo CHtml::encode($material->title); ?>">
                    <img width="145" height="208" src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/50741-45-21.jpg" class="attachment-post-thumbnail wp-post-image" alt="5_1285684776" />
                </a>
            </div>
            <div class="about_watch">
                <div id="about_ab">
                    <a href="#">Купить часы - <?php echo CHtml::encode($material->title); ?></a>
                </div>
                <div id="about_cost"><?php echo CHtml::encode($material->price); ?><?php echo CHtml::encode($material->currency); ?></div>
                <div id="about_ab_excerpt">
                    <?php echo CHtml::encode($material->desc_min); ?>
                    </br>
                    <?php echo CHtml::link('Перейти к полному обзору',array('/store/view', 'id' =>$material->id)); ?><br></br>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

    <br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>