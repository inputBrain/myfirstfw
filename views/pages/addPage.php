<form action="" method="post">
    Ключевые слова:<input type="text" name="keywords" value="" /><br/>
    Описание :<input type="text" name="description" value="" /><br/>
    Имя в меню: <input type="text" name="menu_name" value=""/><br/>
    Позиция в меню:<select name="menu_position">
        <?php if ($menu AND ! empty($menu)) : ?>
            <?php foreach ($menu as $mPosition => $mName): ?>
            <option value="<?php echo $mPosition ;?>"><?php echo $mName;;?></option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select> <br/>
    Титул страницы:<input type="text" name="title" value=""/> <br/>
    Содержание страницы:<textarea cols="70" rows="10"></textarea><br/>
    Видимость:<input type="checkbox" name="visible" value="1" checked/><br/>
    <input type="submit" name="" value="Отправить"/>
</form>