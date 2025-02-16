<?php

header( 'Access-Control-Allow-Origin: *' );
header( 'Content-Type: application/json' );
header( 'Access-Control-Allow-Methods: POST, GET' );

// database
require_once './config/db.php';

// handlers
$reqMethod = $_SERVER[ 'REQUEST_METHOD' ];

if ( $reqMethod === 'POST' ) {
    require './handlers/postHandler.php';
} else if ( $reqMethod === 'GET' ) {
    require './handlers/getHandler.php';
} else {
    http_response_code( 400 );
    die( json_encode( [ 'success'=>'false', 'message'=>'Method not allowed !' ] ) );
}