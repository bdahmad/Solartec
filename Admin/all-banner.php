<?php
require_once("functions/function.php");
needLogged();


get_header();
get_sidebar();

?>

<div class="row">
  <div class="col-md-12">
    <div class="card mb-3">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8 card_title_part">
            <i class="fab fa-gg-circle"></i>All Banner Information
          </div>
          <div class="col-md-4 card_button_part">
            <a href="add-banner.php" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Banner</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped table-hover custom_table">
          <thead class="table-dark">
            <tr>
              <th>Title</th>
              <th>Subtitle</th>
              <th>Button</th>
              <th>Url</th>
              <th>Image</th>
              <th>Manage</th>
            </tr>
          </thead>
          <tbody>
          <?php 
              $select = "SELECT * FROM `banners` ORDER BY banner_id DESC";
              $query = mysqli_query($con,$select);
              while($data = mysqli_fetch_assoc($query)){
                
                ?>
            <tr>
              <td><?= substr($data['banner_title'],0,10); ?>...</td>
              <td><?= substr($data['banner_subtitle'],0,15); ?>...</td>
              <td><?= $data['banner_button']; ?></td>
              <td><?= $data['banner_url']; ?></td>
              <td>
                <?php 
                if( $data['banner_image'] != ''){  
                  ?>
                  <img height="40px" src="uploads/<?= $data['banner_image']; ?>" alt="user">
                  <?php 
                }else{
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
                    <li><a class="dropdown-item" href="view-banner.php?vb=<?= $data['banner_id'];?>">View</a></li>
                    <li><a class="dropdown-item" href="edit-banner.php?eb=<?= $data['banner_id'];?>">Edit</a></li>
                    <li><a class="dropdown-item" href="delete-banner.php?db=<?= $data['banner_id'];?>">Delete</a></li>
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

?>