<?php
$title = "Diary: Add Note";
require_once __DIR__ . '/../layouts/header.php';
?>
<div class="flex-grow flex flex-col items-center w-[90vw] xl:w-[70vw] 2xl:w-[60vw] mt-10">

    <div class="flex flex-col items-center bg-green-50/70 rounded-2xl w-full shadow shadow-lg shadow-neutral-800/70">
        <h2 class="font-extrabold uppercase mt-16 text-5xl sm:text-6xl xl:text-7xl">ADD Memory</h2>

        <form action="post.php" method="post" enctype="multipart/form-data" class="flex vapitalize text-neutral-800 font-bold text-xl flex-col gap-y-3 w-[75%] md:w-[60%] py-10">
            <label for="title">Title</label>
            <input type="text" maxlength="30" name="title" id="title" placeholder="My Title" required/>
            <label for="weekend">Weekend</label>
            <input type="number" name="weekend" id="weekend" min="1" max="4" placeholder="2" required/>
            <label for="content">Title</label>
            <textarea name="content" id="content" maxlength="200" cols="10" rows="5" placeholder="Lorem Ipsum" required></textarea>
            <label for="title">Title</label>

            <div class="flex items-center justify-center w-full bg-slate-400 rounded-xl">
                <div class="flex flex-col items-center justify-center w-full h-64 bg-neutral-secondary-medium border rounded-xl border-dashed border-default-strong rounded-base">
                    <div class="flex flex-col items-center justify-center text-neutral-100 text-body pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v9m-5 0H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2M8 9l4-5 4 5m1 8h.01"/></svg>
                        <p class="mb-2 text-sm ">Click the button below to upload</p>
                        <p class="text-xs mb-4">Max. File Size: <span class="font-semibold">30MB</span></p>
                        <!-- Upload Button -->
                        <button type="button" onclick="document.getElementById('dropzone-file-2').click()" class=" inline-flex items-center text-white bg-amber-700/30 hover:bg-amber-700 transition-all duration-500 ease shadow shadow-2xl shadow-black rounded-lg hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-3 py-2 focus:outline-none">
                            <svg class=" w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
                            Browse file
                        </button>
                    </div>
                </div>
                <!-- Hidden File Input (Outside Label) -->
                <input id="dropzone-file-2" type="file" name="file" class="hidden" required/>
            </div>

            <button name="submit" type="submit"
                    class="self-center shadow shadow-neutral-800  lg:self-center capitalize bg-amber-700 px-10 py-2 rounded-lg hover:bg-black hover:text-white transition-all duration-500 ease text-white font-semibold text-lg"
            >
                submit
            </button>
        </form>
    </div>

</div>
<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
</main>

