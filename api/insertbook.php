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

    if($naziv!=''){
        $query="INSERT INTO `book` VALUES(NULL,'$naziv','$autor','$izdavac','$datum_do','$datum_od','$godina','$cekirano','$id_korisnika')";


    $stmt = $db->prepare($query) ;
    $stmt->execute();
    }else{
        echo 'Ne može se unijeti knjiga bez naslova';
    }
