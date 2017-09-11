<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 9/9/17
 * Time: 1:58 PM
 */
$mysqli = new Mysqli('localhost', 'loja', 'loja', 'loja');

if ($mysqli->connect_errno) {
    echo 'Sorry, this website is problems connection';
    echo "Error: {$mysqli->connect_errno} <br>";
    echo "Error: {$mysqli->connect_error} <br>";
    exit();
}