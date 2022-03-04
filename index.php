
<?php 
include('top.php');

$date=date('Y-m-d');

if(isset($_POST['ime']) && isset($_POST['pwd'])) 
{
    //ako je korisnik upravo pokusao da se prijavi
    $ime = $_POST['ime'];
    $lozinka = $_POST['pwd'];

include('db.php');
    $query = 'SELECT * from user '." where uname = '$ime'"."and password='$lozinka'";
   
    $result = $db->query($query);
    if($result->num_rows)
    {
    //    echo 'Ulogirani ste kao:'.$_SESSION['valid_user'];
        //ako je korisnik pronadjen u bazi podataka registrujemo njegov indetifikator u sesiji
        $_SESSION['valid'] = $ime;
    
    // }else{
    //     echo '<div id="logo"><img src="slike/logo.gif"><div id="naziv"><h1>Klinika za ortopediju</h1></div><div id="status"><p>Pokušajte ponovo!</p>';
    // //    echo  '<div class="breadcrumb">Niste se pravilno ulogirali!</div>';
    }
     
   
    $db->close();
}
?>

<?php
if(isset($_SESSION['valid'])){
  include('db.php');
        $query = 'SELECT * from user '." where uname = '$ime'"."and password='$lozinka'";
    //    $query="SELECT *FROM korisnik WHERE korisnik.id=$sifraa";
        $result = $db->prepare($query);
        $result->execute();
        $result->store_result();
        $result->bind_result($idd,$korisnickoime,$lozinka,$osoba,$level);
        while($result->fetch()){
          // echo 'prijavio si se ispravno!';
    echo ' <div class="alert alert-warning">
       '.$osoba.'
      <a href="odjava.php" class="btn btn-sm btn-danger" style="float:right;">Log out</a></div>';
        }
        //navigacija
     

        //ovdje ide tablica koja prikazuje iz baze sve knjige
        
        if($level==0){ 
          echo '<div class="container" id="tablica1" style="overflow-y: scroll; cursor:pointer; padding:15px; height: 1200px;">
        <h2>Books</h2>'; 
        echo '<button id="novi" class="btn btn-sm btn-info" style="margin-bottom:5px;">Insert new book</button>
                   
        <table class="table table-striped table-bordered" >
          <thead class="alert alert-success">
            <tr>
              <th>R.br.</th><th>Title</th><th>Author</th><th>Publisher</th><th>Date from</th><th>Date to</th><th>Year</th><th>
              Reserved</th>
            </tr>
          </thead><tbody data-spy="scroll">';
          $counter=0;
          $query="SELECT * FROM book";
          $result = $db->prepare($query);
        $result->execute();
        $result->store_result();
        $result->bind_result($id,$naziv,$autor,$izdavac,$datum_od,$datum_do,$godina,$izdano,$id_korisnika);

          
          
          while($result->fetch()){
            $counter++;
            echo'
            <tr id='.$id.'>
              <td>'.$counter.'</td>
              <td>'.$naziv.'</td>
              <td>'.$autor.'</td>
              <td>'.$izdavac.'</td>
              <td>'.$datum_od.'</td>
              <td>'.$datum_do.'</td>
              <td>'.$godina.'</td>';
              if($izdano=='1'){
               echo '<td><img src="slike/circle.png" /></td>';
              }else{
              echo '
              <td></td>';
              }
              echo '</tr>';
          }
          echo'</tbody></table></div>';

        }else{
          echo '<div class="container" id="tablica2" style="overflow-y: scroll; cursor:pointer; padding:15px; height: 1200px;">
        <h2>Books</h2>'; 
          
          echo '<table class="table table-striped table-bordered" id="tablica2">
          <thead class="alert alert-success">
            <tr>
              <th>R.br.</th><th>Title</th><th>Author</th><th>Publisher</th><th>Date from</th><th>Date to</th><th>Year</th><th>
              Reserved</th>
            </tr>
          </thead><tbody data-spy="scroll">';
          $counter=0;
          $query="SELECT * FROM book";
          $result = $db->prepare($query);
        $result->execute();
        $result->store_result();
        $result->bind_result($id,$naziv,$autor,$izdavac,$datum_od,$datum_do,$godina,$izdano,$id_korisnika);

          
          
          while($result->fetch()){
            $counter++;
            echo'
            <tr id='.$id.' name='.$izdano.'>
              <td>'.$counter.'</td>
              <td>'.$naziv.'</td>
              <td>'.$autor.'</td>
              <td>'.$izdavac.'</td>
              <td>'.$datum_od.'</td>
              <td>'.$datum_do.'</td>
              <td>'.$godina.'</td>';
              if($izdano=='1'){
               echo '<td><img src="slike/circle.png" /></td>';
              }else{
              echo '
              <td></td>';
              }
              echo '</tr>';
          }
          echo'</tbody></table></div>';}
        //futer cijele stranice
      
}else{
  if (isset($ime))
  {
      echo ' <div class="alert alert-warning">
      <strong></strong> You have entered the wrong username or password! If you do not have an account, please register.
      <button type="button" style="float:right;" class="btn btn-sm btn-info" id="registar1" data-toggle="modal" data-target="#myModal">Registration </button>
    </div>';
    }
    else
    {
      echo ' <div class="alert alert-warning">
      <strong>Welcome!</strong> 
      This is an online library.
    <button style="float:right;" class="btn btn-sm btn-info" id="registar" data-toggle="modal" data-target="#myModal">Registration</button></div>';
    }


   echo '<div class="col-lg-6 ">
       <img src="slike/knjige.jpg" class="img img-responsive" style=""/>
       </div>
   <div class="col-lg-5 alert alert-info" style="margin-top:5%;" >
   <p></p>
     <form class="form-horizontal" method="POST" action="index.php">
       <div class="form-group">
         <label class="control-label col-sm-2" for="ime">Uname:</label>
         <div class="col-sm-10">
           <input type="text" class="form-control" id="ime" placeholder="Enter uname" name="ime">
         </div>
       </div>
       <div class="form-group">
         <label class="control-label col-sm-2" for="pwd">Password:</label>
         <div class="col-sm-10">          
           <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
         </div>
       </div>
       <div class="form-group">        
         <div class="col-sm-offset-2 col-sm-10">
           <div class="checkbox">
             <label><input type="checkbox" name="remember"> Remember me</label>
           </div>
         </div>
       </div>
       <div class="form-group">        
         <div class="col-sm-offset-2 col-sm-10">
           <button type="submit" class="btn btn-default">Log in...</button>
         </div>
       </div>
     </form>
   </div>
   
   </body>
   </html>';   
}
?>

