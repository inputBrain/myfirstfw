<?php if (getFlash_hlp('errorMessage', false))?>
    <div style="color:rgb(255,0,0)"><?php echo getFlash_hlp('errorMessage', TRUE) ?></div>
<?php if (getFlash_hlp('successMessage', false))?>
    <div style="color:rgb(255,0,0)"><?php echo getFlash_hlp('successMessage', TRUE) ?></div>
    
<a href="<?php echo link_hlp('admin/new-page') ;?>">Добавить страницу</a><br />
<?php foreach ($menu as $mPosition => $mName): ?>
    <?php echo $mName ;?><a href="<?php echo link_hlp('admin/edit-page/' . $mPosition) ;?>">Изменить</a>
                         <a href="<?php echo link_hlp('admin/delete-page/' . $mPosition) ;?>">Удалить</a><br />
<?php endforeach ; ?>
