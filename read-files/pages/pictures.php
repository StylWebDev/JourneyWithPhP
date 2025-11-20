<?php
global $images;
global $texts;

?>

<div class="flex justify-center mt-[10vh] mb-10 pt-10">
    <div class="flex flex-col sm:w-[70vw] md:w-[60vw] xl:w-[50vw] 2xl:w-[45vw] gap-y-6 ">
        <?php foreach ($images as $num => $image):
            $textData = explode("\n", file_get_contents(__DIR__ . '/../data/' .$texts[$num]));
            ?>
            <div class="dark:bg-neutral-800 dark:text-white pt-2 rounded-xl overflow-hidden flex flex-col gap-y-4 shadow shadow-lg shadow-neutral-500/60">
                <h2 class="text-3xl font-bold text-center px-5"><?php echo e($textData[0]) ?></h2>
                <img class="object-cover" src="./data/<?php echo e(rawurlencode($image));?>" alt="<?php echo $image;?>">

                <p class="text-xl px-5 bg-neutral-700 pb-2 font-bold" >
                    Description:<br>
                    <span class="text-neutral-200 text-lg ml-5 font-normal hyphens-auto" lang="en"><?php echo e($textData[1])?></span> </p>
            </div>
        <?php endforeach;?>
    </div>
</div>

