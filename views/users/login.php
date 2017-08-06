<?php if (getFlash_hlp('errorMessage', false))?>
    <div style="color:rgb(255,0,0)"><?php echo getFlash_hlp('errorMessage', TRUE) ?></div>
<?php if (getFlash_hlp('successMessage', false))?>
    <div style="color:rgb(255,0,0)"><?php echo getFlash_hlp('successMessage', TRUE) ?></div>
    
<a href="<?= link_hlp('')?>">На главную</a><br />
<?php element_hlp('menu',array('menu'=>$menu));?>
<form action="" method="post">
    Имя:<input type="text" name="username" /><br/>
    Пароль:<input type="password" name="password" /><br/>
    <input type="submit" value="залогиниться"/><br/>
</form>