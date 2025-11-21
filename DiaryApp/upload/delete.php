<?php
require_once('../functions/db.inc.php');
global $connection;
if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
    $prepare = $connection->prepare("DELETE FROM notes WHERE id = ?");
    $prepare->bind_param("i", $id);
    $prepare->execute();
    header("Location: ../index.php");
}else {
    header("Location: ../index.php");
}
?>
