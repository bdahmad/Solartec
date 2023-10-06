<?php
   require_once("functions/function.php");
   needLogged();
   $id = $_GET['ds'];

   $delete = "DELETE FROM `services` WHERE service_id = '$id'";
   if(mysqli_query($con,$delete)){
      echo "Delete info successfully.";
      header("Location: all-service.php");
      
   }