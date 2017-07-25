<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="Description" content="<?=$page['description'];?>"/>
        <meta name="Keywords" content="<?=$page['keywords'];?>"/>
        <link rel="stylesheet" type="text/css" href=""/>
        <title><?php echo $page['title']; ?></title>
    </head>
    <body>
        <?php
        if (getFlash_hlp('errorMessage', false))
        ?>
        <div style="color:rgb(255,0,0)"><?php echo getFlash_hlp('errorMessage', TRUE)?></div>
        <?php echo $page['contect'];?>
    </body>
</html>
