<?php
function get10TopNames (mysqli $connection): array|null {
    if ($prepare = $connection->prepare("SELECT name FROM names group by name order by sum(count) DESC LIMIT 10;")) {
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