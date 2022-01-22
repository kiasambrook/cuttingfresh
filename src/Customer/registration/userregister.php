<?php
  
  include("../db.php");


/* TODO:
    - Santise input data
    - Send out verifying email
    - Create the verified email page
    - Update user profile to show email has been verified
*/

try{
        
    if (isset($_POST['submit'])){
        // get details from form
        $surname = $_POST["surname"];
        $forename = $_POST["forename"];
        $email = $_POST["email"];
        $mobile = $_POST["mobile"];
        $dob = $_POST["dob"];

        // encrypt the password
        $password = stripslashes($_POST["password"]);
        $epass = password_hash($password, PASSWORD_BCRYPT);
        // set email verification code
        $vkey = md5(time().$surname);

        // check email is unique
        $checkEmail = $pdo->prepare("SELECT * FROM users WHERE email=:email");
        $checkEmail->execute(['email'=>$email]);
        $emailFound = $checkEmail->fetch();
        
        if(!$emailFound){
            // insert data into database
            $query = "INSERT INTO users(surname, forename, email, mobile, password, vkey,dob) VALUES('".$surname."','".$forename."','".$email."','".$mobile."','".$epass."','".$vkey."','".$dob."');";
            $stmt = $pdo->prepare($query);
            if($stmt->execute()){
                header("Location:verifyemail");
            }else if(!$stmt){
                echo "\nPDO::errorInfo()\n";
                print_r($pdo->errorInfo());
            }

            // pass email and vkey to verify email page to be used to send the email
            session_start();
            $_SESSION['forename'] = $forename;
            $_SESSION['email'] = $email;
            $_SESSION['vkey'] = $vkey;
        }
        else if($emailFound){
            header("Location:emailexists");
        }
        
    



    
    }
}
catch(PDOException $e){
    echo $e->getMessage();
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

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

     <link href="../login/login.css" rel="stylesheet">


</head>
<body >
<main class="text-center">
<form method="POST" name="register" id="register" class="form-signin" id="formContent">
    <h2 class="h3 mb-3 font-weight-normal">Create an account</h2>
    <p>Registering an account will allow you to book, manage, and view appointments you have made at Cutting Fresh.</p>
        
    <label for="forename"class="sr-only">Forename:</label>
    <input type="text" name="forename" placeholder="Forename..." id="forename" class="form-control" required />
        <br>
        <label for="surname"class="sr-only">Surname:</label>
        <input type="text" name="surname" placeholder="Surname..." id="surname" class="form-control" required />
        <br>
        <label for="email"class="sr-only">Email Adress:</label>
        <input type="email" name="email" placeholder="Email address..." id="email" class="form-control" required/>
        <br>
        <label for="password"class="sr-only">Password:</label>
        <input type="password" name="password" placeholder="Password..." id="password" class="form-control" required onkeyup="checkPassword()" /> 
        <br>
        <label for="confirm_password"class="sr-only">Confirm Password:</label>
        <input type="password" name="confirm_password" placeholder="Confirm Password..." class="form-control" id="confirm_password" required onkeyup='checkPassword()' />
        <span id='message'></span>
        <br>
        <label for="mobile"class="sr-only">Mobile Number:</label>
        <input type="tel" name="mobile" placeholder="Mobile nummber..." id="mobile" class="form-control" required minlength="11" maxlength="11" required />
        <br>
        <input type="date" class="form-control" required id="dob" name="dob">
        <br>
        <input type="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block"/> 
        <a href="../login/userlogin.php"><input type="button" id="login" value="Already have an account?" class="btn btn-lg btn-block btn-outline-secondary" /></a>

    </form>
</body>
</html>