<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/Core.php';

if (empty($_SESSION['user']) || $_SESSION['user'] == null) {
    header("Location: /?error=1");
}

$userCount = 0;
$activeCount = 0;
$dptCount = 0;
$teamCount = 0;

if (empty($_SESSION['user']) || $_SESSION['user'] == null) {
    header("Location: /?error=1");
}

foreach ($user->getAllUser() as $key) {
    $userCount++;
}

foreach ($user->getAllUser() as $key) {
    $activeCount++;
}

foreach ($department->getAllDepartment() as $key) {
    $dptCount++;
}

foreach ($team->getAllTeam() as $key) {
    $teamCount++;
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
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/public/include/sidebar.php'; ?>
        <main class="main">
            <div class="container">
                <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/public/include/topbar.php'; ?>
                <section class="content">
                    <div class="page-title dash">Dashboard</div>
                    <div class="cards" id="dashboard-card">
                        <div class="dashboard-card">
                            <div class="card-container">
                                <div class="cards-content">
                                    <div class="card-body">
                                        <div class="card-row">
                                            <div class="card-column">
                                                <div class="card-title">
                                                    Total Users</div>
                                                <div class="card-icon">
                                                    <div class="count"><?= $userCount; ?></div>
                                                    <i class='bx bxs-group'></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-container">
                            <div class="cards-content">
                                <div class="card-body">
                                    <div class="card-row">
                                        <div class="card-column">
                                            <div class="card-title">
                                                Active User</div>
                                            <div class="card-icon">
                                                <div class="count">Count</div>
                                                <i class='bx bx-globe'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-container">
                            <div class="cards-content">
                                <div class="card-body">
                                    <div class="card-row">
                                        <div class="card-column">
                                            <div class="card-title">Department
                                            </div>
                                            <div class="card-icon">
                                                <div class="count"><?= $dptCount; ?></div>
                                                <i class='bx bxs-user-badge'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-container">
                            <div class="cards-content">
                                <div class="card-body">
                                    <div class="card-row">
                                        <div class="card-column">
                                            <div class="card-title">Team</div>
                                            <div class="card-icon">
                                                <div class="count"><?= $teamCount; ?></div>
                                                <i class='bx bxs-book-add'></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project">
                        <div class="project-content">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="project-class">Projects</h6>
                                </div>
                                <div class="progress-body">
                                    <?php foreach ($project->getAllProject() as $key => $data) : ?>
                                        <div class="progress-container">
                                            <h4 class="project-name"><?= $data->project_title; ?>
                                                <small class="project-count">Tasks: <?= $task->getTaskCount($data->id)->TaskCount; ?></small>

                                                <span class="project-progress"><?php
                                                                                if (
                                                                                    $task->getTaskComplete($data->id, !empty($task->getTaskProject($data->id)->task_status))->TaskComplete != 0 &&
                                                                                    $task->getTaskCount($data->id)->TaskCount != 0
                                                                                ) {
                                                                                    echo $task->getTaskComplete($data->id, $task->getTaskProject($data->id)->task_status)->TaskComplete / $task->getTaskCount($data->id)->TaskCount * 100;
                                                                                } else {
                                                                                    echo "0";
                                                                                }
                                                                                ?>%</span>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: <?php
                                                                                                            if (
                                                                                                                $task->getTaskComplete($data->id, !empty($task->getTaskProject($data->id)->task_status))->TaskComplete != 0 &&
                                                                                                                $task->getTaskCount($data->id)->TaskCount != 0
                                                                                                            ) {
                                                                                                                echo ($task->getTaskComplete($data->id, $task->getTaskProject($data->id)->task_status)->TaskComplete / $task->getTaskCount($data->id)->TaskCount);
                                                                                                            } else {
                                                                                                                echo "0";
                                                                                                            }
                                                                                                            ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>

                        <div class="leaderboard">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="team-class">Top Teams</h6>
                                </div>
                                <div class="card-body">
                                    <div class="team-container">
                                        <div class="row-project">
                                            <div class="medals">
                                                <img src="/admin/img/default.jpg" alt="avatar" class="widget-image">
                                            </div>
                                            <div class="team-info">
                                                <h6 class="widget-content">
                                                    <strong class="dept">Team name</strong><br>
                                                    <small class="leads">LEADER: name</small>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
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

    <!-- Custom JavaScript -->
    <script src="/assets/js/main.js"></script>
</body>

</html>
