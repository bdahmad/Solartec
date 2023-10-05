<?php
   require_once("functions/function.php");
   needLogged();
   $id = $_GET['dc'];

   $delete = "DELETE FROM `contact` WHERE contact_id = '$id'";
   if(mysqli_query($con,$delete)){
      echo "Delete info successfully.";
      header("Location: all-contact-message.php");
      
   }