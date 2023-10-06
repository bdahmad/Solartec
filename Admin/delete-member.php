<?php
require_once("functions/function.php");
needLogged();
$id = $_GET['dm'];

$delete = "DELETE FROM `team` WHERE member_id = '$id'";
if (mysqli_query($con, $delete)) {
   echo "Delete info successfully.";
   header("Location: all-member.php");
}