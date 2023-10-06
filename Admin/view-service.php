<?php
require_once("functions/function.php");
needLogged();
get_header();
get_sidebar();

$id = $_GET['vs'];

$select = "SELECT * FROM `services` WHERE service_id = '$id'";
$query = mysqli_query($con, $select);
$data = mysqli_fetch_assoc($query);

?>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8 card_title_part">
            <i class="fab fa-gg-circle"></i>View Service Information
          </div>
          <div class="col-md-4 card_button_part">
            <a href="all-service.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Service</a>
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
                <td><?= $data['service_name']; ?></td>
              </tr>
              <tr>
                <td>Details</td>
                <td>:</td>
                <td><?= $data['service_details']; ?></td>
              </tr>
              <tr>
                <td>Icon</td>
                <td>:</td>
                <td><?= $data['service_icon']; ?></td>
              </tr>
              <tr>
                <td>Image</td>
                <td>:</td>
                <td>
                  <?php
                  if ($data['service_image'] != '') {
                  ?>
                    <img class="img200" src="uploads/<?= $data['service_image']; ?>" alt="user">
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
?>