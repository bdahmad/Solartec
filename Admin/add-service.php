<?php
require_once("functions/function.php");
needLogged();
get_header();
get_sidebar();


if (!empty($_POST)) {
  $name = $_POST['name'];
  $details = $_POST['details'];
  $icon = $_POST['icon'];
  $photo = ($_FILES['photo']);
  $photoName = '';
  if ($photo['name'] != '') {
    $photoName = 'service_' . time() . '_' . rand(100000, 100000000) . '.' . pathinfo($photo['name'], PATHINFO_EXTENSION);
  }


  $insert = "INSERT INTO `services`( `service_name`, `service_details`, `service_icon`, `service_image`) 
  VALUES ('$name','$details','$icon','$photoName')";


  if (!empty($name)) {
    if (!empty($details)) {
      if (!empty($icon)) {
        if (!empty($photo)) {
          if (mysqli_query($con, $insert)) {
            move_uploaded_file($photo['tmp_name'], 'uploads/' . $photoName);
            echo "successful sevice add.";
          } else {
            echo "service add failed";
          }
        } else {
          echo "select service image.";
        }
      } else {
        echo "enter service icon";
      }
    } else {
      echo "enter service details";
    }
  } else {
    echo "enter service name";
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
              <i class="fab fa-gg-circle"></i>Add Service
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
              <input type="text" class="form-control form_control" id="" name="name">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Details<span class="req_star">*</span>:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control form_control" id="" name="details">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Icon<span class="req_star">*</span>:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control form_control" id="" name="icon">
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Photo<span class="req_star">*</span>:</label>
            <div class="col-sm-4">
              <input type="file" class="form-control form_control" id="" name="photo">
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <button type="submit" class="btn btn-sm btn-dark">ADD Service</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<?php
get_footer();
?>