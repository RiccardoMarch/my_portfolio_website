<?php

require_once 'php/core/init.php';
$projects = DB::getInstance()->query("SELECT * FROM projects")->getResults();
$project_type = array('app', 'games');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Riccardo March - Software Developer</title>

  <meta content="Riccardo's Portfolio" name="description">
  <meta content="Portfolio" name="keywords">
  <meta content="Riccardo March" name="author">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <header id="header" class="d-flex flex-column justify-content-center">
    <nav id="navbar" class="navbar nav-menu">
      <ul>
        <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i><span>Home</span></a></li>
        <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i><span>Portfolio</span></a></li>
        <li><a href="#skills" class="nav-link scrollto"><i class="bx bx-server"></i><span>Skills</span></a></li>
        <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i><span>About</span></a></li>
      </ul>
    </nav>
  </header>

  <section id="hero" class="d-flex flex-column justify-content-center">
    <div id='particles-bg'></div>
    <div class="container" data-aos="zoom-in" data-aos-duration="1000">
      <h1>Riccardo March</h1>
      <p>I'm a <span class="typed" data-typed-items="Software Developer, App Developer, Game Developer"></span></p>
      <div class="social-links">
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.linkedin.com/in/riccardo-march-010a41236" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        <a href="https://github.com/RiccardoMarch" class="github"><i class="bx bxl-github"></i></a>
      </div>
    </div>
  </section>

  <main>
    <section id="portfolio" class="portfolio section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Portfolio</h2>
          <p>Here are some projects I've worked on, these are so far my accomplishments that I did on my own my skills ain't limited to this there's still far more to learn. (Hover mouse over it or click for more info about the project)</p>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-games">Games</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
<?php
$x = 1;

foreach ($projects as $proj) {
  //print_r($proj);

  // Used as a reference to the db when wanting to view full details about project
  $proj_id = $proj->id;

  $proj_path = $proj->project_path;
  $proj_name = $proj->project_name;
  $proj_s_desc = $proj->project_short_description;
  $proj_type = intval($proj->project_type);

  $proj_cover_img_path = 'assets/img/projects/'.$proj_path.'/cover.jpeg';

  if ($x == 3) {
    echo "
  <div class=\"col-lg-6 col-md-6 portfolio-item filter-$project_type[$proj_type]\">
    <div class=\"portfolio-wrap\">
      <img src=".$proj_cover_img_path." class=\"img-fluid\" alt=\"\">

      <div class=\"portfolio-info\">
        <h4>".$proj_name."</h4>
        <p>".$proj_s_desc."</p>
        <div class=\"portfolio-links\">
          <a href=\"".$proj_cover_img_path."\" data-gallery=\"portfolioGallery\" class=\"portfolio-lightbox\" title=\".$proj_name.\"><i class=\"bx bx-plus\"></i></a>
          <a href=\"project-details.php?id=".$proj_id."\" class=\"portfolio-details-lightbox\" data-glightbox=\"type: external\" title=\"Project Details\"><i class=\"bx bx-link\"></i></a>
        </div>
      </div>
    </div>
  </div>";
  }
  else {
  echo "
<div class=\"col-lg-3 col-md-3 portfolio-item filter-$project_type[$proj_type]\">
  <div class=\"portfolio-wrap\">
    <img src=".$proj_cover_img_path." class=\"img-fluid\" alt=\"\">

    <div class=\"portfolio-info\">
      <h4>".$proj_name."</h4>
      <p>".$proj_s_desc."</p>
      <div class=\"portfolio-links\">
        <a href=\"".$proj_cover_img_path."\" data-gallery=\"portfolioGallery\" class=\"portfolio-lightbox\" title=\".$proj_name.\"><i class=\"bx bx-plus\"></i></a>
        <a href=\"project-details.php?id=".$proj_id."\" class=\"portfolio-details-lightbox\" data-glightbox=\"type: external\" title=\"Project Details\"><i class=\"bx bx-link\"></i></a>
      </div>
    </div>
  </div>
</div>";
}
$x++;
}
?>
      </div>
    </section>

    <section id="skills" class="skills section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Skills</h2>
          <p>These below are to determine my coding skills</p>
        </div>

        <div class="row skills-content">
          <div class="col-lg-6">

            <div class="progress">
              <span class="skill">Java <i class="val">40%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">C# <i class="val">45%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">C++ <i class="val">35%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">Python <i class="val">30%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">SQL <i class="val">20%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">

            <div class="progress">
              <span class="skill">HTML <i class="val">75%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">JavaScript <i class="val">40%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">PHP <i class="val">50%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">CSS <i class="val">15%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill">React.js <i class="val">10%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

              <div class="section-title">
                <h2>About</h2>
                <p>Want to get to know me better here is my personal information. </p>
              </div>

              <div class="row">
                <div class="col-lg-4">
                  <img src="assets/img/profile.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-8 pt-4 pt-lg-0 content">
                  <h3>Software & App Developer.</h3>
                  <p>
                    I'm passionate about programming, curious in learning new things & solving problems, I've been programming since I was young.
                  </p>
                  <div class="row">
                    <div class="col-lg-6">
                      <ul>
                        <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>24 April 2000</span></li>
                        <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>+27656062727</span></li>
                        <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>Bloemhof, South Africa</span></li>
                      </ul>
                    </div>
                    <div class="col-lg-6">
                      <ul>
                        <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>22</span></li>
                        <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>riccardoyikes@gmail.com</span></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

            </div>
    </section>
  </main>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/particles.js/particles.js"></script>

  </script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/particles.js"></script>
</body>
