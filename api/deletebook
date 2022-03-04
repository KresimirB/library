<?php
include('../db.php');
$id=$_POST['id'];

$query="DELETE FROM `book` WHERE id='$id'";
$stmt = $db->prepare($query) ;
$stmt->execute();
