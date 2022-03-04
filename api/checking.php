<?php
include('../db.php');
  $id=$_POST['id'];
  $cekirano=$_POST['cekirano'];
  $id_korisnika=$_POST['id_korisnika'];
  $query="UPDATE `book` SET izdano=$cekirano,iduser=$id_korisnika WHERE book.id=$id";
  
  $stmt = $db->prepare($query) ;
  $stmt->execute();
