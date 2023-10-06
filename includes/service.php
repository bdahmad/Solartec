<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary">Our Services</h6>
            <h1 class="mb-4">We Are Pioneers In The World Of Renewable Energy</h1>
        </div>
        <div class="row g-4">
            <?php
            // require_once('config.php');
            $db_name = 'solartec';
            $db_user = 'root';
            $db_pass = '';
            $db_host = 'localhost';

            $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

            if (!$con) {
                echo "database connection error";
            }
            $select = "SELECT * FROM `services`";
            $query = mysqli_query($con, $select);
            while ($data = mysqli_fetch_assoc($query)) {
            ?>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded overflow-hidden">
                        <img class="img-fluid h-75 w-100" style="height: 205px;" src="Admin/uploads/<?= $data['service_image']; ?>" alt="">
                        <div class="position-relative p-4 pt-0">
                            <div class="service-icon">
                                <i class="<?= $data['service_icon']; ?>"></i>
                            </div>
                            <h4 class="mb-3"><?= $data['service_name']; ?></h4>
                            <p><?= $data['service_details']; ?></p>
                            <a class="small fw-medium" href="">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>