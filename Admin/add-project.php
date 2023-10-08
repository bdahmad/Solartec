<?php
require_once("functions/function.php");
needLogged();
get_header();
get_sidebar();


if (!empty($_POST)) {
  $category = $_POST['category'];
  $link = $_POST['link'];
  $photo = ($_FILES['photo']);
  $photoName = '';
  if ($photo['name'] != '') {
    $photoName = 'project_' . time() . '_' . rand(100000, 100000000) . '.' . pathinfo($photo['name'], PATHINFO_EXTENSION);
  }


  $insert = "INSERT INTO `project`(`pro_cate_id`, `project_link`, `project_image`)
  VALUES ('$category','$link','$photoName')";


  if (!empty($category)) {
    if (!empty($link)) {
      if (!empty($photo)) {
        if (mysqli_query($con, $insert)) {
          move_uploaded_file($photo['tmp_name'], 'uploads/' . $photoName);
          echo "insert successful";
        } else {
          echo "insert failed";
        }
      } else {
        echo "select image.";
      }
    } else {
      echo "enter link.";
    }
  } else {
    echo "select category";
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
              <i class="fab fa-gg-circle"></i>Add Project
            </div>
            <div class="col-md-4 card_button_part">
              <a href="all-project.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Project</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Project Category<span class="req_star">*</span>:</label>
            <div class="col-sm-4">
              <select class="form-control form_control" id="" name="category">
                <option>Select Category</option>
                <?php
                $selectRole = "SELECT * FROM `project_cate` ORDER BY pro_cate_id ASC";
                $queryRole = mysqli_query($con, $selectRole);

                while ($roleData = mysqli_fetch_assoc($queryRole)) {
                ?>
                  <option value="<?= $roleData['pro_cate_id']; ?>"><?= $roleData['pro_cate_list']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-3 col-form-label col_form_label">Link<span class="req_star">*</span>:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control form_control" id="" name="link">
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
          <button type="submit" class="btn btn-sm btn-dark">ADD</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
<?php
get_footer();
?>