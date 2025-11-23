<?php

function getInfo (mysqli $connection, string $name): array|null {
    $name = ucfirst($name);
    if ($prepare = $connection->prepare("SELECT year, count FROM names WHERE name = ?;")) {
        $prepare->bind_param("s", $name);
        $prepare->execute();
        $res = $prepare->get_result()->fetch_all(MYSQLI_ASSOC);
        if (count($res) === 0 ) {
            http_response_code(403);
            echo "<h1 class='capitalize text-4xl'>403: Forbidden</h1><br>";
            echo "<p class='capitalize text-xl'>the server understood your request but is refusing to authorize it due to insufficient permissions.</p>";
            die();
        }
        return $res;
    }
    return null;
}
