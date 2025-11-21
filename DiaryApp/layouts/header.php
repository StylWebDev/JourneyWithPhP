<?php
global $title;
require_once __DIR__ . '/../functions/db.inc.php';
require_once __DIR__ . '/../functions/functions.inc.php';
global $connection;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo ($title) ? $title : 'Diary';?></title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
        @theme {
            --color-bern: '#6d8196'
        }
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        :root {
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
            scroll-behavior: smooth;
        }
        button {
            cursor: pointer;
        }
        body {
            background-image: url("<?php echo (str_contains($title, "Home")) ? '.' : '..' ;?>/public/LCCB6.webp");
            background-repeat: repeat;
        }
        input, textarea {
           background: oklch(70.4% 0.04 256.788);
            border-radius: 3px;
            padding-left: 10px;
            padding-top: 12px;
            padding-bottom: 12px;
            font-weight: normal;
            color: antiquewhite;
        }
    </style>
</head>
<body class="text-slate-800">
<header class="flex w-full justify-around items-center  bg-slate-800 text-white py-5">
    <a href="../index.php" class="uppercase text-lg font-bold align-middle flex <?php if (str_contains($title, "Home")) echo "pointer-events-none"; ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><!-- Icon from Ultimate color icons by Streamline - https://creativecommons.org/licenses/by/4.0/ --><g fill="none"><path fill="#ffef5e" d="M23 1.957v13.39h-6.696a.957.957 0 0 0-.956.957V23H1.957A.957.957 0 0 1 1 22.044V1.957A.957.957 0 0 1 1.957 1h20.087a.957.957 0 0 1 .956.957"/><path fill="#ffbc44" d="M23 15.348L15.348 23v-6.696a.957.957 0 0 1 .956-.956z"/><path stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M23 1.957v13.39h-6.696a.957.957 0 0 0-.956.957V23H1.957A.957.957 0 0 1 1 22.044V1.957A.957.957 0 0 1 1.957 1h20.087a.957.957 0 0 1 .956.957"/><path stroke="#191919" stroke-linecap="round" stroke-linejoin="round" d="M23 15.348L15.348 23v-6.696a.957.957 0 0 1 .956-.956zM5.304 10.044l.957-.957a1.354 1.354 0 0 1 1.913 0a1.354 1.354 0 0 0 1.913 0a1.354 1.354 0 0 1 1.913 0a1.353 1.353 0 0 0 1.913 0a1.354 1.354 0 0 1 1.913 0a1.354 1.354 0 0 0 1.913 0l.957-.956M5.304 14.827l.957-.957a1.353 1.353 0 0 1 1.913 0a1.354 1.354 0 0 0 1.913 0"/></g></svg>MY JOURNAL
    </a>
    <a href="<?php echo e('./upload/index.php') ?>" class="flex gap-x-3 items-center bg-amber-700 pr-5 py-2 rounded-lg hover:text-amber-700 fill-white hover:fill-amber-700 hover:bg-white transition-all duration-500 ease font-bold">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><!-- Icon from Material Symbols by Google - https://github.com/google/material-design-icons/blob/master/LICENSE --><path  d="M12 22q-.4 0-.763-.137t-.637-.438l-7.975-8q-.275-.3-.45-.663T2 12t.175-.763t.45-.637l7.975-8q.3-.3.65-.45T12 2t.775.15t.65.45l7.95 8q.275.3.45.65T22 12t-.162.763t-.463.662l-7.95 8q-.275.275-.65.425T12 22m-1-9v2q0 .425.288.713T12 16t.713-.288T13 15v-2h2q.425 0 .713-.288T16 12t-.288-.712T15 11h-2V9q0-.425-.288-.712T12 8t-.712.288T11 9v2H9q-.425 0-.712.288T8 12t.288.713T9 13z"/></svg>
        New Entry
    </a>
</header>
<main class="mt-1 gap-y-16 flex flex-col items-center h-[100vh]">
