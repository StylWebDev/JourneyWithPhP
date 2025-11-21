<?php
function e($val) {
    return htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
}

function query($key, $val) {
    return http_build_query([$key => $val]);
}

?>
