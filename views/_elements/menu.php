<?php if(is_array($menu)AND !empty($menu)):  ?>
<ul>
    <?php foreach ($menu as $link => $$text): ?>
    <li><a href="<?= link_hlp($link);?>"><?=$text?></a></li>
    <?php endforeach;  ?>
    </ul>

<?php endif; ?>
