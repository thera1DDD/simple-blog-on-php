<?php if (count($errMessage) > 0):?>
    <?php foreach ($errMessage as $error):?>
        <li><?=$error;?></li>
    <?php endforeach;?>
<?php endif;?>
