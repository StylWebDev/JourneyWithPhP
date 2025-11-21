<?php
global $entry;
?>

<div class="flex flex-col md:flex-row
     w-[80vw] sm:w-[80vw] xl:w-[50vw]  min-[2000px]:w-[30vw]  mt-4
    bg-green-50/50 rounded-xl overflow-hidden shadow shadow-xl">

    <div class="w-full h-[300px] lg:h-[300px] md:h-auto overflow-hidden rounded md:flex-1/3 ">
        <img class="object-cover w-full h-full" src="./<?php echo $entry['imgUrl']?>" alt="<?php echo e($entry['imgName'])?>">
    </div>
    <div class="flex flex-col gap-y-2 p-5 md:flex-2/3 justify-around">
        <div class="flex flex-col gap-y-1">
            <p class="uppercase text-xs font-bold text-emerald-700">Week <?php echo e($entry['weekend']); ?></p>
            <h3 class="text-2xl font-bold"><?php echo e($entry['title']); ?></h3>
            <hr  class=" w-32 text-emerald-700">
        </div>
        <div class="flex max-sm:flex-col justify-between gap-y-3 w-full">
            <div class="">
                <p class="font-semibold text-sm hyphens-auto" lang="en">
                    <?php echo e($entry['content']); ?>
                </p>
                <p class="text-xs">Created: <?php echo e($entry['created_at']); ?></p></div>
            <div class="text-lg max-sm:w-full text-white fill-white flex gap-x-2">
                <a href="<?php echo e('./upload/delete.php?'.query('id', $entry['id']))?>" class="bg-red-500 p-3  max-sm:w-full rounded-lg text-center" >
                    <svg class="inline" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Google Material Icons by Material Design Authors - https://github.com/material-icons/material-icons/blob/master/LICENSE --><path fill="currentColor" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6zm2.46-7.12l1.41-1.41L12 12.59l2.12-2.12l1.41 1.41L13.41 14l2.12 2.12l-1.41 1.41L12 15.41l-2.12 2.12l-1.41-1.41L10.59 14zM15.5 4l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                </a>
                <a href="" class="bg-yellow-500 p-3  max-sm:w-full  rounded-lg pointer-events-none  text-center">
                    <svg class="inline" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path fill="currentColor" d="M4 18q-.425 0-.712-.288T3 17v-2.25q0-.4.163-.763t.437-.637l6.775-6.775q.6-.6 1.438-.575t1.412.625l1.2 1.25q.575.575.563 1.4t-.588 1.4l-6.75 6.75q-.275.275-.638.425T6.25 18zm1-2h1.25l4.05-4.05l-.625-.625l-.625-.625L5 14.75zm6.725-5.475l-1.25-1.25zM18.5 7.8l-.6.6q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7l2.3-2.3q.3-.3.7-.3t.7.3L22.5 7q.275.3.275.712t-.3.688t-.712.288t-.688-.288l-.575-.575V19q0 .425-.287.713T19.5 20t-.712-.288T18.5 19z"/></svg>
                </a>
            </div>



        </div>


    </div>
</div>