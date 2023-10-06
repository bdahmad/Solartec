<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary">Team Member</h6>
            <h1 class="mb-4">Experienced Team Members</h1>
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
            $select = "SELECT * FROM `team`";
            $query = mysqli_query($con, $select);
            while ($data = mysqli_fetch_assoc($query)) {
            ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded overflow-hidden">
                        <div class="d-flex">
                            <img class="img-fluid w-75" style="height: 300px;" src="Admin/uploads/<?= $data['member_image']; ?>" alt="">
                            <div class="team-social w-25">
                                <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3" href="<?= $data['member_facebook']; ?>"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3" href="<?= $data['member_twitter']; ?>"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-lg-square btn-outline-primary rounded-circle mt-3" href="<?= $data['member_instagram']; ?>"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="p-4">
                            <h5><?= $data['member_name']; ?></h5>
                            <span><?= $data['member_designation']; ?></span>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </div>