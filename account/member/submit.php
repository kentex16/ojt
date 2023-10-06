<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/Core.php';

if (empty($_SESSION['user']) || $_SESSION['user'] == null) {
    header("Location: /?error=1");
}

if (isset($_POST['fileUpload'])) {
    $team_id = $task->getTask($_GET['id'])->team_id;
    $project_id = $task->getTask($_GET['id'])->project_id;
    $name = !empty($_POST['name']) ? $_POST['name'] : "";
    $desc = !empty($_POST['text']) ? $_POST['text'] : "";

    $file->saveFile($team_id, $project_id, $name, $desc, $_FILES['file']);
    $task->updateTaskStatus($_GET['id'], 3);
    header("Location: /account/member/project");
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
    <link rel="shortcut icon" href="../admin/img/taskmav-logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/assets/css/user/main.css">
</head>

<body>
    <section class="dashboard">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/public/include/sidebar.php'; ?>
        <main class="main">
            <div class="container">
                <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/public/include/topbar.php'; ?>
                <section class="">
                    <div class="submit-task">

                        <div class="sumbit">
                            <div class="task">
                                Submit Task
                            </div>
                        </div>
                        <div class="drag-updload">
                            <div class="drag">
                                <div class="drop">
                                    <div class="icon">
                                        <i class='bx bxl-dropbox'></i>
                                    </div>
                                    <span class="text">
                                        Drag & Drop to Upload File
                                    </span>
                                    <div class="or-con">
                                        <span class="line"></span>
                                        <span class="or">OR</span>
                                        <span class="line"></span>
                                    </div>
                                    <form method="POST" enctype="multipart/form-data">
                                        <label for="file-upload">Choose File</label>
                                        <input type="file" name="file[]" id="file-upload" class="file-input" />
                                </div>
                                <div class="progresss"></div>
                            </div>
                            <div class="upload">
                                <div class="taskname">
                                    TASK NAME
                                    <input name="name" type="text" class="feedback-input" placeholder="<?= $task->getTask($_GET['id'])->task_name; ?>" />
                                    DESCRIPTION
                                    <textarea name="text" class="feedback-input" placeholder="<?= $task->getTask($_GET['id'])->task_description; ?>"></textarea>
                                    <input type="submit" name="fileUpload" value="SUBMIT" />
                                    </form>
                                </div>
                            </div>
                        </div>
                        <img src="https://media.discordapp.net/attachments/980415314217033769/988803288344457217/bg_img.png?width=758&height=427" alt="" style="opacity: 0;">


                    </div>
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
        </main>
    </section>

    <!-- Custom JavaScript -->
    <script src="/assets/js/user/main.js"></script>
</body>

</html>
