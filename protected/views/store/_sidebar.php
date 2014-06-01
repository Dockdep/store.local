<div id = "sidebar_block">
<div class ="sidebar_left">
    <ul>
        <li>
            <?php
                $model = new Produser();
                $item = $model->notChild($this->sidebar);
                echo CHtml::link("Все часы {$item['name']}",array('/store'), array('title'=>"Просмотреть все часы {$item['name']}", "data-id" => $item['prod_id'], 'class' => "sidebar-row" ));
            ?>
        </li>
        <?php foreach($this->sidebar as $item):?>
        <li>
            <a href="#" class="sidebar-row" data-id="<?php echo $item['prod_id']?>" title="Просмотреть все часы &laquo;<?php echo $item['name']?>&raquo;"><?php echo $item['name']?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
</div>
