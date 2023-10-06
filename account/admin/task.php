<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/Core.php';

if (empty($_SESSION['user']) || $_SESSION['user'] == null) {
    header("Location: /?error=1");
}

$projectDetails = $project->getProject($_GET['id']);
$userDetails = $user->getUser($_SESSION['user']->id);
$profileDetails = $profile->getProfile($_SESSION['user']->id);

if (isset($_POST['btnSubmit'])) {
    $team_id = $projectDetails->team_id;
    $project_id = $_GET['id'];
    $name = $_POST['task_name'];
    $desc = $_POST['task_desc'];
    $status = $_POST['status'];

    if ($task->saveTask($team_id, $project_id, $name, $desc, $status)) {
        return header("Location: /account/admin/task?id=" . $_GET['id']);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
    <link rel="shortcut icon" href="/assets/img/taskmav-logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" />
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
                    <div class="table-container">
                        <div class="page-title project">
                            <p>Tasks</p>
                            <button class="addmodal" id="addmodal">
                                <i class='bx bxs-folder-plus'></i>
                            </button>

                            <div id="authentication-add" class="modal-add">
                                <div class="modal-container">
                                    <div class="">
                                        <div class="modal-content">
                                            <div class="modal-title">
                                                <p class="">Add Task</p>
                                                <button><i class='bx bx-x'></i></button>
                                            </div>
                                            <form action="" method="post" class="form" id="form">
                                                <div class="steps">
                                                    <div class="form-project">
                                                        <div class="form-group task_name">
                                                            <label for="task_name">Tasks Name</label>
                                                            <input type="text" name="task_name" id="task_name" placeholder="Tasks Name" autocomplete="off" required>
                                                            <div data-validation="task_name"></div>
                                                        </div>
                                                        <div class="form-group username">
                                                            <label for="status">Status</label>
                                                            <select name="status" id="status">
                                                                <option value="">Select</option>
                                                                <option value="">Pending</option>
                                                            </select>
                                                            <div data-validation="leader"></div>
                                                        </div>
                                                        <div class="form-group username">
                                                            <label for="member">Assign Memeber</label>
                                                            <select name="member" id="member">
                                                                <option value="">Select name</option>
                                                                <option value="">Joshua Neo</option>
                                                            </select>
                                                            <div data-validation="leader"></div>
                                                        </div>
                                                        <div class="form-group department">
                                                            <label for="team">Team</label>
                                                            <select name="team" id="team">
                                                                <option value="">Value config for the id of project</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="steps">
                                                    <div class="form-add-project">
                                                        <div class="form-group house_no">
                                                            <label for="task_desc">Tasks Description</label>
                                                            <input type="text" name="task_desc" id="task_desc" placeholder="Tasks Description" autocomplete="off" required>
                                                            <div data-validation="task_desc"></div>
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
                            <!-- Update modal -->
                            <div id="authentication-update" class="modal-update">
                                <div class="modal-container">
                                    <!-- Modal content -->
                                    <div class="">
                                        <div class="modal-content">
                                            <div class="modal-title">
                                                <p class="">Update Task</p>
                                                <button><i class='bx bx-x'></i></button>
                                            </div>
                                            <form action="" method="post" class="form" id="form">
                                                <div class="steps">
                                                    <div class="form-project">
                                                        <div class="form-group task_name">
                                                            <label for="task_name">Tasks Name</label>
                                                            <input type="text" name="task_name" id="task_name" placeholder="Tasks Name" autocomplete="off" required>
                                                            <div data-validation="task_name"></div>
                                                        </div>
                                                        <div class="form-group username">
                                                            <label for="status">Status</label>
                                                            <select name="status" id="status">
                                                                <option value="">Select</option>
                                                                <option value="">Pending</option>
                                                            </select>
                                                            <div data-validation="leader"></div>
                                                        </div>
                                                        <div class="form-group username">
                                                            <label for="member">Assign Memeber</label>
                                                            <select name="member" id="member">
                                                                <option value="">Select name</option>
                                                                <option value="">Joshua Neo</option>
                                                            </select>
                                                            <div data-validation="leader"></div>
                                                        </div>
                                                        <div class="form-group department">
                                                            <label for="team">Team</label>
                                                            <select name="team" id="team">
                                                                <option value="Team 1"></option>
                                                                <option value="">Task Monitoring System</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="steps">
                                                    <div class="form-add-project">
                                                        <div class="form-group house_no">
                                                            <label for="task_desc">Tasks Description</label>
                                                            <input type="text" name="task_desc" id="task_desc" placeholder="Tasks Description" autocomplete="off" required>
                                                            <div data-validation="task_desc"></div>
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
                        <div class="project_info">
                            <div class="project_info_title">
                                <p class="">Project Name: </p>
                                <span><?= $projectDetails->project_title; ?></span>
                            </div>
                            <div class="project_info_title">
                                <p class="">Status: </p>
                                <span><?= $stringUtils->getProjectStatus($projectDetails->project_status); ?></span>
                            </div>
                            <div class="project_info_title">
                                <p class="">Start Date: </p>
                                <span><?= $projectDetails->project_sdate; ?></span>
                            </div>
                            <div class="project_info_title">
                                <p class="">End Date: </p>
                                <span><?= $projectDetails->project_edate; ?></span>
                            </div>
                            <div class="project_info_title">
                                <p class="">Project Description: </p>
                                <span><?= $projectDetails->project_description; ?></span>
                            </div>
                        </div>
                        <table id="project" class="" style="width:100%">
                            <thead class="head">
                                <tr class="tr">
                                    <th class="th">Task name</th>
                                    <th class="th">Task Description</th>
                                    <th class="th">Status</th>
                                    <th class="th">Action</th>
                                </tr>
                            </thead>
                            <tbody class="body">
                                <?php foreach ($task->getAllTask() as $key => $data) : ?>
                                    <?php if ($data->project_id == $projectDetails->id) : ?>
                                        <tr class="tr">
                                            <td class="td"><?= $data->task_name; ?></td>
                                            <td class="td"><?= $data->task_description; ?></td>
                                            <td class="td"><?= $stringUtils->getProjectStatus($data->task_status); ?></td>
                                            <td class="td icons">
                                                <button><i id="update" class='bx bxs-edit-alt'></i></button>
                                                <button><button><i id="delete" class='bx bx-trash'></i></button></button>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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
                </section>
            </div>
        </main>
    </section>
    <!-- Script Table -->
    <script src="/assets/js/table.js"></script>
    <script src="/assets/js/main.js"></script>
</body>

</html>
