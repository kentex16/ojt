<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/Core.php';

if (empty($_SESSION['user']) || $_SESSION['user'] == null) {
    header("Location: /?error=1");
}

if (isset($_POST['btnSubmit'])) {
    // User Variables
    $companyId = !empty($_POST['company']) ? $_POST['company'] : 1;
    $departmentId = !empty($_POST['department']) ? $_POST['department'] : 1;
    $teamId = !empty($_POST['team']) ? $_POST['team'] : 1;
    $username = !empty($_POST['username']) ? $_POST['username'] : "";
    // $password = !empty($_POST['password']) ? $authenticate->setPassword($_POST['password']) : "";
    $picture = !empty($_POST['picture']) ? $_POST['picture'] : "";
    $datejoined = !empty($_POST['datejoined']) ? $_POST['datejoined'] : "";
    $usertype = !empty($_POST['usertype']) ? $_POST['usertype'] : 3;
    $isFirst = !empty($_POST['isFirst']) ? $_POST['isFirst'] : 1;
    $isBanned = !empty($_POST['isBanned']) ? $_POST['isBanned'] : 1;
    $isLeader = !empty($_POST['isLeader']) ? $_POST['isLeader'] : 1;

    // Profile Variables
    $fname = !empty($_POST['firstname']) ? $_POST['firstname'] : "";
    $mname = !empty($_POST['middlename']) ? $_POST['middlename'] : "";
    $lname = !empty($_POST['lastname']) ? $_POST['lastname'] : "";
    $gender = empty($_POST['gender']) ? $_POST['gender'] : 1;
    $address = !empty($_POST['address']) ? $_POST['address'] : "";
    $house = !empty($_POST['house_no']) ? $_POST['house_no'] : "";
    $street = !empty($_POST['street_name']) ? $_POST['street_name'] : "";
    $barangay = !empty($_POST['barangay']) ? $_POST['barangay'] : "";
    $city = !empty($_POST['city']) ? $_POST['city'] : "";
    $country = !empty($_POST['country']) ? $_POST['country'] : 0;
    $zipcode = !empty($_POST['zip']) ? $_POST['zip'] : "";
    $email = !empty($_POST['email']) ? $_POST['email'] : "";
    $telephone = !empty($_POST['telephone']) ? $_POST['telephone'] : "";
    $cellphone = !empty($_POST['contact_number']) ? $_POST['contact_number'] : "";

    $password = $authenticate->setPassword($email);

    $address = "#" . $house . " Street " . $street . " Brgy. " . $barangay . " " . $city . " City " . $zipcode . " " . $country;
    if ($lastInsertId = $user->saveUser($companyId, $departmentId, $teamId, $username, $password, $picture, $datejoined, $usertype, $isFirst, $isBanned, $isLeader)) {
        $profile->saveProfile($lastInsertId, $fname, $mname, $lname, $birthday, $gender, $address, $house, $street, $barangay, $city, $zipcode, $email, $telephone, $cellphone);
        header("Location: /account/admin/user");
    }
}

if (isset($_POST['Update'])) {
    $user_id = !empty($_POST['user_id']) ? $_POST['user_id'] : 1;
    $team = !empty($_POST['team']) ? $_POST['team'] : 1;
    $department = !empty($_POST['department']) ? $_POST['department'] : 1;

    $profile_id = !empty($_POST['profile_id']) ? $_POST['profile_id'] : 1;
    $email = !empty($_POST['email']) ? $_POST['email'] : "No Assigned Email";
    $contact = !empty($_POST['contact_no']) ? $_POST['contact_no'] : "No Assigned Number";
    $address = !empty($_POST['address']) ? $_POST['address'] : "No Assigned Address";

    if ($user->updateUserInfo($user_id, $team, $department)) {
        if ($profile->updateUserProfile($profile_id, $email, $contact, $address)) {
            header("Location: /account/admin/user");
        }
    }
}

