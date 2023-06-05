<?php 

function connect_db(){
    $host = "localhost";
    $user = "abhishek";
    $password = "asd";
    $db = "mydev";

    $link = mysqli_connect($host, $user, $password, $db);
    if(!$link){
        die("Connection failed: " . mysqli_connect_error());
    }
    return $link;
}
