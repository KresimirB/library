<?php
include('../db.php');
    $uname=$_POST['uname'];
    $pasvord=$_POST['pasvord'];
    $ime=$_POST['ime'];
    $level=1;
    //if($uname!=''){
    $query="INSERT INTO `user` VALUES ('NULL',?,?,?,?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('sssi',$uname,$pasvord,$ime,$level);
 
    $stmt->execute();
    if ($stmt->affected_rows>0){
        echo "<div class='breadcrumb'>Dodali ste novog korisnika uspješno!"."</div>";
    }
    else{
        echo "<p>Dogodila se greska prilikom unosa!</p>";
    }
