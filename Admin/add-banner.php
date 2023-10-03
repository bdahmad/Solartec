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
                     <i class="fab fa-gg-circle"></i>Add Banner
                  </div>
                  <?php
                     if (!empty($_POST)) {
                        $title = $_POST['title'];
                        $subtitle = $_POST['subtitle'];
                        $button = $_POST['button'];
                        $url = $_POST['url'];
                        $photo = ($_FILES['photo']);
                        $photoName = '';
                        if ($photo['name'] != '') {
                           $photoName = 'banner_' . time() . '_' . rand(100000, 100000000) . '.' . pathinfo($photo['name'], PATHINFO_EXTENSION);
                        }

                        $insert = "INSERT INTO `banners`( `banner_title`, `banner_subtitle`, `banner_button`, `banner_url`, `banner_image`) 
                        VALUES ('$title','$subtitle','$button','$url','$photoName')";


                        if (!empty($title)) {
                           if (!empty($subtitle)) {
                              if (!empty($button)) {
                                 if (!empty($url)) {
                                    if (mysqli_query($con, $insert)) {
                                       move_uploaded_file($photo['tmp_name'], 'uploads/' . $photoName);
                                       echo "Banner add successfully complete.";
                                    } else {
                                       echo "banner add failed.";
                                    }
                                 } else {
                                    echo "enter url link.";
                                 }
                              } else {
                                 echo "enter banner button text.";
                              }
                           } else {
                              echo "enter banner subtitle.";
                           }
                        } else {
                           echo "enter banner title.";
                        }
                     }
                     ?>
                  <div class="col-md-4 card_button_part">
                     <a href="all-banner.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Banner</a>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">Title<span class="req_star">*</span>:</label>
                  <div class="col-sm-7">
                     <input type="text" class="form-control form_control" id="" name="title">
                  </div>
               </div>
               <div class="row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">Subtitle:</label>
                  <div class="col-sm-7">
                     <input type="text" class="form-control form_control" id="" name="subtitle">
                  </div>
               </div>
               <div class="row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">Button<span class="req_star">*</span>:</label>
                  <div class="col-sm-7">
                     <input type="text" class="form-control form_control" id="" name="button">
                  </div>
               </div>
               <div class="row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">Url<span class="req_star">*</span>:</label>
                  <div class="col-sm-7">
                     <input type="text" class="form-control form_control" id="" name="url">
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
               <button type="submit" class="btn btn-sm btn-dark">ADD </button>
            </div>
         </div>
      </form>
   </div>
</div>
</div>
<?php
get_footer();
?>