<?php $this->renderPartial('_sidebar', $this->sidebar); ?>
<div class="watch_block2">
    <div class="watch_block_img_test">
        <div class="watch_block_img">
            <a href="#" class="zoom" ><img src="<?php echo Yii::app()->request->baseUrl.'/picmax/'.$model->pic_min; ?>" alt=""/></a>
        </div>
    </div>

    <div class="watch_block_title">
        <div class="watch_block_title_text">
            <div class="watch_block_title_text_t">Купить часы - <?php echo $model->title ?></div>
            <div class="watch_block_title_text_in"><?php echo $model->stock ?></div>
        </div>
        <div class="watch_block_title_price">
            <div class="watch_block_title_price_t"><?php echo $model->price ?><?php echo $model->currency?></div>
        </div>
    </div>

    <div class="watch_block_feature">Характеристики Модели:
        <div class="watch_block_feature_2">
            <?php echo $model->desc_min ?>
        </div>
    </div>

    <div class="watch_block_text">
        <div class="watch_block_text_block">
            <div class="watch_block_text_block_t">
                <p><?php echo $model->desc_full ?></p>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function(){
        $(".sidebar-row").click(function(event){
            var row = $(this);
            var id = row.data("id");
            var block = row.parents('.sidebar_left');
            $.post( "index.php?r=store/sidebarchild", {id: id }, function( data ) {
                $(block).css("top", "0px");
                $("#sidebar_block").find(".sidebar_left").not(block).remove();
                var content = data;
                var newBlock = $("#sidebar_block").append(content).find(".sidebar_left").not(block);
                var height = $(newBlock).css("left", "-999px").innerHeight();
                var newTop = height+15;
                $( block ).animate({ top: newTop+"px"}, 500);
                $(newBlock).animate({ left: "10px"}, 1000);
            });

        })


    })

</script>