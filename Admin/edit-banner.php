<?php
ob_start();
require_once("functions/function.php");
needLogged();
get_header();
get_sidebar();

$id = $_GET['eb'];

$select = "SELECT * FROM `banners` WHERE banner_id = '$id'";
$query = mysqli_query($con, $select);
$data = mysqli_fetch_assoc($query);

if (!empty($_POST)) {
  $title = $_POST['title'];
  $subtitle = $_POST['subtitle'];
  $button = $_POST['button'];
  $url = $_POST['url'];
  $photo = ($_FILES['photo']);




  $update = "UPDATE `banners` SET `banner_title`='$title',`banner_subtitle`='$subtitle',
    `banner_button`='$button',`banner_url`='$url' WHERE banner_id = '$id'";


  if (!empty($title)) {
    if (!empty($subtitle)) {
      if(!empty($button)){
        if(!empty($url)){
          if(!empty($photo)){
            if (mysqli_query($con, $update)) {
              if ($photo['name'] != '') {
                $photoName = 'banner_' . time() . '_' . rand(100000, 100000000) . '.' . pathinfo($photo['name'], PATHINFO_EXTENSION);
                $uploadImg = "UPDATE banners SET `banner_image` = '$photoName' WHERE banner_id = '$id'";
                if (mysqli_query($con, $uploadImg)) {
                  move_uploaded_file($photo['tmp_name'], 'uploads/' . $photoName);
                  header("Location: view-banner.php?vb=" . $id);
                } else {
                  echo "image upload failed.";
                }
              }
            } else {
              echo "Opps! update failed";
            }
          }
          else{
            echo "please enter image.";
          }
        }else{
          echo "enter url link.";
        }

      }else{
        echo "enter button text.";
      }
    } else {
      echo "enter subtitle";
    }
  } else {
    echo "enter title";
  }
}



?>

<div class="row">
  <div class="col-md-12 ">
    <form method="post" action="" enctype="multipart/form-data">
      <div class="card mb-3">
        <div class="card-header">
          <div class="row">
            <div class="col-md-8 card_title_part">
              <i class="fab fa-gg-circle"></i>Update Banner Information
            </div>
            <div class="col-md-4 card_button_part">
              <a href="all-banner.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Banner</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Title<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" value="<?= $data['banner_title']; ?>" name="title">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Subtitle:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="subtitle" value="<?= $data['banner_subtitle']; ?>">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Button<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" value="<?= $data['banner_button']; ?>" id="" name="button">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Url<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" value="<?= $data['banner_url']; ?>" id="" name="url" >
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
            <div class="col-sm-4">
              <input type="file" class="form-control form_control" id="" name="photo">
            </div>
            <div class="col-sm-2">
              <img class="img200" src="uploads/<?= $data['banner_image']; ?>" alt="">
            </div>
          </div>

        </div>
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-sm btn-dark">UPDATE</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>

<?php
get_footer();
?>