<?php
require_once __DIR__ . '/../functions/fun.inc.php';
require_once __DIR__ . '/../functions/connection.inc.php';
$characters = ['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
global $likeChar;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <base href="http://localhost/php/PhpProjects/explorer/"/>
</head>
<body>
<header class="flex flex-col border-b shadow shadow-neutral-400 shadow-xl items-center justify-center bg-slate-300 py-10">
    <hgroup class="text-center">
        <h1 class="text-7xl underline capitalize text-blue-800 font-bold"><a href="<?php echo'./index.php'; ?>">Name Explorer</a></h1>
        <p class="capitalize text-2xl mt-5">Explore and find names</p>
    </hgroup>
    <div class="flex flex-wrap gap-x-10 justify-center w-[65%] gap-y-4 mt-5">
        <?php foreach ($characters as $character): ?>
            <a class="p-3 px-5 font-bold border rounded-xl  <?php echo (!empty($likeChar) && $likeChar === $character) ? e("border-emerald-600 bg-emerald-600 text-white pointer-events-none") : e("border-black hover:bg-white")?>"
               href="<?php echo e('./names?'.query('like', $character)) ?>">
                <?php echo e(strtoupper($character))?>
            </a>
        <?php endforeach; ?>
    </div>


</header>
