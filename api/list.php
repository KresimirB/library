<?php
   include('../db.php');
   $query="SELECT * FROM book";
   $result = $db->query($query);
          $rows = array();
          while($row = $result->fetch_assoc()){
              $rows[] = $row;
          }
          echo json_encode($rows);
