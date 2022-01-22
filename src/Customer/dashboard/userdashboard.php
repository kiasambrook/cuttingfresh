<?php
      session_start();

      require("../db.php");

    
      $name = $_SESSION['forename'];
      $user_id = $_SESSION['id'];

      $appointmentNo = 0; 

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link
       href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
       rel="stylesheet"
       integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
       crossorigin="anonymous"
     />
     <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">
     <link 
     rel="stylesheet"
     href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
     integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
     <link rel="icon" href="images/favicon.ico">

     <link href="dashboard.css" rel="stylesheet">

     <body>
<!-- Main Nav bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <!-- Cutting Fresh Title -->
    <a class="navbar-brand" href="userdashboard">
      <img
        src="../images/Logo.png"
        width="30"
        height="30"
        class="d-inline-block align-top"
        alt="logo"
      />
      Cutting Fresh
    </a>

    <!-- Hamburger bars -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarText"
      aria-controls="navbarText"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- nav bar content -->
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="userdashboard"
            >Your bookings</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bookappointment">New booking</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="manageaccount">Manage account</a>
        </li>
      </ul>

      <!-- Text on right side of nav bar -->
      <span class="navbar-text">
        <a href="logout" style="text-decoration:none;">Logout</a>
      </span>
    </div>
  </div>
</nav>

<main class="text-center">
  <h2>Welcome back, <?php echo $name ?>!</h2>

  <p>Welcome to your dashboard, here you can book, manage, and delete your appointments.</p>
  <br>

  <a class="btn btn-outline-dark btn-lg" href="bookappointment" role="button">Book appointment</a>
  <br><br>
  <a class="btn btn-outline-dark btn-lg" href="manageaccount" role="button">Manage account</a>

  <br><br>

  <h4>Your appointments:</h4>
  <p><?php if($appointmentNo ==0){
    echo "You have no appointments booked, why not treat yourself and book with Cutting Fresh today?";
  } ?>
  </p>



</main>

  <!-- Footer -->
  <footer class="text-center text-lg-start bg-dark text-white">
    <!-- Section: Social media -->
    <section
      class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
    >
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->
  
      <!-- Right -->
      <div>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-linkedin"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->
  
    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-cut me-3"></i>Cutting Fresh
            </h6>
            <p>
              Book an appointment via our booking online service or give us a ring to set one up for you. 
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Our business:
            </h6>
            <p>
              Serve all ages 3 and up
            </p>
            <p>
              Unisex services available
            </p>
            <p>
              Free customer parking
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Useful links
            </h6>
            <p>
              <a href="logout" class="text-reset">Logout</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Book Appointments</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Staff Login</a>
            </p>
            <p>
              <a href="#!" class="text-reset">FAQ</a>
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Contact
            </h6>
            <p><i class="fas fa-home me-3"></i> Neath, SA10, Wales</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              cuttingfresh@email.com
            </p>
            <p><i class="fas fa-phone me-3"></i> 01234 121221</p>
            <p><i class="fas fa-print me-3"></i> 01234 121221</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->
  
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2021 Copyright: Cutting Fresh | Kia Sambrook
      </div>
      <!-- Copyright -->
    </footer>
    

</body> 
</html>