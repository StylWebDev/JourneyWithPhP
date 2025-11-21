<?php
require_once('../functions/db.inc.php');
global $connection;
$extensions_arr = array("jpg", "jpeg", "gif", "png", "svg","webp");
if (isset($_POST['submit']) && isset($_POST['title']) && isset($_POST['content']) && isset($_POST['weekend'])) {
    $weekend = (int) $_POST['weekend'];
    if (isset($_FILES['file'])) {
        if ($_FILES['file']['error']) {
            echo "There was an error uploading your image.";
        } else {
            $target_dir = "uploads/";
            $fileName = $_FILES['file']['name'];
            $finalPath = $target_dir . $fileName;
            if (in_array(pathinfo($finalPath, 4), $extensions_arr)) {
                move_uploaded_file($_FILES['file']['tmp_name'], $finalPath);
                $finalPath = 'upload/'.$finalPath;

                if (isset($_GET["id"])) {
                    $id = (int) $_GET["id"];
                    $prepQuery = $connection->prepare("UPDATE notes SET title = ?, weekend = ?, content = ?, created_at = current_timestamp, imgName= ?, imgUrl = ? WHERE id = ?");
                    $prepQuery->bind_param("sisssi", $_POST['title'], $weekend, $_POST['content'], explode('.',$fileName)[0], $finalPath, $id);
                }else {
                    if(empty($_GET)) {
                        $prepQuery = $connection->prepare("INSERT INTO notes (title, weekend, content, imgName, imgUrl) VALUES (?, ?, ?, ?, ?)");
                        $prepQuery->bind_param("sisss", $_POST['title'], $weekend, $_POST['content'], explode('.',$fileName)[0], $finalPath);
                    } else header('Location: ../index.php');
                 }
                if ($prepQuery->execute() === TRUE) {
                    header('Location: ../index.php');
                }else {
                    header('Location: ../error/index.php');
                }
            }
        }
    }
}else {
    header('Location: ../index.php');
}