<script>
  $(document).ready(function(){
    var html='';
    
    
    $("#registracija").on('click', function(){
      console.log('bilo sta');
      var uname=$("#usr").val();
      var pasvord=$("#pasvord").val();
      var ime=$("#osobno_ime").val();
      console.log(uname);
      console.log(pasvord);
      console.log(ime);

      $.ajax('api/registration.php',{
        'method':'POST',
        'data':{'uname':uname,'pasvord':pasvord,'ime':ime},
        'success':function(data,textStatus,jqXHR){
          console.log(data);
       },
       'error':function(jqXHR,textStatus,errorThrown){
         }
      });
      location.reload();
     });
  
  
   // $("#registracija").click(function(){
        //  $("#tekst").remove();
          
          
       //   var uname=$("#usr").val();
     // var pasvord=$("#pasvord").val();
          //  var str = "You Have Entered " 
          //      + "Name: " + uname 
          //      + " and Marks: " + pasvord;
          //  $("#modal_body").html(str);
        

  //});
    
  $("#novi").on('click', function(){
    console.log("nova knjiga!");
    $('#myModal2').modal('show');
    $('#myModal2').on('shown.bs.modal', function () {
      htmll='';
      console.log('modal');
      htmll +='<form name="mojaforma" id="mojaforma" action="">';
      htmll += '<label for="usr">Title</label>';
      htmll += '<input type="text" class="form-control" id="naziv" required/>';
      htmll += '<label for="pasvord">Author:</label>';
      htmll += ' <input type="text" class="form-control" id="autor">';
      htmll += '<label for="izdavac">Publisher</label>';
      htmll += '<input type="text" class="form-control" id="izdavac">';
      htmll += '<label for="izdavac">Date from</label>';
      htmll += '<input type="date" class="form-control" id="datum_od">';
      htmll += '<label for="izdavac">Date to</label>';
      htmll += '<input type="date" class="form-control" id="datum_do">';
      htmll += '<label for="godina">Year</label>';
      htmll += '<input type="text" class="form-control" id="godina">';
      htmll += '<label for="godina">Reserved</label>';
      htmll += '<select class="form-control" name="cekirano" id="cekirano">';
      htmll += '<option value="0" class="form-control">Ne</option>';
      htmll += '<option value="1" class="form-control">Da</option>';
      
      htmll += '</select>';
      htmll += '<input type="hidden" class="form-control" id="id_korisnika"  />';
      htmll +='</form>';
  
      $("#tekst1").append(htmll);
      $("#unesi").on('click', function(){
        console.log("klik na dugme unesi");
        var naziv=$("#naziv").val();
        var autor=$("#autor").val();
        var izdavac=$("#izdavac").val();
        var datum_od=$("#datum_od").val();
        var datum_do=$("#datum_do").val();
        var godina=$("#godina").val();
        var cekirano=$("#cekirano").val();
        var id_korisnika=$("#id_korisnika").val();
        
        console.log(naziv);
        console.log(autor);
        console.log(izdavac);
        console.log(datum_od);
        console.log(datum_do);
        console.log(godina);
        console.log(cekirano);
        console.log(id_korisnika);
        
      $.ajax('api/insertbook.php',{
        'method':'POST',
        'data':{'naziv':naziv,'autor':autor,'izdavac':izdavac,'datum_od':datum_od,'datum_do':datum_do,'godina':godina,'cekirano':cekirano,'id_korisnika':id_korisnika},
        'success':function(data,textStatus,jqXHR){
           console.log(data);
        },
        'error':function(jqXHR,textStatus,errorThrown){
          
        }
      })
      location.reload();
      })
     
    });
  })  
  $("#odustani").click(function(){
    $("#tekst1").remove();
    location.reload();
});
$("#tablica1 table tr").on('click', function(){
  console.log("Kliknuo si na tablicu");
  var id=$(this).attr('id');
  console.log(id);
  $('#myModalknjiga').modal('show');
    $('#myModalknjiga').on('shown.bs.modal', function () {
      $.ajax('api/update.php',{
        'method':'POST',
        'data':{'id':id},
        'success':function(data,textStatus,jqXHR){console.log(data);
       },
       'error':function(jqXHR,textStatus,errorThrown){
         
         
       }
      }).done(function(odgovor){

console.log(odgovor);

var response = JSON.parse(odgovor);

console.log(response);



$.each(response, function(index, value){
  html +='<label>Title</label>';
  html += '<input type="text" class="form-control" id="naziv" value="'+value['naziv']+'" required/>';
  html += '<label for="pasvord">Author:</label>';
  html += ' <input type="text" class="form-control" id="autor" value="'+value['autor']+'">';
  html += '<label for="izdavac">Publisher:</label>';
  html += '<input type="text" class="form-control" id="izdavac" value="'+value['izdavač']+'">';
  html += '<label for="izdavac">Date from:</label>';
  html += '<input type="date" class="form-control" id="datum_od" value="'+value['datum_od']+'">';
  html += '<label for="izdavac">Date to:</label>';
  html += '<input type="date" class="form-control" id="datum_do" value="'+value['datum_do']+'" >';
  html += '<label for="godina">Year:</label>';
  html += '<input type="text" class="form-control" id="godina" value="'+value['godina']+'" >';
  html += '<label for="godina">Reserved:</label>';
  html += '<select class="form-control" name="cekirano" id="cekirano" >';

  if(value['izdano']==0){
    html += '<option class="form-control" value="'+value['izdano']+'">'+'NO'+'</option>';
    html += '<option value="1" class="form-control">YES</option>';
  }else{
    html += '<option class="form-control" value="'+value['izdano']+'">'+'YES'+'</option>';
    html += '<option value="0" class="form-control">NO</option>';
  }
  html += '</select>';
  
  html +='</form>';

});
$("#tekstknjiga").append(html);
      });
      $("#brisanje").click(function(){
  console.log(id);

  $.ajax('api/deletebook.php',{
          'method':'POST',
          'data':{'id':id},
          'success':function(data,textStatus,jqXHR){console.log(data);
         },
          'error':function(jqXHR,textStatus,errorThrown){


          }
  });
  location.reload();
})
    });
    $("#odustaniazuriraj").click(function(){
    $("#tekstknjiga").remove();
    location.reload();
      });

    $("#azuriraj").click(function(){
      console.log('Ažuriraj podatke!');
      var naziv=$("#naziv").val();
        var autor=$("#autor").val();
        var izdavac=$("#izdavac").val();
        var datum_od=$("#datum_od").val();
        var datum_do=$("#datum_do").val();
        var godina=$("#godina").val();
        var cekirano=$("#cekirano").val();
        var id_korisnika=$("#id_korisnika").val();
        console.log(id);//ovo je id knjige u bazi
        console.log(naziv);
        console.log(autor);
        console.log(izdavac);
        console.log(datum_od);
        console.log(datum_do);
        console.log(godina);
        console.log(cekirano);
        console.log(id_korisnika);//ovo je id onog koji ažurira podatke o knjizi
        $.ajax('api/updatebook.php',{
        'method':'POST',
        'data':{'naziv':naziv,'autor':autor,'izdavac':izdavac,'datum_od':datum_od,'datum_do':datum_do,'godina':godina,'cekirano':cekirano,'id_korisnika':id_korisnika,'id':id},
        'success':function(data,textStatus,jqXHR){
           console.log(data);
        },
        'error':function(jqXHR,textStatus,errorThrown){
          
        }
      })


    });
    $("#azuriraj").click(function(){
    $("#tekstknjiga").remove();
    location.reload();
      });
});
$("#tablica2 table tr").click(function(){
  var id=$(this).attr('id');
    var izdano=$(this).attr('name');
    console.log(izdano);
    if(izdano==0){
      $('#myModal3').modal('show');
    $('#myModal3').on('shown.bs.modal', function () {
      $.ajax('test.php?azuriranje',{
        'method':'POST',
        'data':{'id':id},
        'success':function(data,textStatus,jqXHR){console.log(data);
       },
       'error':function(jqXHR,textStatus,errorThrown){
         
         
       }
      }).done(function(odgovor){

console.log(odgovor);

var response = JSON.parse(odgovor);

console.log(response);



$.each(response, function(index, value){
  html +='<label>Title</label>';
  html += '<input type="text" class="form-control" id="naziv" value="'+value['naziv']+'" disabled/>';
  html += '<label for="pasvord">Author:</label>';
  html += ' <input type="text" class="form-control" id="autor" value="'+value['autor']+'" disabled/>';
  html += '<label for="izdavac">Publisher:</label>';
  html += '<input type="text" class="form-control" id="izdavac" value="'+value['izdavač']+'" disabled/>';
  html += '<label for="izdavac">Date from:</label>';
  html += '<input type="date" class="form-control" id="datum_od" value="'+value['datum_od']+'" disabled/>';
  html += '<label for="izdavac">Date to:</label>';
  html += '<input type="date" class="form-control" id="datum_do" value="'+value['datum_do']+'" disabled/>';
  html += '<label for="godina">Year:</label>';
  html += '<input type="text" class="form-control" id="godina" value="'+value['godina']+'" disabled/>';
  html += '<label for="godina">Reserved:</label>';
  html += '<select class="form-control" name="cekirano" id="cekirano" >';
  if(value['izdano']==0){
    html += '<option class="form-control" value="'+value['izdano']+'">'+'NO'+'</option>';
    html += '<option value="1" class="form-control">YES</option>';
  }else{
    html += '<option class="form-control" value="'+value['izdano']+'">'+'YES'+'</option>';
    html += '<option value="0" class="form-control">NO</option>';
  }
  
  
  
  html += '</select>';
 
  html +='</form>';

});
$("#tekst3").append(html);
      });

      $("#checking").on('click', function(){
        var id_korisnika=$("#id_korisnika").val();
        var cekirano=$("#cekirano").val();
      $.ajax('api/checking.php',{
        'method':'POST',
        'data':{'id':id,'cekirano':cekirano,'id_korisnika':id_korisnika},
        'success':function(data,textStatus,jqXHR){console.log(data);
       },
       'error':function(jqXHR,textStatus,errorThrown){
         
         
       }

      })
location.reload();

    });

    $("#odustani1").click(function(){
      location.reload();
    });

    });
    }

      });




  });

  </script>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Registration form</h4>
      </div>
      <div class="modal-body" id="tekst">
      <h6 id="modal_body"></h6>
      <label for="usr">Username:</label>
      <input type="text" class="form-control" id="usr" required >
      <label for="pasvord">Password:</label>
      <input type="text" class="form-control" id="pasvord">
      <label for="osobo_ime">Your name and surname</label>
      <input type="text" class="form-control" id="osobno_ime">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-primary" id="registracija" value="Registration" />
      </div>
    </div>

  </div>
