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
    <title>Dashboard</title>
    <link rel="shortcut icon" href="/assets/img/taskmav-logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/assets/css/user/main.css">
</head>
<style>
    .reminder {
        position: relative;
        width: 40%;
        height: 100%;
        border: 1px solid lightblue;
        float: right;
        background-color: var(--primary-color);
        box-shadow: 0px 3px 5px #b0b0f1;
        border-radius: 5px;
    }

    .popup {
        padding-block: 20px;
        margin: 0px 25px;
        display: flex;
        overflow: hidden;
        scroll-behavior: smooth;
    }

    .reminder-card {
        position: relative;
        border: 2px solid lightblue;
        height: 27vh;
        min-width: 25vh;
        margin-right: 15px;
        box-shadow: 0px 2px 2px #b0b0f1;
    }

    .reminder-card:hover {
        transform: translateY(-5px);
        transition: 0.2s ease;
    }

    .reminder-card img {
        margin-top: -20px;
        margin-left: 30%;
        width: 45%;
        height: 45%;
    }

    .reminder-card button {
        display: block;
        margin: 0 0 0 auto;
        font-size: 20px;
        border: none;
        background-color: transparent;
        color: transparent;
    }

    .details {
        position: relative;
        text-align: center;
        margin-top: -2px;
        margin-left: 5px;
        font-size: small;
        height: 60%;

    }

    .reminder-title {
        color: rgba(14, 44, 83, 0.904);
        font-size: large;
        font-weight: bold;
    }

    .details .about {
        font-size: 11px;
        color: rgba(45, 45, 68, 0.836);

    }

    .details .date {
        margin-top: 10px;
        font-size: smaller;
        color: rgb(116, 114, 114);
    }

    .details .time {
        font-weight: bold;
        color: rgba(0, 0, 0, 0.781);
        background-color: #66ccff1c;
    }

    .pre-btn,
    .nxt-btn {
        border: none;
        width: 20px;
        height: 50%;
        position: absolute;
        margin-top: 15px;
        justify-content: center;
        align-items: center;
        background: linear-gradient(90deg, rgba(211, 66, 66, 0) 0%, rgb(247, 247, 247) 100%);
        cursor: pointer;
        z-index: 8;
        color: rgb(32, 70, 71);
    }

    .pre-btn {
        left: 0;
    }

    .nxt-btn {
        right: 0;
    }
</style>

<body>
    <section class="dashboard">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/public/include/sidebar.php'; ?>
        <main class="main">
            <div class="container">
                <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/public/include/topbar.php'; ?>
                <section class="">
                    <div class="content">
                        <div class="header">
                            <div class="greetings">Welcome, Juan Dela Cruz </div>
                            <a class="genreport" href=""><button>
                                    <i class='bx bxs-download'></i>
                                    Generate Report
                                </button>
                            </a>
                        </div>
                        <div class="containers">
                            <!--task table grid-->
                            <div class="tasks">
                                <div class="label"> My Tasks</div>
                                <div class="table_content">
                                    <table>
                                        <tr id="tbheader">
                                            <th>To Do</th>
                                            <th>Completed</th>
                                        </tr>
                                        <?php foreach ($task->getAllTask() as $key => $data) : ?>
                                            <?php if ($data->team_id == $userDetails->team_id) : ?>
                                                <tr id="tbheader">
                                                    <td><?= $data->task_name; ?></td>
                                                    <td><?= $stringUtils->getProjectStatus($data->task_status); ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>

                            <!--2nd Grid in Content-->
                            <div class="proj_act">
                                <div class="projects">
                                    <div class="label2">Projects</div>

                                    <div class="progress_list">
                                        <?php foreach ($project->getAllProject() as $key => $data) : ?>
                                            <?php if ($data->team_id == $_SESSION['user']->team_id) : ?>
                                                <p><?= $data->project_title; ?></p>
                                                <div class="bar_container">
                                                    <div class="ps1 progress">25%</div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>

                                    </div>
                                </div>

                                <div class="reminder">
                                    <div class="label3"> Daily Reminder </div>
                                    <div class="popup">
                                        <button class="pre-btn"><i class='bx bxs-chevron-left'></i></i></button>
                                        <button class="nxt-btn"><i class='bx bxs-chevron-right'></i></button>

                                        <div class="reminder-card">
                                            <button id="close">&times;</button>
                                            <!--Hidden-->
                                            <img src="img/people.gif"></img>
                                            <div class="details">
                                                <div class="reminder-title"> Team Meeting </div>
                                                <p class="about"> Progress report with the team handler</p>
                                                <p class="date"> 07/05/22
                                                <p class="time">
                                                    1:00 PM - 3:00 PM
                                                </p>
                                            </div>
                                        </div>

                                        <div class="reminder-card">
                                            <button id="close">&times;</button>
                                            <img src="img/task.gif"></img>
                                            <div class="details">
                                                <div class="reminder-title"> DEADLINE </div>
                                                <p class="about"> Task Sample 2</p>
                                                <p class="date"> 07/05/22
                                                <p class="time">
                                                    5:00 PM
                                                </p>
                                            </div>
                                        </div>

                                        <div class="reminder-card">
                                            <button id="close">&times;</button>
                                            <img src="img/folder.gif"></img>
                                            <div class="details">
                                                <div class="reminder-title"> DEADLINE </div>
                                                <p class="about"> PROJECT LOKI</p>
                                                <p class="date"> 07/05/22
                                                <p class="time">
                                                    1:00 PM
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                document.querySelector("#close").addEventListener("click", function() {
                                    document.querySelector(".popup").style.display = "none";
                                });

                                window.addEventListener("load", function() {
                                    setTimeout(
                                        function open(event) {
                                            document.querySelector(".popup").style
                                            display = "block";
                                        }, 1000
                                    )
                                });
                                /*Slider*/
                                const productContainers = [...document.querySelectorAll('.popup')];
                                const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
                                const preBtn = [...document.querySelectorAll('.pre-btn')];

                                productContainers.forEach((item, i) => {
                                    let containerDimensions = item.getBoundingClientRect();
                                    let containerWidth = containerDimensions.width;

                                    nxtBtn[i].addEventListener('click', () => {
                                        item.scrollLeft += containerWidth;
                                    })

                                    preBtn[i].addEventListener('click', () => {
                                        item.scrollLeft -= containerWidth;
                                    })
                                })
                            </script>
                        </div>
                    </div>
                    <div class="footer"></div>
            </div>
    </section>
    </div>
    </main>
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
    </section>

    <!-- Custom JavaScript -->
    <script src="/assets/js/user/main.js"></script>
</body>

</html>
