<?php
require_once("functions/function.php");
needLogged();
if ($_SESSION['role'] == 1) {
  get_header();
  get_sidebar();

  $id = $_GET['vm'];

  $select = "SELECT * FROM `team` NATURAL JOIN roles WHERE member_id = '$id'";
  $query = mysqli_query($con, $select);
  $data = mysqli_fetch_assoc($query);

?>

  <div class="row">
    <div class="col-md-12">
      <div class="card mb-3">
        <div class="card-header">
          <div class="row">
            <div class="col-md-8 card_title_part">
              <i class="fab fa-gg-circle"></i>View Member Information
            </div>
            <div class="col-md-4 card_button_part">
              <a href="all-member.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Member</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <table class="table table-bordered table-striped table-hover custom_view_table">
                <tr>
                  <td>Name</td>
                  <td>:</td>
                  <td><?= $data['member_name']; ?></td>
                </tr>
                <tr>
                  <td>Designation</td>
                  <td>:</td>
                  <td><?= $data['member_designation']; ?></td>
                </tr>
                <tr>
                  <td>Facebook</td>
                  <td>:</td>
                  <td><?= $data['member_facebook']; ?></td>
                </tr>
                <tr>
                  <td>Twitter</td>
                  <td>:</td>
                  <td><?= $data['member_twitter']; ?></td>
                </tr>
                <tr>
                  <td>Instagram</td>
                  <td>:</td>
                  <td><?= $data['member_instagram']; ?></td>
                </tr>
                <tr>
                  <td>Image</td>
                  <td>:</td>
                  <td>
                    <?php
                    if ($data['member_image'] != '') {
                    ?>
                      <img class="img200" src="uploads/<?= $data['member_image']; ?>" alt="user">
                    <?php
                    } else {
                    ?>
                      <img class="img200" nsrc="images/avatar.jpg" alt="" />
                    <?php
                    }
                    ?>
                  </td>
                </tr>
              </table>
            </div>
            <div class="col-md-2"></div>
          </div>
        </div>
        <div class="card-footer">
          <div class="btn-group" role="group" aria-label="Button group">
            <button type="button" class="btn btn-sm btn-dark">Print</button>
            <button type="button" class="btn btn-sm btn-secondary">PDF</button>
            <button type="button" class="btn btn-sm btn-dark">Excel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

<?php
  get_footer();
} else {
  header('Location: index.php');
}
?>