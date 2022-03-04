<?php
include('../db.php');
    $naziv=$_POST['naziv'];
    $autor=$_POST['autor'];
    $izdavac=$_POST['izdavac'];
    $datum_od=$_POST['datum_od'];
    $datum_do=$_POST['datum_do'];
    $godina=$_POST['godina'];
    $cekirano=$_POST['cekirano'];
    $id_korisnika=$_POST['id_korisnika'];
    $id=$_POST['id'];
    $query="UPDATE `book` SET naziv='$naziv', autor='$autor',izdavač='$izdavac', datum_od='$datum_od', datum_do='$datum_do', godina='$godina', izdano='$cekirano', iduser='$id_korisnika' WHERE book.id=$id";
    $stmt = $db->prepare($query);
  
  $stmt->execute();
