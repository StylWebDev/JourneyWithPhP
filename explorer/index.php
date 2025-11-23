<?php
require_once './layout/header.php';
require_once './functions/get10TopNames.inc.php';

$connection = connect();
$data = get10TopNames($connection);
?>
<main class="flex flex-col items-center justify-start mt-10">
    <div>
        <h1 class="text-7xl font-bold ">Most Common Names</h1>
        <ol class="list-[upper-roman] text-xl font-semibold ml-10 mt-5">
            <?php foreach ($data as $names): ?>
                <li><a class="text-blue-800 underline" href="<?php echo e('./info?'.query('name', $names['name']));?>"> <?php echo $names['name']; ?></a></li>
            <?php endforeach; ?>
        </ol>
    </div>

</main>


<?php require_once './layout/footer.php'; ?>
