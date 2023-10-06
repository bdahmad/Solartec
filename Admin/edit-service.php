<?php
ob_start();
require_once("functions/function.php");
needLogged();
get_header();
get_sidebar();

$id = $_GET['es'];

$select = "SELECT * FROM `services` WHERE service_id = '$id'";
$query = mysqli_query($con, $select);
$data = mysqli_fetch_assoc($query);

if (!empty($_POST)) {
  $name = $_POST['name'];
  $details = $_POST['details'];
  $icon = $_POST['icon'];
  $photo = ($_FILES['photo']);
  $photoName = '';

  $update = "UPDATE `services` SET `service_name`='$name',`service_details`='$details',
    `service_icon`='$icon' WHERE service_id = '$id'";


  if (!empty($name)) {
    if (!empty($details)) {
      if (!empty($icon)) {
        if (!empty($photo)) {
          if (mysqli_query($con, $update)) {
            if ($photo['name'] != '') {
              $photoName = 'service_' . time() . '_' . rand(100000, 100000000) . '.' . pathinfo($photo['name'], PATHINFO_EXTENSION);
              $uploadImg = "UPDATE services SET `service_image` = '$photoName' WHERE service_id = '$id'";
              if (mysqli_query($con, $uploadImg)) {
                move_uploaded_file($photo['tmp_name'], 'uploads/' . $photoName);
                header("Location: view-service.php?vs=" . $id);
              } else {
                echo "image upload failed.";
              }
            }
          } else {
            echo "Opps! update failed";
          }
        } else {
          echo "please enter image.";
        }
      } else {
        echo "enter icon class name.";
      }
    } else {
      echo "enter details";
    }
  } else {
    echo "enter name";
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
              <i class="fab fa-gg-circle"></i>Update Service Information
            </div>
            <div class="col-md-4 card_button_part">
              <a href="all-service.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Service</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" value="<?= $data['service_name']; ?>" name="name">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Details<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="details" value="<?= $data['service_details']; ?>">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Icon<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" value="<?= $data['service_icon']; ?>" id="" name="icon">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Photo<span class="req_star">*</span>:</label>
            <div class="col-sm-4">
              <input type="file" class="form-control form_control" id="" name="photo">
            </div>
            <div class="col-sm-2">
              <img class="img200" src="uploads/<?= $data['service_image']; ?>" alt="">
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