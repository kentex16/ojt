<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/Core.php';

if (empty($_SESSION['user']) || $_SESSION['user'] == null) {
    header("Location: /?error=1");
}

$userDetails = $user->getUser($_SESSION['user']->id);
$profileDetails = $profile->getProfile($_SESSION['user']->id);
$projectDetails = $project->getProject($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Project</title>
    <link rel="shortcut icon" href="/assets/img/taskmav-logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/assets/css/user/project.css">
</head>

<body>
    <section class="dashboard">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/public/include/sidebar.php'; ?>
        <main class="main">
            <div class="container">
                <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/public/include/topbar.php'; ?>
                <section class="content">

                    <div class="heading">
                        <a href="project-list.html" class="back"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAALNJREFUSEvllNENgzAMBY8N2ISO0I7AJKzQbsQGdATYhBGQJaisKISYmI8KvqM7P9u44uKvupjPfQQ10AEfa0tzWiTwAXisgrdFciTQ8Al4ArOXoBguhewlcIHvCdzgMYErPBRouGWOsbe/1usZiOALNKV0PdtwyFoyAi/rWobFxbbIVZJa061dRUlSf7JLkpxTUZTkSCAz00laoLdsWY5gk8ihM8FTt8hSZPJtboLTwv8XLAoZJhna+F7zAAAAAElFTkSuQmCC" />
                        </a>
                        View Project
                    </div>
                    <div class="line">
                        <hr>
                    </div>
                    <div class="project">
                        <div class="line-1"><?= $projectDetails->project_title; ?></div>
                        <div class="line-2">Project IT 28</div>
                        <div class="line-3">Description</div>
                        <div class="line-4"><?= $projectDetails->project_description; ?></div>
                        <div class="line-5">Start Date</div>
                        <div class="line-6"><?= $projectDetails->project_sdate; ?></div>
                        <div class="line-7">End Date</div>
                        <div class="line-8"><?= $projectDetails->project_edate; ?></div>
                        <div class="line-9">Status</div>
                        <div class="line-10"><?= $stringUtils->getProjectStatus($projectDetails->project_status); ?></div>
                    </div>
                    <div class="task">
                        <div class="task-1">Tasks
                            <button id="mymodal" class="btn-outline-primary" data-toggle="modal" data-target="#addTaskModal" onclick="addTask()">
                                <i class="icon"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAFZJREFUSEtjZKAxYKSx+QyjFhAMYVKD6D/URKL1Ea0QavCoBQTjbOgEEcylBL2EpgAj0eBKRTS3AJfLh04cjPoAHgKDriwiNV+M1miEQ4zUSCZsIpoKAFy0DhnDOA3uAAAAAElFTkSuQmCC" />
                                </i>
                            </button>
                        </div>
                        <?php foreach ($task->getAllTask() as $key => $data) : ?>
                            <?php if ($data->project_id == $_GET['id'] && $data->task_status != 3) : ?>
                                <div class="sample-2">
                                    <ul>
                                        <a href="/account/member/submit?id=<?= $data->id; ?>">
                                            <li> <?= $data->task_name; ?> </li>
                                        </a>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <!-- Modal -->
                    <div id="modal" class="modal-content">
                        <h4 class="modal-header">Add Task</h4>
                        <button class="close" onclick="close">
                            <i class="icon"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAMNJREFUSEvtlN0NgkAQhD86sBMsQTuQSrUDLUE7sQQziSQn7h8mF1/gDbLMtzs7dwOdn6GzPhsgdfjvFp2AG/B0Wt0BB+DijRJNIPEzcAeOBkTiV2APTB4kAkhA3Y8GpBV/vKcwp8x2YEHkxtx5KK7CDKCaJUTfZEsqXgUsIXovia8FzLboP2/xX2GqWtR6LhFr8WZSM4CVFgl56Vo1QRTFKMIfkMpB8xbaQn46aOqk61WR3pSVgmzJFY2wZgOkFna36AUMCDQZmJpqFgAAAABJRU5ErkJggg==" />
                            </i>
                        </button>
                        <div class="line-modal">
                            <hr>
                        </div>
                        <div class="add-task-details">
                            <div class="add-task">
                                <form>
                                    <span class="name">Task</span>
                                    <input name="name" type="text" class="feedback-input" placeholder="Project Sample 1" readonly />
                                    <span class="name">Status</span>
                                    <select type="text" class="input" placeholder="Select Status" required>
                                        <option value selected disabled>Select Status</option>
                                        <option value="Pending" selected>Pending</option>
                                        <option value="Ongoing">Ongoing</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Close">Close</option>
                                    </select>
                                    <span class="name">Task</span>
                                    <input name="name" type="text" class="input" placeholder="Input Task" />
                                    <span class="name">Task</span>
                                    <input name="name" type="text" class="feedback-input" placeholder="Project IT 28" readonly />
                                    <span class="name">Assign Members</span>
                                    <select type="text" class="input-member" placeholder="Nothing Selected" required>
                                        <option value selected disabled>Nothing Selected</option>
                                    </select>
                                </form>
                                <div class="line-task">
                                    <hr>
                                </div>
                                <div class="text-description">
                                    <span class="name">DESCRIPTION</span>
                                    <textarea name="text" class="description" placeholder=""></textarea>
                                </div>
                                <button class="cancelbtn" onclick="">Cancel</button>
                                <button class="addbtn" onclick="">Add</button>

                            </div>
                        </div>
                </section>
            </div>

        </main>
    </section>

    <!-- Custom JavaScript -->
    <script src="/assets/js/user/main.js"></script>
    <script>
        var modal = document.getElementById("modal");
        var btn = document.getElementById("mymodal");
        var span = document.getElementsByClassName("close")[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>
