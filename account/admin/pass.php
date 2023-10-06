<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/Core.php';

if (empty($_SESSION['user']) || $_SESSION['user'] == null) {
    header("Location: /?error=1");
}

$userDetails = $user->getUser($_SESSION['user']->id);
$profileDetails = $profile->getProfile($_SESSION['user']->id);

?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <title>Dashboard</title>
    <link rel="shortcut icon" href="/assets/img/taskmav-logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reseter.css/2.0.0/reseter.min.css" />
    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body>
    <section class="dashboard">
        <div id="authentication-add" class="change-pass">
            <div class="modal-container">
                <!-- Modal content -->
                <div class="">
                    <div class="modal-content">
                        <div class="modal-title">
                            <p class="">Change Password</p>
                            <!-- <button><i class='bx bx-x' ></i></button> -->
                        </div>
                        <form action="" method="post" class="form" id="form">
                            <div class="steps">
                                <div class="form-project">
                                    <div class="form-group current_pass">
                                        <label for="current_pass">Current Password</label>
                                        <input type="password" name="current_pass" id="current_pass" placeholder="Current Password" autocomplete="off">
                                        <div data-validation="current_pass"></div>
                                    </div>
                                    <div class="form-group new_pass">
                                        <label for="new_pass">New Password</label>
                                        <input type="password" name="new_pass" id="new_pass" placeholder="New Password" autocomplete="off" required>
                                        <div data-validation="new_pass"></div>
                                    </div>
                                    <div class="form-group cNo">
                                        <label for="confrirm_pass">Confrim Password</label>
                                        <input type="password" name="confrirm_pass" id="confrirm_pass" placeholder="Confrim Password" autocomplete="off" required>
                                        <div data-validation="confrirm_pass"></div>
                                    </div>


                                </div>
                            </div>
                            <div class="btn">
                                <button class="btn-prev" name="btn-prev">Cancel</button>
                                <button class="btn-sub" name="btnSubmit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Custom JavaScript -->
    <script src="/assets/js/main.js"></script>
</body>

</html>
