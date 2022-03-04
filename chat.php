<?php 
include('top.php');
session_start();
$date=date('Y-m-d');
$date1=date('d/m/Y');
echo '<div id="slikaa" ><img src="logologin1.png" id="picture"><p>Služba za prehranu bolesnika</p></div>';

if(isset($_SESSION['korisnik']))
{$osoba=$_SESSION['korisnik'];
    echo "<div id=zaglavlje' class='breadcrumb'><img src='bosss.svg' style='height:25px;width:25px;'/>".' '.$osoba."<div id='date'>".$date1."</div><img src='date.png' id='slik'></div>";
    echo"<button ><a href='tcpdf/examples/dnevno.php' id='unes' target='_blank'/><img src='pdf.svg' style='height:30px;width:30px;margin-top:0px;'/></a></button>";
    echo"<button ><a data-toggle='modal' data-target='#myModal'><img src='menu1.svg' style='height:30px;width:30px;'/></a></button>";
    echo"<button ><a href='jelovnik.php'><img src='iconfinder_ramen_3377055.png' style='height:30px;width:30px;'/></a></button>";
    echo"<button style='background-color:lightblue;'><a href='chat.php' id='unes' /><img src='iconfinder_Messages_206461.png' style='height:30px;width:30px;'/></a></button>";}
    echo "<button><a href='odjavise.php'><img src='eksit.svg' style='height:30px;width:30px;'/></a></button>";
?>



<style type = "text/css">
body {
 /* background-image: url("drvo.png"); */
 /* background-color:#eee; */
}
table,thead{
    position: sticky; top: 0;
}
#static{
    border:1px solid red;
    height:43px;
    width:196%;
    overflow-y: scroll; 
   
}
#table_border{
    padding:15px;
     height: 400px;
           overflow-y: scroll; 
           cursor:pointer;
}

#okvir{
    padding:15px;
     height: 530px;
           overflow-y: scroll; 
           cursor:pointer;

}
#sli{
    height:30px;
    margin-left:20%; 
}
#slik{
    float:right;
    height:30px;
}
#logout{
    float:right;
    margin-right:33px;
}
#date{
    float:right;
    margin-right:10%;
}
fieldset{
    width:30%;
    /* border:2px solid #ff0000; */
    /* background-image: url("logologin.png"); */
    margin-top:3%;
    margin-left:3%;
    
    
}
legend{
    font-weight:bold;
    font-size:125%;
}
label{
    width:125px;
    float:left;
    text-align:left;
    font-weight:bold;
}
input{
    border:1px solid #000;
    padding:3px;
}
button{
    margin: 0% 3%;
}
#slika{
    /* width:15px;
    height:10px; */
    
}
#naslov{
    /* margin-left:120px; */
    margin: 175px;

}
#status{
    margin:70px 15px 0px 15px;
    padding-left:2%;
    font-family:'gabriola' ;
    font-size:18px;
    
}
#dugme{
    margin-bottom:10px;
}
#slika{
    /* width:200px; */
}
#pictur{
    width:540%;
    margin-top:55px;
    margin-left:25px;
    margin-right:25px;
}
#enter{
    /* margin:180px 15px 0px 15px; */
    padding-left:2%;
    font-family:'Times New Roman' ;
    margin:5px 5px 5px 5px;
    /* font-size:18px; */

}
#footer {
    position: fixed;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  background-color: black;
  text-align: center;
  font-family:'Times-new-roman';
  z-index: 2;
}




#dugme{
    padding:5px;
}
#dugme1{
    margin-top:45px;
}
#dugme2{
    margin-top:30px;
}
table{
    font-family:"Times New Roman";
}
#slikaa{
    height:60px;
    width:100%;
    background-color:black;
    font-family:"Times New Roman";
   
}
#slikaa p{
    margin-left:75px;
    color:white;
}
#obrazac{
    margin-top:25px;
}
#nodoctor{
    height:20px;
}
#odjava{
    float:right;
    /* margin-left:85px; */
    margin-top:-35px;
}
#unesi_dugme{
    margin-left:8px;
}
#zaglavlje{
    text-align:center;
}
#unesi{
    margin-left:14px;
}
 th{
    
font-size:10px;
}
tbody{
    
    font-family:'Times new roman';
    
 font-size:15px;
text-align:center;
 }
  @media (min-width:310px)and (max-width:768px)
 {
 #table_border{
    padding:15px;
     height: 1200px;
           overflow-y: scroll; 
           cursor:pointer;
          
           }
}
@media (min-width:768px)and (max-width:992px)
{
 #table_border{
    padding:15px;
     height: 1200px;
           overflow-y: scroll; 
           cursor:pointer;
           
           }
}
@media (min-width:1200px)and (max-width:1900px)
{
 #table_border{
    padding:15px;
     height: 540px;
           overflow-y: scroll; 
           cursor:pointer;
          
           }
}
 @media (min-width:1910px)and (max-width:2900px)
 {
 #table_border{
    padding:15px;
     height: 730px;
           overflow-y: scroll; 
           cursor:pointer;
          
           }
}

       </style>