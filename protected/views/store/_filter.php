<div class="filter_form_0">
    <div class="filter_form_1">
        <div id="close_filter_0">
            <p id="close_filter"></p>
        </div>
        <div class="filter_op">Выберите необходимые Вам поля</div>
        <form method="post" action="#">
            <div class="block_1_styled-select">
                <div class="b1">
                    <div class="styled-select_1">
                        <select id="selectBox" name="parent" size="1">
                            <option disabled selected>select parent</option>
                            <?php foreach($this->sidebar as $item):?>
                                <option value="<?php echo $item['prod_id']?>"><?php echo $item['name']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="b2">
                    <div class="styled-select_1">
                        <select id="urofiliya" name="child_id" size="1">
                            <option disabled selected>select child_id</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="block_2_styled-select">
                <div class="b1">
                    <div class="styled-select_2">
                        <select id="SelectGender" name="data[gender]" size="1">
                            <option disabled selected>select gender</option>
                            <option value="">Все</option>
                            <option value="1">Мужские</option>
                            <option value="2">Женские</option>
                            <option value="3">Унисекс</option>
                        </select>
                    </div>
                </div>
                <div class="b2">
                    <div class="styled-select_2">
                        <select id="SelectType" name="data[type]" size="1">
                            <option disabled selected>select type</option>
                            <option value="">Все</option>
                            <option value="1">Классические</option>
                            <option value="2">Спортивные</option>
                            <option value="3">Ювелирные</option>
                            <option value="4">С усложнениями</option>
                            <option value="5">Настольные</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="block_3_styled-select">
                <div class="b1">
                    <input type="numbrer" id="SelectFrom" name="data[from]" placeholder="Цена от"><font color="#A6A6A6"> - </font><input type="numbrer" id="SelectTo" name="data[to]" placeholder="Цена до">
                </div>
                <div class="b2">
                    <div class="styled-select">
                        <input type="checkbox" id="SelectStock" name="data[stock]" value="1"/> <p>В наличии!</p>
                    </div>
                </div>
            </div>

            <div class="block_4_styled-select">
                <div class="block_4_styled-select_1">
                    <input id="submit_filter" type="submit" value="Фильтровать">
                </div>
            </div>

        </form>
    </div>
</div>