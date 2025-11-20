<?php
function e($url) {
    return htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
}

function genQuery($name, $city) {
    return http_build_query([$name => $city]);
}

$areas = json_decode(file_get_contents(__DIR__ . '/../../data/index.json'));

?>