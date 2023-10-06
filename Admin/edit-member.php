<?php
require_once("functions/function.php");
needLogged();
if ($_SESSION['role'] == 1) {
  get_header();
  get_sidebar();

  $id = $_GET['em'];

  $select = "SELECT * FROM `team` WHERE member_id = '$id'";
  $query = mysqli_query($con, $select);
  $data = mysqli_fetch_assoc($query);

  if (!empty($_POST)) {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $facebook = $_POST['facebook'];
    $twitter = $_POST['twitter'];
    $instagram = $_POST['instagram'];
    $photo = ($_FILES['photo']);
    $photoName = '';




    $update = "UPDATE `team` SET `member_name`='$name',`member_designation`='$designation',`member_facebook`='$facebook',
    `member_twitter`='$twitter',`member_instagram`='$instagram' WHERE  member_id = '$id'";


    if (!empty($name)) {
      if (!empty($designation)) {
        if (!empty($facebook)) {
          if (!empty($twitter)) {
            if (!empty($instagram)) {
              if (!empty($photo)) {
                if (mysqli_query($con, $update)) {
                  if ($photo['name'] != '') {
                    $photoName = 'member_' . trim(strtolower($name)) . '_' . time() . '_' . rand(100000, 100000000) . '.' . pathinfo($photo['name'], PATHINFO_EXTENSION);
                    $uploadImg = "UPDATE team SET member_image = '$photoName' WHERE member_id = '$id'";
                    if (mysqli_query($con, $uploadImg)) {
                      move_uploaded_file($photo['tmp_name'], 'uploads/' . $photoName);
                      header("Location: view-member.php?vm=" . $id);
                    } else {
                      echo "image upload failed.";
                    }
                  }
                } else {
                  echo "Opps! update failed";
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

  <div class="row">
    <div class="col-md-12 ">
      <form method="post" action="" enctype="multipart/form-data">
        <div class="card mb-3">
          <div class="card-header">
            <div class="row">
              <div class="col-md-8 card_title_part">
                <i class="fab fa-gg-circle"></i>Update Member Information
              </div>
              <div class="col-md-4 card_button_part">
                <a href="all-member.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Member</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" value="<?= $data['member_name']; ?>" name="name">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Designation:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" id="" name="designation" value="<?= $data['member_designation']; ?>">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Facebook<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" value="<?= $data['member_facebook']; ?>" id="" name="facebook">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Twitter<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" value="<?= $data['member_twitter']; ?>" id="" name="twitter">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Instagram<span class="req_star">*</span>:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control form_control" value="<?= $data['member_instagram']; ?>" id="" name="instagram">
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
              <div class="col-sm-4">
                <input type="file" class="form-control form_control" id="" name="photo">
              </div>
              <div class="col-sm-2">
                <img class="img200" src="uploads/<?= $data['member_image']; ?>" alt="">
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
} else {
  header('Location: index.php');
}
?>