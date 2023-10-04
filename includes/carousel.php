<div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="owl-carousel header-carousel position-relative">
        <?php
            require_once('config.php');
            $select = "SELECT * FROM `banners`";
            $query = mysqli_query($con,$select);
            

            while($data = mysqli_fetch_assoc($query)){
        
        ?>
        <div class="owl-carousel-item position-relative" data-dot="<img src='Admin/uploads/<?= $data['banner_image']; ?>'>">
            <img class="img-fluid" src="Admin/uploads/<?= $data['banner_image']; ?>" alt="">
            <div class="owl-carousel-inner">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-2 text-white animated slideInDown"><?= $data['banner_title']; ?></h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-3"><?= $data['banner_subtitle']; ?></p>
                            <a href="<?= $data['banner_url']; ?>" class="btn btn-primary rounded-pill py-3 px-5 animated slideInLeft"><?= $data['banner_button']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        }
        ?>
    </div>
</div>