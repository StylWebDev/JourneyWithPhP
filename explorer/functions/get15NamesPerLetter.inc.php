<?php

function get15NamesPerLetter (mysqli $connection, string $char, int $offset): array|null {
    $char = toUpper($char);
    $offset = $offset*15;
    if ($prepare = $connection->prepare("SELECT DISTINCT name FROM names WHERE name LIKE '{$char}%' ORDER BY name ASC LIMIT 15 OFFSET ?;")) {
        $prepare->bind_param("i", $offset);
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
?>