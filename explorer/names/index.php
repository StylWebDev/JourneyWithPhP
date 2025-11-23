<?php
if (!isset($_GET['like'])) {
    header('Location: ../index.php');
    die();
}else {
    $likeChar = $_GET['like'];
    require_once  '../layout/header.php';
    require_once  '../functions/getPagination.inc.php';
    require_once  '../functions/get15NamesPerLetter.inc.php';
    $offset = (int) (isset($_GET['offset'])) ? $_GET['offset'] : 0;
    $connection = connect();
    $pagination = getPagination($connection, $likeChar);
    $data = get15NamesPerLetter($connection, $likeChar, $_GET['offset'] ?? 0);
}
?>
<main class="flex flex-col gap-y-5 items-center justify-start mt-10">
    <div>
        <h1 class="text-7xl font-bold ">Names Starting With <?php echo e($likeChar)?></h1>
        <ol class="list-decimal text-xl font-semibold ml-10 mt-5">
            <?php foreach ($data as $names): ?>
                <li><a class="text-blue-800 underline" href="<?php echo e('./info?'.query('name', $names['name']));?>"> <?php echo $names['name']; ?></a></li>
            <?php endforeach; ?>
        </ol>
    </div>
    <div>
        <div class="flex gap-x-5 text-white text-lg dont-semibold ">
            <?php for ($i = 1; $i <= $pagination; $i++): ?>
                <a class="p-3 px-5 rounded
                <?php echo ($offset == $i-1) ? "bg-emerald-400 pointer-events-none" : "bg-blue-400 hover:brightness-150"; ?>"

                    href="<?php echo e('./names?'.query('like', $likeChar)).'&'.query('offset', $i-1);?>">

                    <?php echo e("$i");?>
                </a>
            <?php endfor; ?>
        </div>
    </div>

</main>


