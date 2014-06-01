<div id="search">
    <div id="search_div">
        <?php $url = $this->getController()->createUrl('store/search'); ?>
        <?php echo CHtml::beginForm($url); ?>
        <div class="form-wrapper">
            <?php echo CHtml::activeTextField($form,'string', array("id"=>"search", "placeholder"=>"Я ищу...")) ?>
            <?php echo CHtml::error($form,'string'); ?>
            <?php echo CHtml::SubmitButton('Найти', array("id"=>"submit")); ?>
        </div>
        <?php echo CHtml::endForm(); ?>
    </div>
    <div id="SearchFooter"></div>
</div>