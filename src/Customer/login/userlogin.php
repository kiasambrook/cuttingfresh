
<?php

/*
  TODO:
  - check whether email is verified, if not go to verify email page
  - build dashboard
  - forgot password
  - pass session variables over
*/

  require("../db.php");
  $output = "";

  try{
    if(isset($_POST['login'])){

      // get form values
      $email = $_POST['email'];
      $password = $_POST['password'];

      //retreieve table row that matches email
      $sql = "SELECT id, forename, email, password, verified, vkey FROM users WHERE email = '".$email."'";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      // check if user exists
      if($user !== false){

        // check if password is valid
        $validPassword = password_verify($password, $user['password']);
        if($validPassword){
          // pass user values to next page
          session_start();
          $_SESSION['forename'] = $user['forename'];
          $_SESSION['email'] = $user['email'];
          $_SESSION['vkey'] = $user['vkey'];
          $_SESSION['id'] = $user['id'];

          // check if user is verefied 
          if($user['verified'] !=0){
            // move to dashboard
          header("Location:../dashboard/userdashboard");
          }
          else{
            // move to verify email page
            header("Location:../registration/verifyemail");
          }
        }
        else{
          $output = "The entered password is incorrect, please try again.";
        }
      }
      else{
        $output = "Email does not exist, please try again.";
      }
      
    }
  }catch(PDOException $e){
    echo $e->getMessage();
}

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

     <link href="login.css" rel="stylesheet">

     <body>
<!-- Main Nav bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <!-- Cutting Fresh Title -->
    <a class="navbar-brand" href="/../index.html">
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
          <a class="nav-link active" aria-current="page" href="/../index.html"
            >Home</a
          >
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/../index.html#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/../index.html#services">Services</a>
        </li>
      </ul>

      <!-- Text on right side of nav bar -->
      <span class="navbar-text">
        <strong>Telephone: </strong>012345 121221
      </span>
    </div>
  </div>
</nav>

<main class="text-center">
  <form method="post" class="form-signin">
    <h2 class="h3 mb-3 font-weight-normal">Login</h2>
    <p>To book an appointment or to manage your account, please login below:</p>

    <p id="formError" style="color: red;"><?php echo $output ?></p>

    <div id="formContent">
      <label for="email"class="sr-only">Email address:</label>
      <br />
      <input name="email" id="email" type="email" placeholder="Email..."  class="form-control" required/>

      <label for="password" class="sr-only">Password:</label>
      <br />
      <input type="password" name="password" id="password" placeholder="Password..."  class="form-control" required/>

      <br />
      <a href="#">Forgotten password?</a>
      <br />
      <br />

      <input type="submit" id="login" name="login" value="Login" class="btn btn-lg btn-primary btn-block"></input>
      <br>

     <a href="../registration/userregister"><input type="button" id="register" value="Don't have an account?" class="btn btn-lg btn-block btn-outline-secondary" /></a>
  </div>
  </form>
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
              <a href="userlogin.html" class="text-reset">User Login</a>
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
