<?php
if($connection = mysqli_connect("127.0.0.1", "root", "root", "note_app" ,3306)) {
//    echo "connected";
}else {
    header('Location: '.__DIR__ . '/../error/index.php');
    exit();
}
?>