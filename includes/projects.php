<link rel="stylesheet" href="css/project.css">
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary">Our Projects</h6>
            <h1 class="mb-4">Visit Our Latest Solar And Renewable Energy Projects</h1>
        </div>
        <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-12 text-center">
                <ul class="list-inline mb-5" id="portfolio-flters">
                    <li class="mx-2 active" data-filter="*">All</li>
                    <li class="mx-2" data-filter=".solar_panel">Solar Panels</li>
                    <li class="mx-2" data-filter=".wind_turbine">Wind Turbines</li>
                    <li class="mx-2" data-filter=".hydropowder_plant">Hydropower Plants</li>
                </ul>
            </div>
        </div>
        <div class="row g-4 portfolio-container wow fadeInUp" data-wow-delay="0.5s">
            <?php
            require_once('config.php');
            $select = "SELECT * FROM `project`  NATURAL JOIN `project_cate` ORDER BY project_id DESC";
            $query = mysqli_query($con, $select);
            while ($data = mysqli_fetch_assoc($query)) {

            ?>
                <div class="col-lg-4 col-md-6 portfolio-item <?= $data['pro_cate_list']; ?>">
                    <div class="portfolio-img rounded overflow-hidden">
                        <img class="img-fluid i-size" src="Admin/uploads/<?= $data['project_image']; ?>" alt="">
                        <div class="portfolio-btn">
                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="Admin/uploads/<?= $data['project_image']; ?>" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                            <a class="btn btn-lg-square btn-outline-light rounded-circle mx-1" href="<?= $data['project_link']; ?>"><i class="fa fa-link"></i></a>
                        </div>
                    </div>
                    <div class="pt-3">
                        <p class="text-primary mb-0"><?= $data['pro_cate_list']; ?></p>
                        <hr class="text-primary w-25 my-2">
                        <h5 class="lh-base">We Are pioneers of solar & renewable energy industry</h5>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>