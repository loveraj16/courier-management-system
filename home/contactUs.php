<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Somehow I got an error, so I comment the title, just uncomment to show -->
    <title>ContactUs</title>
    <link rel="stylesheet" href="../css/style.css">
    <!-- bootstrap cdn link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
<?php
include('header.php');
?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 mail-form">
                <h2 class="text-center">Drop a message</h2>
                <p class="text-center">We are waiting for your response..</p>
                
                <form action="contactUs.php" method="POST">
                    <div class="form-group">
                        <input class="form-control" name="email" type="email" placeholder="email Id" >
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="subject" type="text" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <!-- change this tag name into textarea to show textarea field. Due to more textarea I got an error, so I change the name of this field -->
                        <input  class="form-control textarea" type="textarea" name="message" placeholder="Compose your message..">
                    </div>
                    <div class="form-group">
                        <input class="form-control button btn-primary" type="submit" name="send" value="Send" placeholder="Subject">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<!-- starting php code -->
<?php

if (isset($_POST['send'])) {
    include('../dbconnection.php');
    //access user entered data
    $eml = $_POST['email'];
    $sub = $_POST['subject'];
    $msg = $_POST['message'];

    $qry = "INSERT INTO `contacts` (`email`, `subject`, `msg`) VALUES ('$eml', '$sub', '$msg')";
    $run = mysqli_query($dbcon, $qry);

    if ($run == true) {

    ?> <script>
            alert('Thanks, we will be looking at your concern :)');
            window.open('home.php', '_self');
        </script>
    <?php
    }
}
?>