$userDetails = $user->getUser($_SESSION['user']->id);
$profileDetails = $profile->getProfile($_SESSION['user']->id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>User</title>
    <link rel="shortcut icon" href="/assets/img/taskmav-logo.png" type="image/x-icon">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/userlist.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <style>
        .collapsible {
            background-color: offwhite;
            color: white;
            cursor: pointer;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
        }

        .active,
        .collapsible:hover {
            background-color: #7EBBF9;
        }

        .content {
            padding: 15px;
            display: none;
            overflow: hidden;
            background-color: #ffffff;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-bottom: 5px;

        }

        .collapsible {
            color: black;
        }

        .btn-primary,
        .btn-danger,
        .btn-default {
            padding: 10px;
            color: white;
            background-color: cornflowerblue;
            border: 0px;
            border-radius: 10px;
            width: 120px;
        }

        .btn-danger,
        .btn-default {
            background-color: #e6534e;
        }

        .buttons {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .buttons>input {
            margin: 10px;
            padding: 10px 20px;
            border-radius: 15px;
            transition: all 0.2s ease-in-out;
            cursor: pointer;
        }

        .buttons>input:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/public/include/sidebar.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="nav">
                    <ul class="nav-item">
                        <li class="nav-item-list">
                            <a href="#">
                                <button id="dropdownInformationButton" class="profile-btn" type="button">
                                    <img src="<?= $user->getUserPicture($_SESSION['user']->id); ?>" alt="" class="profile">
                                    <span class="name">
                                        <?= $profileDetails->profile_fname . " " . $profileDetails->profile_lname;  ?>
                                    </span>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="dropdownInformation" class="profile-dropdown">
                                    <div class="name-contaiter">
                                        <div><?= $profileDetails->profile_fname . " " . $profileDetails->profile_lname;  ?></div>
                                        <div class=""><?= $profileDetails->profile_email; ?></div>
                                    </div>
                                    <ul class="profile-item">
                                        <li>
                                            <a href="/account/admin/profile" class="profile-item-list">Profile</a>
                                        </li>
                                    </ul>
                                    <a href="#" class="logout">Sign out</a>
                                    <script>
                                        document.querySelector(".logout")?.addEventListener("click", function() {
                                            document.getElementById("logoutModal").classList.toggle("show")

                                            if (
                                                document.getElementById("logoutModal").classList.contains("show")
                                            ) {
                                                document.querySelectorAll(".bx.bx-x").forEach(function(element) {
                                                    element?.addEventListener("click", function() {
                                                        document
                                                            .getElementById("logoutModal")
                                                            .classList.remove("show")
                                                    })
                                                })
                                            }
                                            document.querySelectorAll(".btn-cancel").forEach(function(element) {
                                                element?.addEventListener("click", function() {
                                                    document.getElementById("logoutModal").classList.remove("show")
                                                })
                                            })
                                        })
                                    </script>
                                </div>

                                <script>
                                    document.getElementById('dropdownInformationButton')?.addEventListener("click", function() {
                                        document.getElementById("dropdownInformation").classList.toggle("show")

                                        if (document.getElementById("dropdownLeftStart").classList.contains("show")) {
                                            document.getElementById("dropdownLeftStart").classList.remove("show")
                                        }
                                    })
                                </script>
                            </a>
                        </li>
                        <li class="nav-item-list">
                            <a href="#">
                                <button id="dropdownLeftStartButton" class="notif-btn" type="button">
                                    <i class='bx bxs-bell'></i>
                                    <span class="notif-count">3</span>
                                </button>

                                <!-- Dropdown menu -->
                                <div id="dropdownLeftStart" class="notif-dropdwon">
                                    <div class="title">
                                        <span>Notification</span>
                                        <a href="#" class="mark-read">Mark as Read</a>
                                    </div>
                                    <ul class="notif-item">
                                        <?php foreach ($notification->getAllNotification() as $key => $data) : ?>
                                            <li class="notif-item-list">
                                                <img src="<?= $user->getUserPicture($data->user_id); ?>" alt="" class="profile">
                                                <span class="name">
                                                    <p class="detail">
                                                        <span><?= $data->notif_date; ?></span>
                                                    </p>
                                                    <span class="">
                                                        <?= $data->notif_name; ?>
                                                    </span>
                                                    <p class="">
                                                        <?= $data->notif_description; ?>
                                                    </p>
                                                </span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>

                                <script>
                                    document.getElementById('dropdownLeftStartButton')?.addEventListener("click", function() {
                                        document.getElementById("dropdownLeftStart").classList.toggle("show")

                                        if (document.getElementById("dropdownLeftStart").classList.contains("show")) {
                                            document.getElementById("dropdownInformation").classList.remove("show")
                                        }

                                    })
                                </script>
                            </a>
                        </li>
                        <li class="nav-item-list">
                            <ul class="time-item">
                                <li class="time-item-list">
                                    <a href="#">
                                        <i class='bx bx-menu'></i>
                                    </a>
                                </li>
                                <li class="time-item-list">
                                    <a href="#">
                                        <div class="dateTime">
                                            <div class="date">
                                                June 06, 2022
                                            </div>
                                            <div class="time">
                                                5:53 PM
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="usersList">
                                <h2>User List</h2>
                                <a class="btn btn-outline-primary" data-toggle="modal" data-target="#addUserModal">
                                    <i class='bx bxs-user-plus'></i>

                                    <script>
                                        document.querySelector('.bx.bxs-user-plus').addEventListener("click", function() {
                                            document.getElementById("authentication-add").classList.toggle("show")

                                            if (
                                                document.getElementById("authentication-add").classList.contains("show")
                                            ) {
                                                document.querySelectorAll(".bx.bx-x")?.forEach(function(element) {
                                                    element.addEventListener("click", function() {
                                                        document.getElementById("authentication-add").classList.remove("show")
                                                    })
                                                })
                                            }
                                            document.querySelectorAll(".btn-prev")?.forEach(function(element) {
                                                element.addEventListener("click", function() {
                                                    document.getElementById("authentication-add").classList.remove("show")
                                                })
                                            })
                                        })
                                    </script>
                                </a>
                                <div id="authentication-add" class="modal-add">
                                    <div class="modal-container">
                                        <!-- Modal content -->
                                        <div class="">
                                            <div class="modal-content">
                                                <div class="modal-title">
                                                    <p class="">Add User</p>
                                                    <button><i class='bx bx-x'></i></button>
                                                </div>
                                                <form action="" method="post" class="form" id="form">
                                                    <div class="steps">
                                                        <div class="form-steps">
                                                            <!-- First Name -->
                                                            <div class="form-group firstname">
                                                                <label for="firstname">First Name</label>
                                                                <input type="text" name="firstname" id="firstname" placeholder="First Name" autocomplete="off" required>
                                                                <div data-validation="firstname"></div>
                                                            </div>
                                                            <!-- Middle Name -->
                                                            <div class="form-group middlename">
                                                                <label for="middlename">Middle Name (<small>Optional</small>)</label>
                                                                <input type="text" name="middlename" id="middlename" placeholder="Middle Name" autocomplete="off">
                                                                <div data-validation="middlename"></div>
                                                            </div>
                                                            <!-- Last Name -->
                                                            <div class="form-group lastname">
                                                                <label for="lastname">Last Name</label>
                                                                <input type="text" name="lastname" id="lastname" placeholder="Last Name" autocomplete="off" required>
                                                                <div data-validation="lastname"></div>
                                                            </div>
                                                            <!-- Gender -->
                                                            <!-- Contact Number -->
                                                            <div class="form-group cNo">
                                                                <label for="contact_number">Contact Number</label>
                                                                <input type="text" name="contact_number" id="contact_number" placeholder="Contact Number" autocomplete="off" required>
                                                                <div data-validation="contact_number"></div>
                                                            </div>
                                                            <!-- Gender -->
                                                            <div class="form-group gender">
                                                                <label for="gender">Gender</label>
                                                                <select name="gender" id="gender">
                                                                    <option value="0" disabled>Select Gender</option>
                                                                    <option value="1">Male</option>
                                                                    <option value="0">Female</option>
                                                                </select>
                                                            </div>
                                                            <!-- Username -->
                                                            <div class="form-group username">
                                                                <label for="username">Username</label>
                                                                <input type="text" name="username" id="username" placeholder="Username" autocomplete="off" required>
                                                                <div data-validation="username"></div>
                                                            </div>
                                                            <!-- Email -->
                                                            <div class="form-group email">
                                                                <label for="email">Email</label>
                                                                <input type="email" name="email" id="email" placeholder="Email" autocomplete="off" required>
                                                                <div data-validation="email"></div>
                                                            </div>
                                                            <!-- Password -->
                                                            <div class="form-group gender">
                                                                <label for="team">Team</label>
                                                                <select name="team" id="team">
                                                                    <option value="" disabled>Select Team</option>
                                                                    <?php foreach ($team->getAllTeam() as $key => $data) : ?>
                                                                        <option value="<?= $data->id; ?>"><?= $data->team_name; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <!-- Confirm Password -->
                                                            <div class="form-group gender">
                                                                <label for="leader">Leader</label>
                                                                <select name="leader" id="leader">
                                                                    <option value="" disabled>Select Leader</option>
                                                                    <option value="1">No</option>
                                                                    <option value="0">Yes</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group company">
                                                                <label for="company">Company</label>
                                                                <select name="company" id="company">
                                                                    <option value="" disabled>Select Company</option>
                                                                    <?php foreach ($company->getAllCompany() as $key => $data) : ?>
                                                                        <option value="<?= $data->id; ?>"><?= $data->company_name; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group department">
                                                                <label for="department">Department</label>
                                                                <select name="department" id="department">
                                                                    <option value="" disabled>Select Department</option>
                                                                    <?php foreach ($department->getAllDepartment() as $key => $data) : ?>
                                                                        <option value="<?= $data->id; ?>"><?= $data->department_name; ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="steps">
                                                        <div class="form-add">
                                                            <!-- House # -->
                                                            <div class="form-group house_no">
                                                                <label for="house_no">House #</label>
                                                                <input type="text" name="house_no" id="house_no" placeholder="House #" autocomplete="off" required>
                                                                <div data-validation="house_no"></div>
                                                            </div>
                                                            <!-- Street Name -->
                                                            <div class="form-group street_name">
                                                                <label for="street_name">Street Name</label>
                                                                <input type="text" name="street_name" id="street_name" placeholder="Street Name" autocomplete="off" required>
                                                                <div data-validation="street_name"></div>
                                                            </div>
                                                            <!-- City -->
                                                            <div class="form-group city">
                                                                <label for="city">City</label>
                                                                <select id="city" name="city">
                                                                    <option value="">Select City</option>
                                                                </select>
                                                                <div data-validation="city"></div>
                                                            </div>
                                                            <!-- Barangay -->
                                                            <div class="form-group barangay">
                                                                <label for="barangay">Barangay</label>
                                                                <input type="text" name="barangay" id="barangay" placeholder="Barangay" autocomplete="off" required>
                                                                <div data-validation="barangay"></div>
                                                            </div>
                                                            <!-- Zip Code -->
                                                            <div class="form-group zip">
                                                                <label for="zip">Zip Code</label>
                                                                <input type="text" name="zip" id="zip" placeholder="Zip Code" autocomplete="off" required>
                                                                <div data-validation="zip"></div>
                                                            </div>
                                                            <!-- Country -->
                                                            <div class="form-group country">
                                                                <label for="country">Country</label>
                                                                <select name="country" id="country">
                                                                    <option value="">Select Country</option>
                                                                </select>
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
                                <div id="authentication-update" class="modal-update">
                                    <div class="modal-container">
                                        <!-- Modal content -->
                                        <div class="">
                                            <div class="modal-content">
                                                <div class="modal-title">
                                                    <p class="">Add User</p>
                                                    <button><i class='bx bx-x'></i></button>
                                                </div>
                                                <form action="" method="post" class="form" id="form">
                                                    <div class="steps">
                                                        <div class="form-steps">
                                                            <!-- First Name -->
                                                            <div class="form-group firstname">
                                                                <label for="firstname">First Name</label>
                                                                <input type="text" name="firstname" id="firstname" placeholder="First Name" autocomplete="off" required>
                                                                <div data-validation="firstname"></div>
                                                            </div>
                                                            <!-- Middle Name -->
                                                            <div class="form-group middlename">
                                                                <label for="middlename">Middle Name (<small>Optional</small>)</label>
                                                                <input type="text" name="middlename" id="middlename" placeholder="Middle Name" autocomplete="off">
                                                                <div data-validation="middlename"></div>
                                                            </div>
                                                            <!-- Last Name -->
                                                            <div class="form-group lastname">
                                                                <label for="lastname">Last Name</label>
                                                                <input type="text" name="lastname" id="lastname" placeholder="Last Name" autocomplete="off" required>
                                                                <div data-validation="lastname"></div>
                                                            </div>
                                                            <!-- Contact Number -->
                                                            <div class="form-group cNo">
                                                                <label for="contact_number">Contact Number</label>
                                                                <input type="text" name="contact_number" id="contact_number" placeholder="Contact Number" autocomplete="off" required>
                                                                <div data-validation="contact_number"></div>
                                                            </div>
                                                            <!-- Gender -->
                                                            <div class="form-group gender">
                                                                <label for="gender">Gender</label>
                                                                <select name="gender" id="gender">
                                                                    <option value="">Select Gender</option>
                                                                    <option value="">Male</option>
                                                                    <option value="">Female</option>
                                                                </select>
                                                            </div>
                                                            <!-- Username -->
                                                            <div class="form-group username">
                                                                <label for="username">Username</label>
                                                                <input type="text" name="username" id="username" placeholder="Username" autocomplete="off" required>
                                                                <div data-validation="username"></div>
                                                            </div>
                                                            <!-- Email -->
                                                            <div class="form-group email">
                                                                <label for="email">Email</label>
                                                                <input type="email" name="email" id="email" placeholder="Email" autocomplete="off" required>
                                                                <div data-validation="email"></div>
                                                            </div>
                                                            <!-- Password -->
                                                            <div class="form-group password">
                                                                <label for="password">Password</label>
                                                                <input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required>
                                                                <div data-validation="password"></div>
                                                            </div>
                                                            <!-- Confirm Password -->
                                                            <div class="form-group confirm_password">
                                                                <label for="confirm_password">Confirm Password</label>
                                                                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" autocomplete="off" required>
                                                                <div data-validation="confirm_password"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="steps">
                                                        <div class="form-add">
                                                            <!-- House # -->
                                                            <div class="form-group house_no">
                                                                <label for="house_no">House #</label>
                                                                <input type="text" name="house_no" id="house_no" placeholder="House #" autocomplete="off" required>
                                                                <div data-validation="house_no"></div>
                                                            </div>
                                                            <!-- Street Name -->
                                                            <div class="form-group street_name">
                                                                <label for="street_name">Street Name</label>
                                                                <input type="text" name="street_name" id="street_name" placeholder="Street Name" autocomplete="off" required>
                                                                <div data-validation="street_name"></div>
                                                            </div>
                                                            <!-- City -->
                                                            <div class="form-group city">
                                                                <label for="city">City</label>
                                                                <select id="city" name="city">
                                                                    <option value="">Select City</option>
                                                                </select>
                                                                <div data-validation="city"></div>
                                                            </div>
                                                            <!-- Barangay -->
                                                            <div class="form-group barangay">
                                                                <label for="barangay">Barangay</label>
                                                                <input type="text" name="barangay" id="barangay" placeholder="Barangay" autocomplete="off" required>
                                                                <div data-validation="barangay"></div>
                                                            </div>
                                                            <!-- Zip Code -->
                                                            <div class="form-group zip">
                                                                <label for="zip">Zip Code</label>
                                                                <input type="text" name="zip" id="zip" placeholder="Zip Code" autocomplete="off" required>
                                                                <div data-validation="zip"></div>
                                                            </div>
                                                            <!-- Country -->
                                                            <div class="form-group country">
                                                                <label for="country">Country</label>
                                                                <select name="country" id="country">
                                                                    <option value="">Select Country</option>
                                                                </select>
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
                                <!-- Delete modal -->
                                <div class="modal-delete fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-title">
                                                <p class="">Are You sure? </p>
                                                <button><i class='bx bx-x'></i></button>
                                            </div>
                                            <div class="modal-body">Select "Delete" below if you want to delete.</div>
                                            <div class="modal-footer">
                                                <button class="btn-cancel" type="button" data-dismiss="modal">Cancel</button>
                                                <a class="btn-delete" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="collapsible">
                        <table>
                            <thead>
                                <td>#</td>
                                <td>NAME</td>
                                <td>ROLE</td>
                                <td>TEAM</td>
                                <td>DEPARTMENT</td>
                            </thead>
                        </table>
                    </button>
                    <p></p>
                    <?php foreach ($user->getAllUser() as $key => $data) : ?>
                        <button type="button" class="collapsible">
                            <table>
                                <thead>
                                    <td><?= $data->id; ?></td>
                                    <td><?= $profile->getProfile($data->id)->profile_fname . " " . $profile->getProfile($data->id)->profile_lname; ?></td>
                                    <td><?= $stringUtils->getUserType($data->user_usertype); ?></td>
                                    <td><?= $team->getTeam($data->team_id)->team_name; ?></td>
                                    <td><?= $department->getDepartment($data->department_id)->department_name; ?></td>
                                    <td hidden><?= $user_id = $data->id; ?></td>
                                    <td hidden>'.$db_contactNum.'</td>
                                    <td hidden>'.$db_email.'</td>
                                    <td hidden>'.$db_address.'</td>
                                    <td hidden>'.$db_departmentID.'</td>
                                    <td hidden>'.$db_firstName.'</td>
                                    <td hidden>'.$db_lastName.'</td>
                                    <td hidden>'.$db_middleName.'</td>
                                </thead>
                            </table>
                        </button>

                        <div class="content">
                            <form method="POST">
                                <input type="hidden" value="<?= $user_id; ?>" name="user_id" id="user_id">
                                <input type="hidden" value="<?= $profile->getProfile($user_id)->id; ?>" name="profile_id" id="profile_id">
                                <table>
                                    <tr>
                                        <td rowspan="3" style="width:15%">
                                            <img src="<?= $user->getUserPicture($user_id); ?>" style="border-radius:50%;border:1px solid black;height:100px;width:100px;">
                                        </td>
                                        <td colspan="2">
                                            <label for="Email"> Email: </label>
                                            <input type="text" value="<?= $profile->getProfile($user_id)->profile_email; ?>" id="Email" name="email" placeholder="Enter Email" style="max-width:auto;width:70%;height:30px;" />
                                        </td>
                                        <td colspan="2">
                                            <label for="Contact No"> Contact No.: </label>
                                            <input type="text" value="<?= $profile->getProfile($user_id)->profile_cellphone; ?>" name="contact_no" placeholder=" Enter Contact No" style="max-width:auto;width:70%;height:30px;" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <label for="team"> Team: </label>
                                            <select name="team" id="team" style="max-width:auto;width:70%;height:30px;">
                                                <option value="" disabled>Select Team</option>
                                                <?php foreach ($team->getAllTeam() as $key => $data) : ?>
                                                    <option value="<?= $data->id; ?>"><?= $data->team_name; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td colspan="2">
                                            <label for="Department"> Department: </label>
                                            <select name="department" id="Department" style="max-width:auto;width:70%;height:30px;">
                                                <option value="" disabled>Select Department</option>
                                                <?php foreach ($department->getAllDepartment() as $key => $data) : ?>
                                                    <option value="<?= $data->id; ?>"><?= $data->department_name; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <label for="Address"> Address: </label>
                                            <input type="text" value="<?= $profile->getProfile($user_id)->profile_fulladdress; ?>" name="address" placeholder="Enter Address" style="max-width:auto;width:70%;height:30px;" />
                                        </td>
                                    </tr>
                                </table>

                                <div class="buttons">
                                    <input type="submit" class=" btn-primary" value="Update" name="Update" id="" />
                                    <input type="submit" id="delete" class=" btn-danger" value="Delete" name="Delete" id="" />
                                </div>
                            </form>
                        </div>
                    <?php endforeach; ?>

                    <script>
                        var coll = document.getElementsByClassName("collapsible");
                        var i;

                        for (i = 0; i < coll.length; i++) {
                            coll[i].addEventListener("click", function() {
                                this.classList.toggle("active");
                                var content = this.nextElementSibling;
                                if (content.style.display === "block") {
                                    content.style.display = "none";
                                } else {
                                    content.style.display = "block";
                                }
                            });
                        }
                    </script>


                    <div class="modal-logout fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-title">
                                    <p class="">Are You Ready? </p>
                                    <button><i class='bx bx-x'></i></button>
                                </div>
                                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                                <div class="modal-footer">
                                    <button class="btn-cancel" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn-logout" href="#">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>


    </div>


    </div>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script scr="/assets/js/main.js"></script>


</body>

</html>
