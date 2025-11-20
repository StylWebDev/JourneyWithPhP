<?php
require_once __DIR__ . '/functions/fun.inc.php';
require_once __DIR__ . '/layout/header.php';

$images = $texts = [];

if(file_exists(__DIR__ . '/data')) {
    $data = opendir(__DIR__ . '/data');
    $extensions = ['txt', 'jpg'];
    while(($file = readdir($data))){
        if(is_file($file)) continue;
        if (in_array(pathinfo($file, 4), $extensions)) {
            if (pathinfo($file, 4) === 'txt') $texts[] = $file;
            else $images[] = $file;
        }
    }
    closedir($data);
}

require_once __DIR__ . '/pages/pictures.php';
?>

<?php require_once __DIR__ . '/layout/footer.php'; ?>
