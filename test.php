<?php
include('db.php');

if(isset($_GET['unesi'])){
    $uname=$_POST['uname'];
    $pasvord=$_POST['pasvord'];
    $ime=$_POST['ime'];
    $level=1;
    //if($uname!=''){
    $query="INSERT INTO user VALUES ('NULL',?,?,?,?)";
    $stmt = $db->prepare($query);
    $stmt->bind_param('sssi',$uname,$pasvord,$ime,$level);
 
    $stmt->execute();
    if ($stmt->affected_rows>0){
        echo "<div class='breadcrumb'>Dodali ste novog korisnika uspješno!"."</div>";
    }
    else{
        echo "<p>Dogodila se greska prilikom unosa!</p>";
    }

  
}

if(isset($_GET['novaknjiga'])){
    $naziv=$_POST['naziv'];
    $autor=$_POST['autor'];
    $izdavac=$_POST['izdavac'];
    $datum_od=$_POST['datum_od'];
    $datum_do=$_POST['datum_do'];
    $godina=$_POST['godina'];
    $cekirano=$_POST['cekirano'];
    $id_korisnika=$_POST['id_korisnika'];

    if($naziv!=''){
        $query="INSERT INTO book VALUES('NULL','$naziv','$autor','$izdavac','$datum_do','$datum_od','$godina','$cekirano','$id_korisnika')";


    $stmt = $db->prepare($query) ;
    $stmt->execute();
    }else{
        echo 'Ne može se unijeti knjiga bez naslova';
    }
}

if(isset($_GET['azuriranje'])){
    $id=$_POST['id'];
    $query="SELECT * FROM book WHERE book.id=$id";
    $result = $db->query($query);
           $rows = array();
           while($row = $result->fetch_assoc()){
               $rows[] = $row;
           }
           echo json_encode($rows);
}
if(isset($_GET['checking'])){
    $id=$_POST['id'];
    $cekirano=$_POST['cekirano'];
    $id_korisnika=$_POST['id_korisnika'];
    $query="UPDATE book SET izdano=$cekirano,iduser=$id_korisnika WHERE book.id=$id";
    
    $stmt = $db->prepare($query) ;
    $stmt->execute();
}

if(isset($_GET['azurirajknjiga'])){
    $naziv=$_POST['naziv'];
    $autor=$_POST['autor'];
    $izdavac=$_POST['izdavac'];
    $datum_od=$_POST['datum_od'];
    $datum_do=$_POST['datum_do'];
    $godina=$_POST['godina'];
    $cekirano=$_POST['cekirano'];
    $id_korisnika=$_POST['id_korisnika'];
    $id=$_POST['id'];
    $query="UPDATE book SET naziv='$naziv', autor='$autor',izdavač='$izdavac', datum_od='$datum_od', datum_do='$datum_do', godina='$godina', izdano='$cekirano', iduser='$id_korisnika' WHERE book.id=$id";
    $stmt = $db->prepare($query);
  
  $stmt->execute();
}
?>