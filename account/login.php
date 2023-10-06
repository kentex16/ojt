<?php

require_once("../../core/Core.php");

/** User Verification with support for multi-level login */
if (isset($_POST['loginBtn'])) {
    $username = !empty($_POST['username']) ? $_POST['username'] : "";
    $password = !empty($_POST['password']) ? $_POST['password'] : "";
    $authenticate->verifyUser($username, $password);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/js/plugins/sweetalert2/sweetalert2.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <?= $stringUtils->setMessage("warning", "Warning Message"); ?>

    <?php
    if (!empty($_GET['error'])) {
        if ($_GET['error'] == 1) {
            $stringUtils->setMessage("error", "Invalid Username or Password");
        } else if ($_GET['error'] == 2) {
            $stringUtils->setMessage("warning", "Username or Email already exists");
        }
    }
    ?>

    <script src="/assets/js/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="/assets/js/plugins/toastr/toastr.min.js"></script>
</body>

</html>
