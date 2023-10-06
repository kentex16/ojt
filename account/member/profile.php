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

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="shortcut icon" href="/assets/img/taskmav-logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/reseter.css/2.0.0/reseter.min.css" />
    <link rel="stylesheet" href="/assets/css/user/main.css">
</head>

<body>
    <section class="dashboard">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/public/include/sidebar.php'; ?>
        <main class="main">
            <div class="container">
                <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/public/include/topbar.php'; ?>
                <section class="content">
                    <div class="bg-gray">
                        <div class="page-title dash">Profile</div>
                        <div class="p-5">
                            <div class="mdflex">
                                <div class="w-full">
                                    <!-- Profile Card -->
                                    <div class="bg-white ">
                                        <div class="image">
                                            <img class="h-auto" src="<?= $user->getUserPicture($_SESSION['user']->id); ?>" alt="">
                                        </div>
                                        <h1 class="text-gray-900 "><?= $profile->getProfile($_SESSION['user']->id)->profile_fname . " " . $profile->getProfile($_SESSION['user']->id)->profile_lname ?>
                                        </h1>
                                        <h3 class="text-gray-600 ">Melham Construction Corporation</h3>
                                        <p class="text-gray-500 ">Lorem ipsum dolor sit amet
                                            consectetur adipisicing elit.
                                            Reprehenderit, eligendi dolorum sequi illum qui unde aspernatur non deserunt</p>
                                        <ul class="bg-gray-100 ">
                                            <li class="flex-stat">
                                                <span>Status: </span>
                                                <span class=""><span class="bg-green-500">Active</span></span>
                                            </li>
                                            <li class="flex-stat">
                                                <span>Member since</span>
                                                <span class="ml-auto">Nov 07, 2016</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="bg-white" id="edit" style="display: none;">
                                        <form>
                                            <div class="image">
                                                <label for="file" class="file">
                                                    <img src="<?= $user->getUserPicture($_SESSION['user']->id); ?>" alt="">
                                                </label>
                                                <input type="file" name="file" id="file">
                                            </div>
                                            <h1 class="text-gray-900 ">Edit Profile
                                                <label for="submit" class="file">
                                                    <span><i class='bx bxs-edit-alt'></i></span>
                                                    <input type="submit" id="submit" name="submit" value="Update" class="btn-sumbit">
                                                </label>
                                            </h1>
                                        </form>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="bg-white">
                                        <div class="text-gray-700">
                                            <div class="grid ">
                                                <div class="flex">
                                                    <span clas="text-green">
                                                        <i class='bx bxs-user-circle'></i>
                                                    </span>
                                                    <span class="tracking-wide">About</span>
                                                </div>
                                                <div class="cols">
                                                    <div class="semibold">First Name</div>
                                                    <div class="py-2"><?= $profile->getProfile($_SESSION['user']->id)->profile_fname; ?></div>
                                                </div>
                                                <div class="cols">
                                                    <div class="semibold">Last Name</div>
                                                    <div class="py-2"><?= $profile->getProfile($_SESSION['user']->id)->profile_lname; ?></div>
                                                </div>
                                                <div class="cols">
                                                    <div class="semibold">Gender</div>
                                                    <div class="py-2"><?= $stringUtils->getGender($profile->getProfile($_SESSION['user']->id)->profile_gender); ?></div>
                                                </div>
                                                <div class="cols">
                                                    <div class="semibold">Contact No.</div>
                                                    <div class="py-2"><?= $profile->getProfile($_SESSION['user']->id)->profile_cellphone; ?></div>
                                                </div>
                                                <div class="cols">
                                                    <div class="semibold">Current Address</div>
                                                    <div class="py-2"><?= $profile->getProfile($_SESSION['user']->id)->profile_fulladdress; ?></div>
                                                </div>
                                                <div class="cols">
                                                    <div class="semibold">Email.</div>
                                                    <div class="py-2">
                                                        <a class="text-blue-800" href="#"><?= $profile->getProfile($_SESSION['user']->id)->profile_email; ?></a>
                                                    </div>
                                                </div>
                                                <div class="cols">
                                                    <div class="semibold">Birthday</div>
                                                    <div class="py-2"><?= $profile->getProfile($_SESSION['user']->id)->profile_birthday; ?></div>
                                                </div>
                                                <div class="cols">
                                                    <div class="semibold">Team</div>
                                                    <div class="py-2">
                                                        <a class="text-blue-800" href="#"><?= $team->getTeam($_SESSION['user']->team_id)->team_name; ?></a>
                                                    </div>
                                                </div>
                                                <div class="cols">
                                                    <div class="semibold">Department</div>
                                                    <div class="py-2">
                                                        <a class="text-blue-800" href="#"><?= $department->getDepartment($_SESSION['user']->department_id)->department_name; ?></a>
                                                    </div>
                                                </div>
                                                <div class="cols-btn">
                                                    <button class="block">Update Profile
                                                    </button>
                                                    <button class="block change_pass">Change Password
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-form" id="edit" style="display: none;">
                                            <form action="" method="post" class="form" id="form">
                                                <div class="steps">
                                                    <div class="form-steps">
                                                        <!-- First Name -->
                                                        <div class="form-group firstname">
                                                            <label for="firstname">First Name</label>
                                                            <input type="text" value="<?= $profile->getProfile($_SESSION['user']->id)->profile_fname; ?>" name="firstname" id="firstname" placeholder="First Name" autocomplete="off" required>
                                                            <div data-validation="firstname"></div>
                                                        </div>
                                                        <!-- Middle Name -->
                                                        <div class="form-group middlename">
                                                            <label for="middlename">Middle Name (<small>Optional</small>)</label>
                                                            <input type="text" value="<?= $profile->getProfile($_SESSION['user']->id)->profile_mname; ?>" name="middlename" id="middlename" placeholder="Middle Name" autocomplete="off">
                                                            <div data-validation="middlename"></div>
                                                        </div>
                                                        <!-- Last Name -->
                                                        <div class="form-group lastname">
                                                            <label for="lastname">Last Name</label>
                                                            <input type="text" value="<?= $profile->getProfile($_SESSION['user']->id)->profile_lname; ?>" name="lastname" id="lastname" placeholder="Last Name" autocomplete="off" required>
                                                            <div data-validation="lastname"></div>
                                                        </div>
                                                        <!-- Contact Number -->
                                                        <div class="form-group cNo">
                                                            <label for="contact_number">Contact Number</label>
                                                            <input type="text" value="<?= $profile->getProfile($_SESSION['user']->id)->profile_cellphone; ?>" name="contact_number" id="contact_number" placeholder="Contact Number" autocomplete="off" required>
                                                            <div data-validation="contact_number"></div>
                                                        </div>
                                                        <!-- Gender -->
                                                        <div class="form-group gender">
                                                            <label for="gender">Gender</label>
                                                            <select name="gender" id="gender">
                                                                <option value="1">Select Gender</option>
                                                                <option value="1">Male</option>
                                                                <option value="0">Female</option>
                                                            </select>
                                                        </div>
                                                        <!-- Username -->

                                                        <!-- Email -->
                                                        <div class="form-group email">
                                                            <label for="email">Email</label>
                                                            <input type="email" value="<?= $profile->getProfile($_SESSION['user']->id)->profile_email; ?>" name="email" id="email" placeholder="Email" autocomplete="off" required>
                                                            <div data-validation="email"></div>
                                                        </div>
                                                        <!-- Password -->

                                                        <!-- Confirm Password -->

                                                    </div>
                                                    <div class="steps">
                                                        <div class="form-add">
                                                            <!-- House # -->
                                                            <div class="form-group house_no">
                                                                <label for="house_no">House #</label>
                                                                <input type="text" value="<?= $profile->getProfile($_SESSION['user']->id)->profile_house; ?>" name="house_no" id="house_no" placeholder="House #" autocomplete="off" required>
                                                                <div data-validation="house_no"></div>
                                                            </div>
                                                            <!-- Street Name -->
                                                            <div class="form-group street_name">
                                                                <label for="street_name">Street Name</label>
                                                                <input type="text" value="<?= $profile->getProfile($_SESSION['user']->id)->profile_street; ?>" name="street_name" id="street_name" placeholder="Street Name" autocomplete="off" required>
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
                                                                <input type="text" value="<?= $profile->getProfile($_SESSION['user']->id)->profile_barangay; ?>" name="barangay" id="barangay" placeholder="Barangay" autocomplete="off" required>
                                                                <div data-validation="barangay"></div>
                                                            </div>
                                                            <!-- Zip Code -->
                                                            <div class="form-group zip">
                                                                <label for="zip">Zip Code</label>
                                                                <input type="text" value="<?= $profile->getProfile($_SESSION['user']->id)->profile_zipcode; ?>" name="zip" id="zip" placeholder="Zip Code" autocomplete="off" required>
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
                        </div>
                    </div>
                    <!-- Change Pass modal -->
                    <div id="authentication-add" class="modal-change-pass">
                        <div class="modal-container">
                            <!-- Modal content -->
                            <div class="">
                                <div class="modal-content">
                                    <div class="modal-title">
                                        <p class="">Change Password</p>
                                        <button><i class='bx bx-x'></i></button>
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
                    <div class="modal-logout fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-title">
                                    <p class="">Are You Ready? </p>
                                    <i class='bx bx-x'></i>
                                </div>
                                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                                <div class="modal-footer">
                                    <button class="btn-cancel" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn-logout" href="#">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </section>
    <!-- Script Table -->
    <script src="/assets/js/user/main.js"></script>
</body>

</html>
