<?php
global $areas;
require_once __DIR__ . '/functions/functions.inc.php';
?>



<?php require __DIR__ . '/layout/header.php' ?>

<ul>
    <?php foreach ($areas  as $item): ?>
        <li><a href="<?php echo e('./city?'.genQuery('city',$item->city)) ?>"><?php echo e($item->city.','.$item->country." ($item->flag)") ?></a> </li>
    <?php endforeach;?>
</ul>

<?php require __DIR__ . '/layout/footer.php' ?>
