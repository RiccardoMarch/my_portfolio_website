<?php
require_once 'php/core/init.php';


if(!isset($_GET['id'])) {
  die();
}

$proj_id = $_GET['id'];




$projects  = DB::getInstance()->query("SELECT * FROM projects WHERE id=".$proj_id)->getResults();
$project_type = array('app', 'game');

if(count($projects) == 0) {
  die("Project doesn't exist");
}

$proj = $projects[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sudoku - The Material One</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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

  <main id="main">
    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
<?php
$proj_path = $proj->project_path;
$proj_name = $proj->project_name;
$proj_s_desc = $proj->project_short_description;
$proj_desc = $proj->project_description;
$proj_type = intval($proj->project_type);
$proj_languages = $proj->project_langauges;
$proj_ide = $proj->project_ide;
$proj_publisher = $proj->project_publisher;
$proj_date = $proj->project_date;
$proj_urls = $proj->project_urls;
$proj_store_url = $proj->project_store_url;
$proj_github_url = $proj->project_github_url;


$base_path = "assets/img/projects/".$proj_path."/";

$proj_cover_img_path = $base_path.'cover.jpeg';

$index = 0;

while (file_exists($base_path.$index.'.jpeg')) {
  echo "
  <div class=\"swiper-slide\">
    <img src=\"".$base_path.$index.'.jpeg'."\" alt=\"\">
  </div>
  ";

  $index++;
}
?>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
<?php
echo "
<h3>$proj_name - Information</h3>
<ul>
  <li><strong>Category</strong>:".ucfirst($project_type[$proj_type])."</li>
  <li><strong>Languages</strong>: $proj_languages</li>
  <li><strong>IDE</strong>: $proj_ide</li>
  <li><strong>Publisher</strong>: $proj_publisher</li>
  <li><strong>Project date</strong>: $proj_date</li>
  <li><strong>Project URL</strong>: $proj_urls</li>
</ul>
<div>
  <a href=\"$proj_store_url\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"play-store\"><i class=\"bx bxl-play-store\"></i></a>
  <a href=\"$proj_github_url\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"github\"><i class=\"bx bxl-github\"></i></a>
</div>
</div>

<div class=\"portfolio-description\">
<h2>$proj_name - Description</h2>
<p>$proj_desc</p>
</div>
";
?>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
