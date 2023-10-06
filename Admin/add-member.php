<?php
require_once("functions/function.php");
needLogged();
get_header();
get_sidebar();




?>

<div class="row">
   <div class="col-md-12 ">
      <form method="post" action="" enctype="multipart/form-data">
         <div class="card mb-3">
            <div class="card-header">
               <div class="row">
                  <div class="col-md-8 card_title_part">
                     <i class="fab fa-gg-circle"></i>Add New Member
                  </div>

                  <div class="col-md-4 card_button_part">
                     <a href="all-member.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Member</a>
                  </div>
               </div>
               <?php
               if (!empty($_POST)) {
                  $name = $_POST['name'];
                  $designation = $_POST['designation'];
                  $facebook = $_POST['facebook'];
                  $twitter = $_POST['twitter'];
                  $instagram = $_POST['instagram'];
                  $photo = ($_FILES['photo']);
                  $photoName = '';
                  if ($photo['name'] != '') {
                     $photoName = 'member_' . trim(strtolower($name)) . '_' . time() . '_' . rand(100000, 100000000) . '.' . pathinfo($photo['name'], PATHINFO_EXTENSION);
                  }

                  $insert = "INSERT INTO `team`(`member_name`, `member_designation`, `member_facebook`, `member_twitter`, `member_instagram`, `member_image`) 
                     VALUES ('$name','$designation','$facebook','$twitter','$instagram','$photoName')";


                  if (!empty($name)) {
                     if (!empty($designation)) {
                        if (!empty($facebook)) {
                           if (!empty($twitter)) {
                              if (!empty($instagram)) {
                                 if (!empty($photo)) {
                                    if (mysqli_query($con, $insert)) {
                                       move_uploaded_file($photo['tmp_name'], 'uploads/' . $photoName);
                                       echo "Member add successfully complete.";
                                    } else {
                                       echo "banner add failed.";
                                    }
                                 } else {
                                    echo "select member image.";
                                 }
                              } else {
                                 echo "enter instagram link.";
                              }
                           } else {
                              echo "enter twitter link.";
                           }
                        } else {
                           echo "enter facebook link.";
                        }
                     } else {
                        echo "enter designation.";
                     }
                  } else {
                     echo "enter team member name.";
                  }
               }
               ?>
            </div>
            <div class="card-body">
               <div class="row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
                  <div class="col-sm-7">
                     <input type="text" class="form-control form_control" id="" name="name">
                  </div>
               </div>
               <div class="row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">Designation:</label>
                  <div class="col-sm-7">
                     <input type="text" class="form-control form_control" id="" name="designation">
                  </div>
               </div>
               <div class="row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">Facebook Link<span class="req_star">*</span>:</label>
                  <div class="col-sm-7">
                     <input type="text" class="form-control form_control" id="" name="facebook">
                  </div>
               </div>
               <div class="row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">Twitter Link<span class="req_star">*</span>:</label>
                  <div class="col-sm-7">
                     <input type="text" class="form-control form_control" id="" name="twitter">
                  </div>
               </div>
               <div class="row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">Instagram Link<span class="req_star">*</span>:</label>
                  <div class="col-sm-7">
                     <input type="text" class="form-control form_control" id="" name="instagram">
                  </div>
               </div>
               <div class="row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
                  <div class="col-sm-4">
                     <input type="file" class="form-control form_control" id="" name="photo">
                  </div>
               </div>
            </div>
            <div class="card-footer text-center">
               <button type="submit" class="btn btn-sm btn-dark">ADD Member</button>
            </div>
         </div>
      </form>
   </div>
</div>
</div>
<?php
get_footer();
?>