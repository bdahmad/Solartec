<?php
require_once("functions/function.php");
needLogged();
get_header();
get_sidebar();

$id = $_GET['vb'];

$select = "SELECT * FROM `banners` WHERE banner_id = '$id'";
$query = mysqli_query($con,$select);
$data = mysqli_fetch_assoc($query);

?>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8 card_title_part">
            <i class="fab fa-gg-circle"></i>View Banner Information
          </div>
          <div class="col-md-4 card_button_part">
            <a href="all-user.php" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All User</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <table class="table table-bordered table-striped table-hover custom_view_table">
              <tr>
                <td>Title</td>
                <td>:</td>
                <td><?= $data['banner_title'];?></td>
              </tr>
              <tr>
                <td>Subtitle</td>
                <td>:</td>
                <td><?= $data['banner_subtitle'];?></td>
              </tr>
              <tr>
                <td>Button</td>
                <td>:</td>
                <td><?= $data['banner_button'];?></td>
              </tr>
              <tr>
                <td>Url</td>
                <td>:</td>
                <td><?= $data['banner_url'];?></td>
              </tr>
              <tr>
                <td>Photo</td>
                <td>:</td>
                <td>
                <?php 
                if( $data['banner_image'] != ''){  
                  ?>
                  <img class="img200" src="uploads/<?= $data['banner_image']; ?>" alt="banner">
                  <?php 
                }else{
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