</div>

<!-- modalni za unosnove knjige -->
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">New book entry form</h4>
      </div>
      <div class="modal-body" id="tekst1">
    
      <input type="hidden" value="<?php echo $idd; ?>" id="id_korisnika"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="odustani">Cancel</button>
        <button type="submit" class="btn btn-primary" id="unesi" >Insert</button>
      </div>
    </div>

  </div>
</div>

<!-- Modalni za azuriranje i brisanja -->

<div id="myModalknjiga" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background: #ffebe6">
        
        <h4 class="modal-title">BOOK</h4>
      </div>
      <div class="modal-body" id="tekstknjiga">
      <!-- <h6 id="modal_body"></h6>
      <label for="usr">Korisničko ime:</label>
      <input type="text" class="form-control" id="usr" required >
      <label for="pasvord">Password:</label>
      <input type="text" class="form-control" id="pasvord">
      <label for="osobo_ime">Vaše ime i prezime</label>
      <input type="text" class="form-control" id="osobno_ime"> -->
      <input type="hidden" value="<?php echo $idd; ?>" id="id_korisnika"/>
      </div>
      <div class="modal-footer">
      <input type="submit" class="btn btn-danger" id="brisanje"
value="Delete" style="float:left;" />
        <button type="button" class="btn btn-default" data-dismiss="modal" id="odustaniazuriraj">Cancel</button>
        <input type="submit" class="btn btn-primary" id="azuriraj" value="Update" />
      </div>
    </div>

  </div>
</div>
<div id="myModal3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Checking the book</h4>
      </div>
      <div class="modal-body" id="tekst3">
      <input type="hidden" value="<?php echo $idd; ?>" id="id_korisnika"/>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="odustani1">Cancel</button>
        <button type="submit" class="btn btn-primary" id="checking" >Checking</button>
      </div>
    </div>

  </div>
</div>
<!-- modalini koji kupi obavijesti-->
<!-- <div class="modal fade" id="exampleModal" 
            tabindex="-1" 
            aria-labelledby="exampleModalLabel" 
            aria-hidden="true">
              
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" 
                            id="exampleModalLabel">
                            Confirmation
                        </h5>
                          
                        <button type="button" 
                            class="close" 
                            data-dismiss="modal" 
                            aria-label="Close">
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
  
                    <div class="modal-body">
  
                         Data passed is displayed 
                            in this part of the 
                            modal body -->
                        <!-- <h6 id="modal_body"></h6>
                        <button type="button" 
                            class="btn btn-success btn-sm" 
                            data-toggle="modal"
                            data-target="#exampleModal" 
                            id="submit">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> --> 