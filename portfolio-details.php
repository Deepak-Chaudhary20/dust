<?php
  $conn = mysqli_connect('localhost', 'root', '', 'dustbin');
?>

<?php include 'includes/header.php'; ?>
  <!-- ======= Header ======= -->
  <section id="topbar" class="topbar d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">Infoprishaenterprises@gmail.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>9899318565</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section><!-- End Top Bar -->

  <header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="images/prisha.png" alt="" height="70px" >
        <!-- <h1>Impact<span>.</span></h1> -->
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="index.php#about">About</a></li>
          <li><a href="index.php#products">Products</a></li>
          <li class="dropdown"><a href="#"><span>Product List</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="portfolio-details.php?section=small">House Hold (10/ 20 /30L)</a></li>
              <li><a href="portfolio-details.php?section=stell">Stell Dustbin</a></li>
              <li><a href="portfolio-details.php?section=pole">Pole Mounted</a></li>
              
            <li><a href="portfolio-details.php?section=static">Static Dustbin</a></li>
            <li><a href="portfolio-details.php?section=moveable">Movable Dustbin</a></li>
              
              <li><a href="portfolio-details.php?section=cycle">Cycle Mounted Dustbin</a></li>
            </ul>
          </li>
          <li><a href="index.php#contact">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->
  <!-- End Header -->


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center">
              <h2>Prisha Enterprises</h2>
              <p>Where we make changes through our product.</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Portfolio Details</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

   <div class="d-flex justify-content-center">
    <div class="col-md-7">
    </div>
   </div>
    <div class="d-flex justify-content-center">
      <div class="col-md-6">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Product Tags</th>
                <th>Product Details</th>
              </tr>
            </thead>
            <?php
