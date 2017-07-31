<?php if (getFlash_hlp('errorMessage', false))?>
    <div style="color:rgb(255,0,0)"><?php echo getFlash_hlp('errorMessage', TRUE) ?></div>
<?php if (getFlash_hlp('successMessage', false))?>
    <div style="color:rgb(255,0,0)"><?php echo getFlash_hlp('successMessage', TRUE) ?></div>
<form action="" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ;?>"/>
    Ключевые слова:<input type="text" name="keywords" value="<?php echo $keywords ;?>" /><br/>
    Описание :<input type="text" name="description" value="<?php echo $description ;?>" /><br/>
    Имя в меню: <input type="text" name="menu_name" value="<?php echo $menu_name; ;?>"/><br/>
    Позиция в меню:<select name="menu_position">
        <?php if ($menu AND ! empty($menu)) : ?>
            <?php foreach ($menu as $mPos => $mName): ?>
            <option value="<?php echo $mPos ;?>"
                    <?php if($mPos == $menu_position) echo 'selected';?>
                > <?php echo $mPos ;?>) <?php echo $mName;;?></option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select> <br/>
    Титул страницы:<input type="text" name="title" value="<?php echo $title ;?>"/> <br/>
    Содержание страницы:<textarea name="content" cols="70" rows="10"><?php echo $content; ;?></textarea><br/>
    Видимость:<input type="checkbox" name="visible" value="1" 
        <?php if (intval($visible == 1)) echo 'checked'; ;?>/><br/>
    <input type="submit" name="" value="Отправить"/>
</form>