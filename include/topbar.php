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
                            <a href="<?= ($_SESSION['user']->user_usertype == 1 ? "/account/admin/profile" : ($_SESSION['user']->user_usertype == 3 ? "/account/member/profile" : "#")); ?>" class="profile-item-list">Profile</a>
                        </li>
                    </ul>
                    <div class="logout">
                        <a href="#" class="logout">Sign out</a>

                    </div>
                </div>

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
