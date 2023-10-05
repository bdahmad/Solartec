<?php
   require_once("functions/function.php");
   needLogged();
   $id = $_GET['db'];

   $delete = "DELETE FROM `banners` WHERE banner_id = '$id'";
   if(mysqli_query($con,$delete)){
      echo "Delete info successfully.";
      header("Location: all-banner.php");
      
   }