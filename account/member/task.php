<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/Core.php';

if (empty($_SESSION['user']) || $_SESSION['user'] == null) {
    header("Location: /?error=1");
}

$userDetails = $user->getUser($_SESSION['user']->id);
$profileDetails = $profile->getProfile($_SESSION['user']->id);

if (isset($_POST['addTaskBtn'])) {
    if ($task->updateTaskStatus($_POST['taskId'], 2)) {
        return header("Location: /account/member/submit?id=" . $_POST['taskId']);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="../admin/img/taskmav-logo.png" type="image/x-icon">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css'>
    <link rel="stylesheet" href="/assets/css/user/main.css">
</head>

<body>
    <section class="dashboard">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/public/include/sidebar.php'; ?>
        <main class="main">
            <div class="container">
                <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/public/include/topbar.php'; ?>
                <section class="">
                    <div class="todo">
                        <p>Todo List</p>

                        <div class="containerss">
                            <div class="pending">
                                <h1>Pending</h1>
                                <div class="p_tasks">
                                    <ul>
                                        <?php foreach ($task->getAllTask() as $key => $data) : ?>
                                            <?php if ($data->task_status == 1 && $data->team_id == $userDetails->team_id) : ?>
                                                <form method="POST">
                                                    <input type="hidden" name="taskId" value="<?= $data->id; ?>" />
                                                    <li><button type="submit" name="addTaskBtn"><?= $data->task_name; ?></button></li>
                                                </form>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="ongoing">
                            <h2>On-going</h2>
                            <div class="o_tasks">
                                <ul>
                                    <?php foreach ($task->getAllTask() as $key => $data) : ?>
                                        <?php if ($data->task_status != 1 && $data->task_status != 3 && $data->team_id == $userDetails->team_id) : ?>
                                            <li><a href="/account/member/submit?id=<?= $data->id; ?>"><?= $data->task_name; ?></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <div class="completed">
                            <h3>Completed</h3>
                            <div class="p_tasks">
                                <ul>
                                    <?php foreach ($task->getAllTask() as $key => $data) : ?>
                                        <?php if ($data->task_status == 3 && $data->team_id == $userDetails->team_id) : ?>
                                            <li><a href="#<?= $data->id; ?>"><?= $data->task_name; ?></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
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
