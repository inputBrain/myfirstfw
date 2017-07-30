<?php if (getFlash_hlp('errorMessage', false))?>
    <div style="color:rgb(255,0,0)"><?php echo getFlash_hlp('errorMessage', TRUE) ?></div>
<?php echo $contect; ?>
<?php if (getFlash_hlp('successMessage', false))?>
    <div style="color:rgb(255,0,0)"><?php echo getFlash_hlp('successMessage', TRUE) ?></div>
<?php echo $contect; ?>
<form action="" method="post">
    Ключевые слова:<input type="text" name="keywords" value="" /><br/>
    Описание :<input type="text" name="description" value="" /><br/>
    Имя в меню: <input type="text" name="menu_name" value=""/><br/>
    Позиция в меню:<select name="menu_position">
        <?php if ($menu AND ! empty($menu)) : ?>
            <?php foreach ($menu as $mPos => $mName): ?>
            <option value="<?php echo $mPos ;?>"> <?php echo $mPos ;?>) <?php echo $mName;;?></option>
            <?php endforeach; ?>
        <?php endif; ?>
            <option selected value="<?php echo $mPos + 1 ;?>"> <?php echo $mPos + 1;?>) В конец</option>
    </select> <br/>
    Титул страницы:<input type="text" name="title" value=""/> <br/>
    Содержание страницы:<textarea name="content" cols="70" rows="10"></textarea><br/>
    Видимость:<input type="checkbox" name="visible" value="1" checked/><br/>
    <input type="submit" name="" value="Отправить"/>
</form>