<?php

function getPagination (mysqli $connection, string $char): int|null {
    $char = toUpper($char);
    if ($prepare = $connection->prepare("SELECT count(name) AS count FROM names WHERE name LIKE '{$char}%' GROUP BY name ;")) {
        $prepare->execute();
        $res = $prepare->get_result()->fetch_all(MYSQLI_ASSOC);
        if ($res[0]['count'] === 0 ) {
            http_response_code(403);
            echo "<h1 class='capitalize text-4xl'>403: Forbidden</h1><br>";
            echo "<p class='capitalize text-xl'>the server understood your request but is refusing to authorize it due to insufficient permissions.</p>";
            die();
        }
        return ceil(count($res)/15);
    }
    return null;
}

?>