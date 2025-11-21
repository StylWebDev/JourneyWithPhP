<?php
global $connection;
global $paginationStart;
$prepQuery = $connection->prepare("SELECT count(title) as 'count' FROM notes");
if ($prepQuery->execute()) {
    $result = $prepQuery->get_result()->fetch_all(MYSQLI_ASSOC);
    if ($result[0]['count'] === 0) header('Location: upload/index.php');
    else {
        $finalPag = ceil($result[0]['count']/4);
        $OFFSET = ($paginationStart-1)*4;
        $prepQuery = $connection->prepare("SELECT id,title,weekend,content,imgName, imgUrl, created_at FROM notes ORDER BY weekend,created_at ASC LIMIT 4 OFFSET ?");
        $prepQuery->bind_param('i',$OFFSET);
        $prepQuery->execute();
        $data = $prepQuery->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}


