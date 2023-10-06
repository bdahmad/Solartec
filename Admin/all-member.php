<?php
require_once("functions/function.php");
needLogged();
if ($_SESSION['role'] == 1) {


  get_header();
  get_sidebar();

?>

  <div class="row">
    <div class="col-md-12">
      <div class="card mb-3">
        <div class="card-header">
          <div class="row">
            <div class="col-md-8 card_title_part">
              <i class="fab fa-gg-circle"></i>All Member Information
            </div>
            <div class="col-md-4 card_button_part">
              <a href="add-member.php" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Member</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped table-hover custom_table">
            <thead class="table-dark">
              <tr>
                <th>Name</th>
                <th>Designation</th>
                <th>Facebook</th>
                <th>Twitter</th>
                <th>Instagram</th>
                <th>Image</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $select = "SELECT * FROM `team` ORDER BY member_id DESC";
              $query = mysqli_query($con, $select);
              while ($data = mysqli_fetch_assoc($query)) {
              ?>
                <tr>
                  <td><?= $data['member_name']; ?></td>
                  <td><?= $data['member_designation']; ?></td>
                  <td><?= $data['member_facebook']; ?></td>
                  <td><?= $data['member_twitter']; ?></td>
                  <td><?= $data['member_instagram']; ?></td>
                  <td>
                    <?php
                    if ($data['member_image'] != '') {
                    ?>
                      <img height="40px" src="uploads/<?= $data['member_image']; ?>" alt="user">
                    <?php
                    } else {
                    ?>
                      <img class="img200" height="40" src="images/avatar.jpg" alt="" />
                    <?php
                    }
                    ?>

                  </td>
                  <td>
                    <div class="btn-group btn_group_manage" role="group">
                      <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="view-member.php?vm=<?= $data['member_id']; ?>">View</a></li>
                        <li><a class="dropdown-item" href="edit-member.php?em=<?= $data['member_id']; ?>">Edit</a></li>
                        <li><a class="dropdown-item" href="delete-member.php?dm=<?= $data['member_id']; ?>">Delete</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
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