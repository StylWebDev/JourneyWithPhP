<?php

function e($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function buildQuery($value){
    return http_build_query(["image"=>$value]);
}