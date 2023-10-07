<div class="container-fluid bg-dark p-0">
    <div class="row gx-0 d-none d-lg-flex">
        <?php
        require_once('config.php');
        $db_name = 'solartec';
        $db_user = 'root';
        $db_pass = '';
        $db_host = 'localhost';

        $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

        if (!$con) {
            echo "database connection error";
        }
        $select = "SELECT * FROM `topbar`";
        $query = mysqli_query($con, $select);
        $data = mysqli_fetch_assoc($query)
        ?>
        <div class="col-lg-7 px-5 text-start">
            <div class="h-100 d-inline-flex align-items-center me-4">
                <small class="fa fa-map-marker-alt text-primary me-2"></small>
                <small><?= $data['address']; ?></small>
            </div>
            <div class="h-100 d-inline-flex align-items-center">
                <small class="far fa-clock text-primary me-2"></small>
                <small><?= $data['office_time']; ?></small>
            </div>
        </div>
        <div class="col-lg-5 px-5 text-end">
            <div class="h-100 d-inline-flex align-items-center me-4">
                <small class="fa fa-phone-alt text-primary me-2"></small>
                <small><?= $data['contact_no']; ?></small>
            </div>
            <div class="h-100 d-inline-flex align-items-center mx-n2">
                <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href="<?= $data['facebook']; ?>"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href="<?= $data['twitter']; ?>"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-square btn-link rounded-0 border-0 border-end border-secondary" href="<?= $data['linkedin']; ?>"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-square btn-link rounded-0" href="<?= $data['instagram']; ?>"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</div>