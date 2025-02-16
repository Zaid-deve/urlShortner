<?php

require 'vars.php';

try {
    $pdo = new PDO( DB_HOST . ';' . DB_NAME, DB_USER, DB_PASS );
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch( Exception $e ) {
    http_response_code(500);
    die(json_encode(["success" => false, "message" => "Server Error Occured !"]));
}