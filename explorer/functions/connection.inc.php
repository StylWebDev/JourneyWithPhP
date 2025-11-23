<?php

function connect(): mysqli {
    $connection = mysqli_connect("localhost", "root", "root", "name_explorer", 3306);
    if (mysqli_connect_errno()) {
        http_response_code(401);
        echo "<h1 class='capitalize text-4xl'>401: Forbidden</h1><br>";
        echo "<p class='capitalize text-xl'>a request to a server failed because it lacks valid authentication credentials.</p>";
        die("Database connection failed: " . mysqli_connect_error());
    }
    return $connection;
};


?>

