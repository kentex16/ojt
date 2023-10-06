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
  <title>Team Member</title>
  <link rel="shortcut icon" href="/assets/img/taskmav-logo.png" type="image/x-icon">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="/assets/css/user/team.css?v=<?php echo time(); ?>">
  <style>
    /* Style The Dropdown Button */
    .dropbtn {
      background-color: cornflowerblue;
      color: white;
      padding: 16px;
      font-size: 16px;
      border-radius: 5px;
      border: 1px solid #aaa;
      cursor: pointer;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
      position: relative;
      display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {
      background-color: #f1f1f1
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
      display: block;
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn {
      background-color: whitesmoke;
      color: black;

    }

    /*assign full width inputs*/
    input[type=text],
    input[type=password] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    /*set a style for the buttons*/
    button {
      padding: 10px 18px;
      border: none;
      outline: none;
      color: #fff;
      border-radius: 5px;
      background-color: #4070f4;
      transition: all 0.3s linear;
      cursor: pointer;
      width: auto;
    }

    ::placeholder {
      color: #ccc;
    }

    .fa {
      margin-right: 10px;
    }

    .eye {
      position: absolute;
    }

    #hide {
      display: none;
    }

    /* set a hover effect for the button*/
    button:hover {
      opacity: 0.8;
    }

    /*set extra style for the cancel button*/
    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: #f44336;
    }

    /*centre the display image inside the container*/
    .imgcontainer {
      text-align: center;
      margin: 20px 0 10px 0;
      position: relative;
    }

    /*set image properties*/
    img.avatar {
      width: 60%;
      border-radius: 50%;
    }

    /*set padding to the container*/
    .container {
      padding: 16px;
    }

    /*set the forgot password text*/
    span.psw {
      float: right;
      padding-top: 16px;
    }

    /*set the Modal background*/
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0, 0, 0);
      background-color: rgba(0, 0, 0, 0.4);
      padding-top: 60px;
    }

    /*style the model content box*/
    .modal-content {
      background-color: #fefefe;
      margin: 5% auto 15% auto;
      border: 1px solid #888;
      width: 50%;
    }

    /*style the close button*/
    .close {
      position: absolute;
      right: 25px;
      top: 0;
      color: #000;
      font-size: 35px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: red;
      cursor: pointer;
    }

    /* add zoom animation*/
    .animate {
      -webkit-animation: animatezoom 0.6s;
      animation: animatezoom 0.6s
    }

    .head-slide {
      padding: 0 20px;
    }

    @-webkit-keyframes animatezoom {
      from {
        -webkit-transform: scale(0)
      }

      to {
        -webkit-transform: scale(1)
      }
    }

    @keyframes animatezoom {
      from {
        transform: scale(0)
      }

      to {
        transform: scale(1)
      }
    }

    @media screen and (max-width: 300px) {
      span.psw {
        display: block;
        float: none;
      }

      .cancelbtn {
        width: 100%;
      }
    }
  </style>

</head>

<body>
  <section class="dashboard">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/public/include/sidebar.php'; ?>
    <main class="main">
      <div class="container-fluid">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/public/include/topbar.php'; ?>
        <div class="container">
          <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Add Member</button>
          <div id="id01" class="modal">

            <form class="modal-content animate" action="/action_page.php">

              <p class="">Add User</p>

              <div class="container">
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
                      <label for="middlename">Middle Name</label>
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
                      <label for="team">Team</label>
                      <select name="team" id="team">
                        <option value="">Team List</option>
                        <option value="1">Team 1</option>
                        <option value="2">Team 2</option>
                      </select>
                    </div>
                    <!-- Confirm Password -->
                    <div class="form-group confirm_password">
                      <label for="leader">Leader</label>
                      <select name="leader" id="leader">
                        <option value="">Select Gender</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
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
                      <input type="text" name="city" id="city" placeholder="City" autocomplete="off" required>
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
                      <input type="text" name="country" id="country" placeholder="Country" autocomplete="off" required>
                      <div data-validation="country"></div>
                    </div>
                  </div>
                </div>

                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="submitbtn">Sumbit</button>

            </form>
          </div>
        </div>

        <input type="radio" name="dot" id="one">
        <input type="radio" name="dot" id="two">
        <div class="main-card">
          <div class="cards">
            <?php foreach ($user->getAllUser() as $key => $data) : ?>
              <?php if ($userDetails->team_id == $data->team_id) : ?>
                <div class="card">
                  <div class="content">
                    <div class="img">
                      <img src="<?= $user->getUserPicture($data->id); ?>" alt="">
                    </div>
                    <div class="details">
                      <div class="name"><?= $profile->getProfile($data->id)->profile_fname . " " . $profile->getProfile($data->id)->profile_lname; ?></div>
                      <div class="job"><?= $stringUtils->getUserType($user->getUser($data->id)->user_usertype); ?></div>
                    </div>
                    <div class="dropdown">
                      <button class="dropbtn">Assign Task</button>
                      <div class="dropdown-content">
                        <a href="#">Multimedia</a>
                        <a href="#">Front-end</a>
                        <a href="#">Back-end</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="button">
          <label for="one" class=" active one"></label>
          <label for="two" class="two"></label>
        </div>
      </div>

      </div>
    </main>
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

  <!-- Custom JavaScript -->
  <script src="/assets/js/user/main.js"></script>
</body>

</html>
