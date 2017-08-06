<a href="<?= link_hlp('')?>">На главную</a><br />
<?php element_hlp('menu',array('menu'=>$menu));?>
<form action="" method="post">
    Имя:<input type="text" name="username" /><br/>
    Пароль:<input type="password" name="password" /><br/>
    <input type="submit" value="залогиниться"/><br/>
</form>