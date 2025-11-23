<?php

function e(string $value):string {
    if (is_string($value)) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }
    return "error";
};

function query(string $key, string $value): string {
    if (is_string($key) && is_string($value)) {
        return http_build_query([$key => $value]);
    }
    return "error";
}

function toUpper(string $character): string {
    $char = strtoupper($character);
    if (strlen($char) !== 1) {
        http_response_code(404);
        echo "<h1 class='capitalize text-4xl'>404: Page Not Found</h1><br>";
        echo "<p class='capitalize text-xl'>The Page You Were Looking For is not Found</p>";
        die();
    }
    return $char;
}
