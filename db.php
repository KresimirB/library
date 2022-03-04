<?php
$db = new mysqli('localhost','root','','knjige');
mysqli_set_charset($db, "utf8");
if(mysqli_connect_errno()){
    echo 'Ne možete se konektirati na bazu';
    exit;
}
?>