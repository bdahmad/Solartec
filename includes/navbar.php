<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
        <h2 class="m-0 text-primary">Solartec</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php" class="nav-item nav-link <?= ($activePage == 'index') ? 'active':''; ?>">Home</a>
            <a href="about.php" class="nav-item nav-link <?= ($activePage == 'about') ? 'active':''; ?>">About</a>
            <a href="service.php" class="nav-item nav-link <?= ($activePage == 'service') ? 'active':''; ?>">Service</a>
            <a href="project.php" class="nav-item nav-link <?= ($activePage == 'project') ? 'active':''; ?>">Project</a>
            <!-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu bg-light m-0">
                    <a href="feature.php" class="dropdown-item <?= ($activePage == 'feature') ? 'active':''; ?>">Feature</a>
                    <a href="quote.php" class="dropdown-item <?= ($activePage == 'quote') ? 'active':''; ?>">Free Quote</a>
                    <a href="team.php" class="dropdown-item <?= ($activePage == 'team') ? 'active':''; ?>">Our Team</a>
                    <a href="testimonial.php" class="dropdown-item <?= ($activePage == 'testimonial') ? 'active':''; ?>">Testimonial</a>
                    <a href="404.html" class="dropdown-item">404 Page</a> 
                </div>
            </div> -->
            <a href="contact.php" class="nav-item nav-link <?= ($activePage == 'contact') ? 'active':''; ?>">Contact</a>
        </div>
        <a href="quote.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block <?= ($activePage == 'quote') ? 'active':''; ?>">Get A Quote<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>