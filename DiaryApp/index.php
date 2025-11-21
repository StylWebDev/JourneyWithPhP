<?php
$title = "Diary: Home";
require_once __DIR__ . '/layouts/header.php';
$paginationStart = 1;
if (isset($_GET['start'])) {
    $paginationStart = (int) $_GET['start'];
}
require_once __DIR__ . '/functions/get-data.inc.php';
global $data;
global $finalPag;
?>



    <div class="flex flex-col items-center">
        <h2 class="font-extrabold uppercase mt-16 text-6xl sm:text-7xl xl:text-8xl">Entries</h2>
        <p class="mt-8 border-2 border-slate-800 rounded-2xl px-5 py-2 text-amber-700 font-extrabold uppercase">Page <?php echo e($paginationStart);?></p>

        <?php
        foreach ($data as $entry){
            require e(__DIR__.'/layouts/card.php');
        }
        ?>
        <div class="flex gap-x-2 self-end w-fit text-xl font-bold mt-3">
            <a href="<?php echo e('./index.php?'.query('start', $paginationStart-1)) ?>" class="p-4 px-6 bg-emerald-400 text-white rounded-xl hover:bg-slate-700 transition-all duration-500 ease <?php if($paginationStart===1) echo "pointer-events-none bg-slate-800"; ?>"><</a>
            <a href="#" class="p-4 bg-neutral-800/20 px-6 border-4 border-emerald-700 text-emerald-700 rounded-xl pointer-events-none"><?php echo e($paginationStart)?></a>
            <button class="p-4 px-6 border-4 border-slate-500 text-slate-500 rounded-xl pointer-events-none">...</button>
            <a href="<?php echo e('./index.php?'.query('start', $paginationStart+1)) ?>"
               class="p-4 px-6 border-4  transition-all duration-500 ease <?php echo ($finalPag == $paginationStart) ? "border-emerald-700 text-emerald-700 rounded-xl pointer-events-none bg-neutral-800/20" : "border-slate-800 text-slate-800 rounded-xl hover:bg-emerald-400/40"?>">
                <?php echo $paginationStart+1?>
            </a>
            <a href="<?php echo e('./index.php?'.query('start', $paginationStart+1)) ?>" class="p-4 px-6 bg-emerald-400 text-white rounded-xl hover:bg-slate-700 transition-all duration-500 ease <?php if($paginationStart == $finalPag) echo "pointer-events-none bg-slate-800"; ?>" >></a>
        </div>

    </div>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>
</main>
