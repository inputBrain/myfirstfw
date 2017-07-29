<table border="1" style="margin: 0 auto; width: 900px">
    <tr><td colspan="3"><a href="<?= link_hlp('login');?>">На главную</a></td></tr>
    <tr>
        <td width="200px"><?php element_hlp('menu',array('menu'=>$menu));?></td>
        <td> <?php echo $contect; ?></td>
        <td width="200px"><?php element_hlp('menu',array('menu'=>$menu));?></td>
    </tr>
    <tr><td colspan="3" style="text-align: center">Футер</td></tr>
</table>





<?php if (getFlash_hlp('errorMessage', false))?>
<div style="color:rgb(255,0,0)"><?php echo getFlash_hlp('errorMessage', TRUE) ?></div>
<?php echo $contect; ?>

