<?php 

include('top.php');
session_start();
//biljezimmo podatak da li je korisnik bio prijavljen
//  $old_user = ($_SESSION)['valid_user'] ;
//  unset($_SESSION['valid_user']);
session_destroy();

?>


<?php 
if (!empty($olduser))
{
    echo '<p> You have been logged out</p>' ;
}
else
{
   //ako nije bio prijavljen,a ipak je nekako stigao do ove stranice 
  echo '<div class="alert alert-warning">
      <strong>
      You are logged out of the application!</strong> 
      <a class="btn btn-primary" href="index.php" style="float:right;">Back to application</a></div>';
}
?>
<div></div>
