<?php
include('../db.php');
$id=$_POST['id'];
    $query="SELECT * FROM `book` WHERE book.id=$id";
    $result = $db->query($query);
           $rows = array();
           while($row = $result->fetch_assoc()){
               $rows[] = $row;
           }
           echo json_encode($rows);