// Assuming you have already established a database connection, here's an example:
// Check if the 'section' parameter is set in the URL
if (isset($_GET['section'])) {
    if ($_GET['section'] == 'small') {
        $dustbinType = 'verysmall';

        // Prepare and execute the SQL query
        $sql = "SELECT * FROM `dustbin` WHERE `dustbin_type` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $dustbinType);
        $stmt->execute();

        // Fetch the data and store it in an array
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $dustbin_img = $row['dustbin_img'];
            $dustbin_type = $row['dustbin_type'];
            $dustbin_usage = $row['dustbin_usage'];
            $dustbin_capacity = $row['dustbin_capacity'];
            $dustbin_quality = $row['dustbin_quality'];
            echo "
            <tr>
            <td>Product Image </td>
            <td>
              <img src='image/$dustbin_img'  class='img-responsive' width='200px'>
            </td>
          </tr>
          <tr>
            <td>Product Type</td>
            <td>
            $dustbin_type
            </td>
          </tr>
          <tr>
            <td>Product Usage</td>
            <td>
              $dustbin_usage
            </td>
          </tr>
          <tr>
            <td>Dustbin Capacity</td>
            <td>
               $dustbin_capacity 
            </td>
          </tr>
          <tr>
            <td>Dustbin Quality</td>
            <td>
               $dustbin_quality 
            </td>
          </tr>
            ";
        }

        // Close the prepared statement
        $stmt->close();
    } else if ($_GET['section'] == 'stell') {
        $sql = "SELECT * FROM `dustbin` WHERE `dustbin_type` = 'stell'";
        $result = mysqli_query($conn, $sql);
        while ($row = $result->fetch_assoc()) {
          $dustbin_img = $row['dustbin_img'];
          $dustbin_type = $row['dustbin_type'];
          $dustbin_usage = $row['dustbin_usage'];
          $dustbin_capacity = $row['dustbin_capacity'];
          $dustbin_quality = $row['dustbin_quality'];
          echo "
          <tr>
          <td>Product Image </td>
          <td>
            <img src='image/$dustbin_img'  class='img-responsive' width='200px'>
          </td>
        </tr>
        <tr>
          <td>Product Type</td>
          <td>
          $dustbin_type
          </td>
        </tr>
        <tr>
          <td>Product Usage</td>
          <td>
            $dustbin_usage
          </td>
        </tr>
        <tr>
          <td>Dustbin Capacity</td>
          <td>
             $dustbin_capacity 
          </td>
        </tr>
        <tr>
          <td>Dustbin Quality</td>
          <td>
             $dustbin_quality 
          </td>
        </tr>
          ";
      }
    } else if ($_GET['section'] == 'pole') {
        $sql = "SELECT * FROM `dustbin` WHERE `dustbin_type` = 'pole'";
        $result = mysqli_query($conn, $sql);
        while ($row = $result->fetch_assoc()) {
          $dustbin_img = $row['dustbin_img'];
          $dustbin_type = $row['dustbin_type'];
          $dustbin_usage = $row['dustbin_usage'];
          $dustbin_capacity = $row['dustbin_capacity'];
          $dustbin_quality = $row['dustbin_quality'];
          echo "
          <tr>
          <td>Product Image </td>
          <td>
            <img src='image/$dustbin_img'  class='img-responsive' width='200px'>
          </td>
        </tr>
        <tr>
          <td>Product Type</td>
          <td>
          $dustbin_type
          </td>
        </tr>
        <tr>
          <td>Product Usage</td>
          <td>
            $dustbin_usage
          </td>
        </tr>
        <tr>
          <td>Dustbin Capacity</td>
          <td>
             $dustbin_capacity 
          </td>
        </tr>
        <tr>
          <td>Dustbin Quality</td>
          <td>
             $dustbin_quality 
          </td>
        </tr>
          ";
      }
    } else if ($_GET['section'] == 'cycle') {
        // echo "Bingo";
        $sql = "SELECT * FROM `dustbin` WHERE `dustbin_type` = 'cycle'";
        $result = mysqli_query($conn, $sql);
        while ($row = $result->fetch_assoc()) {
          $dustbin_img = $row['dustbin_img'];
          $dustbin_type = $row['dustbin_type'];
          $dustbin_usage = $row['dustbin_usage'];
          $dustbin_capacity = $row['dustbin_capacity'];
          $dustbin_quality = $row['dustbin_quality'];
          echo "
          <tr>
          <td>Product Image </td>
          <td>
            <img src='image/$dustbin_img'  class='img-responsive' width='200px'>
          </td>
        </tr>
        <tr>
          <td>Product Type</td>
          <td>
          $dustbin_type
          </td>
        </tr>
        <tr>
          <td>Product Usage</td>
          <td>
            $dustbin_usage
          </td>
        </tr>
        <tr>
          <td>Dustbin Capacity</td>
          <td>
             $dustbin_capacity 
          </td>
        </tr>
        <tr>
          <td>Dustbin Quality</td>
          <td>
             $dustbin_quality 
          </td>
        </tr>
          ";
      }
    } else if ($_GET['section'] == 'swing') {
        $sql = "SELECT * FROM `dustbin` WHERE `dustbin_type` = 'swing'";
        $result = mysqli_query($conn, $sql);
        while ($row = $result->fetch_assoc()) {
          $dustbin_img = $row['dustbin_img'];
          $dustbin_type = $row['dustbin_type'];
          $dustbin_usage = $row['dustbin_usage'];
          $dustbin_capacity = $row['dustbin_capacity'];
          $dustbin_quality = $row['dustbin_quality'];
          echo "
          <tr>
          <td>Product Image </td>
          <td>
            <img src='image/$dustbin_img'  class='img-responsive' width='200px'>
          </td>
        </tr>
        <tr>
          <td>Product Type</td>
          <td>
          $dustbin_type
          </td>
        </tr>
        <tr>
          <td>Product Usage</td>
          <td>
            $dustbin_usage
          </td>
        </tr>
        <tr>
          <td>Dustbin Capacity</td>
          <td>
             $dustbin_capacity 
          </td>
        </tr>
        <tr>
          <td>Dustbin Quality</td>
          <td>
             $dustbin_quality 
          </td>
        </tr>
          ";
      }
}else if ($_GET['section'] == 'static') {
  $sql = "SELECT * FROM `dustbin` WHERE `dustbin_type` = 'static'";
  $result = mysqli_query($conn, $sql);
  while ($row = $result->fetch_assoc()) {
    $dustbin_img = $row['dustbin_img'];
    $dustbin_type = $row['dustbin_type'];
    $dustbin_usage = $row['dustbin_usage'];
    $dustbin_capacity = $row['dustbin_capacity'];
    $dustbin_quality = $row['dustbin_quality'];
    echo "
    <tr>
    <td>Product Image </td>
    <td>
      <img src='image/$dustbin_img'  class='img-responsive' width='200px'>
    </td>
  </tr>
  <tr>
    <td>Product Type</td>
    <td>
    $dustbin_type
    </td>
  </tr>
  <tr>
    <td>Product Usage</td>
    <td>
      $dustbin_usage
    </td>
  </tr>
  <tr>
    <td>Dustbin Capacity</td>
    <td>
       $dustbin_capacity 
    </td>
  </tr>
  <tr>
    <td>Dustbin Quality</td>
    <td>
       $dustbin_quality 
    </td>
  </tr>
    ";
}
}else if ($_GET['section'] == 'moveable') {
  $sql = "SELECT * FROM `dustbin` WHERE `dustbin_type` = 'moveable'";
  $result = mysqli_query($conn, $sql);
  while ($row = $result->fetch_assoc()) {
    $dustbin_img = $row['dustbin_img'];
    $dustbin_type = $row['dustbin_type'];
    $dustbin_usage = $row['dustbin_usage'];
    $dustbin_capacity = $row['dustbin_capacity'];
    $dustbin_quality = $row['dustbin_quality'];
    echo "
    <tr>
    <td>Product Image </td>
    <td>
      <img src='image/$dustbin_img'  class='img-responsive' width='200px'>
    </td>
  </tr>
  <tr>
    <td>Product Type</td>
    <td>
    $dustbin_type
    </td>
  </tr>
  <tr>
    <td>Product Usage</td>
    <td>
      $dustbin_usage
    </td>
  </tr>
  <tr>
    <td>Dustbin Capacity</td>
    <td>
       $dustbin_capacity 
    </td>
  </tr>
  <tr>
    <td>Dustbin Quality</td>
    <td>
       $dustbin_quality 
    </td>
  </tr>
    ";
}
}
}else {
  echo "Error";
}


// Close the database connection
$conn->close();
?>

          </table>
      </div>
    </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  
  <?php include 'includes/footer.php'; ?> 
  <!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>