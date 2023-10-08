<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="sistemi_menaxhimit_notave";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)){
    die("failed to connect!");
}
