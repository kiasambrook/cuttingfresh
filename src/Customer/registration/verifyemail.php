<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Verify Email</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>

    <?php
    session_start();
    include("../db.php");
    require_once "Mail.php";
    
    // get variables from register form
    $email = $_SESSION['email'];
    $vkey = $_SESSION['vkey'];
    $forename = $_SESSION['forename'];

    // send verification email with link
    $to  = "$email";
    $subject = 'Verify Your Email at Cutting Fresh';
    $message = 'Hi '.$forename .', thank you for registering with us, to verify your email please click <a href="https://cuttingfresh.xyz/verified.php?vkey=' .$vkey. '">here</a>';
    
    // set mail parameters
    $headers = 'From: no-reply@cuttingfresh.com' . "\r\n" .
    'Reply-To: kiasambrook@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    mail($to, $subject, $message, $headers);
    
    
    // display page
    echo "<h1>Thanks for registering, $forename!</h1>";
    echo "<p>To continue with login, you will need to verify your account. To do this click the link that we have now sent to your email inbox at <strong>$email</strong>. If you cannot find the email check your junk box.</p>";
    echo "<p>Once you have verified your account, you can <a href='userlogin.html'>login</a>.</p>";
    
    session_destroy();

    ?>
</body>

</html>
