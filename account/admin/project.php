<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/Core.php';

if (empty($_SESSION['user']) || $_SESSION['user'] == null) {
    header("Location: /?error=1");
}

if (isset($_POST['btnSubmit'])) {
    $company_id = !empty($_SESSION['user']) ? $_SESSION['user']->company_id : 1;
    $department_id = !empty($_POST['department']) ? $_POST['department'] : 1;
    $team_id = !empty($_POST['team']) ? $_POST['team'] : 1;
    $title = !empty($_POST['project_name']) ? $_POST['project_name'] : "";
    $desc = !empty($_POST['project_desc']) ? $_POST['project_desc'] : "";
    $status = !empty($_POST['project_status']) ? $_POST['project_status'] : 1;
    $sdate = !empty($_POST['start_date']) ? $_POST['start_date'] : "";
    $edate = !empty($_POST['end_date']) ? $_POST['end_date'] : "";
    $progress = !empty($_POST['progress']) ? $_POST['progress'] : 0;

    $dateTime = new DateTime("now");

    if ($project->saveProject($company_id, $department_id, $team_id, $title, $desc, $status, $sdate, $edate, $progress)) {
        if ($notification->saveNotification($company_id, $department_id, $_SESSION['user']->id, "Added a new Project!", ($title . " " . $desc), $dateTime->format("Y-m-d"), 1)) {
            header("Location: /account/admin/project");
        }
    }
}


$userDetails = $user->getUser($_SESSION['user']->id);
$profileDetails = $profile->getProfile($_SESSION['user']->id);

// echo $_GET['id'];

if (isset($_POST["updateBtn"])) {
    $id = !empty($_POST['id']) ? $_POST['id'] : 0;
    // echo $id;

    //Testign of propject is truea
    $projectID = $project->getProject($id);
    if ($projectID = $id) {
        echo "<script>alert('Update')</script>";
    }
    // header("Location: /account/admin/project");

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project</title>
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
                            <p>Project List</p>
                            <button class="addmodal" id="addmodal">
                                <i class='bx bxs-folder-plus'></i>
                            </button>

                            <!-- Add modal -->
                            <div id="authentication-add" class="modal-add">
                                <div class="modal-container">
                                    <!-- Modal content -->
                                    <div class="">
                                        <div class="modal-content">
                                            <div class="modal-title">
                                                <p class="">Add Project</p>
                                                <button><i class='bx bx-x'></i></button>
                                            </div>
                                            <form action="" method="post" class="form" id="form">
                                                <div class="steps">
                                                    <div class="form-project">
                                                        <div class="form-group project_name">
                                                            <label for="project_name">Project Name</label>
                                                            <input type="text" name="project_name" id="project_name" placeholder="Project Name" autocomplete="off" required>
                                                            <div data-validation="project_name"></div>
                                                        </div>
                                                        <div class="form-group project_status">
                                                            <label for="project_status">Project_status</label>
                                                            <select name="project_status" id="project_status">
                                                                <option value="">Select Status</option>
                                                                <option value="">Pending</option>
                                                                <option value="">Ongoing</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group start_date">
                                                            <label for="start_date">Start date</label>
                                                            <input type="date" name="start_date" id="start_date" placeholder="Start date" autocomplete="off" required>
                                                            <div data-validation="start_date"></div>
                                                        </div>
                                                        <div class="form-group cNo">
                                                            <label for="end_date">End date</label>
                                                            <input type="date" name="end_date" id="end_date" placeholder="End date" autocomplete="off" required>
                                                            <div data-validation="end_date"></div>
                                                        </div>
                                                        <div class="form-group username">
                                                            <label for="leader">Leader</label>
                                                            <input type="text" name="leader" id="leader" placeholder="Leader" autocomplete="off" required>
                                                            <div data-validation="leader"></div>
                                                        </div>
                                                        <div class="form-group department">
                                                            <label for="department">Department</label>
                                                            <select name="department" id="department">
                                                                <option value="">Select Department</option>
                                                                <option value="">IT Department</option>
                                                                <option value="">CpE Department</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="steps">
                                                    <div class="form-add-project">
                                                        <div class="form-group house_no">
                                                            <label for="project_desc">Project Description</label>
                                                            <input type="text" name="project_desc" id="project_desc" placeholder="Project Description" autocomplete="off" required>
                                                            <div data-validation="project_desc"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn">
                                                    <button type="button" href="id" class="btn-prev" name="btn-prev">Cancel</button>
                                                    <button type="button" class="btn-sub" name="btnSubmit">Submit</button>
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
                                                <p class="">Update Project</p>
                                                <button><i class='bx bx-x'></i></button>
                                            </div>
                                            <form action="" method="post" class="form" id="form">
                                                <div class="steps">
                                                    <div class="form-project">
                                                        <div class="form-group project_name">

                                                            <label for="project_name">Project Name</label>
                                                            <input type="text" name="project_name" id="project_name" placeholder="Project Name" autocomplete="off" required>
                                                            <input type="text" name="id" class="updateId" value="" hidden />
                                                            <div data-validation="project_name"></div>
                                                        </div>
                                                        <div class="form-group project_status">
                                                            <label for="project_status">Project_status</label>
                                                            <select name="project_status" id="project_status">
                                                                <option value="">Select Status</option>
                                                                <option value="">Pending</option>
                                                                <option value="">Ongoing</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group start_date">
                                                            <label for="start_date">Start date</label>
                                                            <input type="date" name="start_date" id="start_date" placeholder="Start date" autocomplete="off" required>
                                                            <div data-validation="start_date"></div>
                                                        </div>
                                                        <div class="form-group cNo">
                                                            <label for="end_date">End date</label>
                                                            <input type="date" name="end_date" id="end_date" placeholder="End date" autocomplete="off" required>
                                                            <div data-validation="end_date"></div>
                                                        </div>
                                                        <div class="form-group username">
                                                            <label for="leader">Leader</label>
                                                            <input type="text" name="leader" id="leader" placeholder="Leader" autocomplete="off" required>
                                                            <div data-validation="leader"></div>
                                                        </div>
                                                        <div class="form-group department">
                                                            <label for="department">Department</label>
                                                            <select name="department" id="department">
                                                                <option value="">Select Department</option>
                                                                <option value="">IT Department</option>
                                                                <option value="">CpE Department</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="steps">
                                                    <div class="form-add-project">
                                                        <div class="form-group house_no">
                                                            <label for="project_desc">Project Description</label>
                                                            <input type="text" name="project_desc" id="project_desc" placeholder="Project Description" autocomplete="off" required>
                                                            <div data-validation="project_desc"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="btn">
                                                    <button class="btn-prev" name="btn-prev">Cancel</button>
                                                    <button class="btn-sub" name="updateBtn">Submit</button>
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
                        <table id="project" class="" style="width:100%">
                            <thead class="head">
                                <tr class="tr">
                                    <th class="th">Project name</th>
                                    <th class="th">Start Date</th>
                                    <th class="th">End Date</th>
                                    <th class="th">Status</th>
                                    <th class="th">Department</th>
                                    <th class="th">Leader</th>
                                    <th class="th">Action</th>
                                </tr>
                            </thead>
                            <tbody class="body">
                                <?php foreach ($project->getAllProject() as $key => $data) : ?>
                                    <tr class="tr">
                                        <td class="td"><?= $data->project_title; ?></td>
                                        <td class="td"><?= $data->project_sdate; ?></td>
                                        <td class="td"><?= $data->project_edate; ?></td>
                                        <td class="td"><?= $stringUtils->getProjectStatus($data->project_status); ?></td>
                                        <td class="td"><?= $team->getTeam($data->team_id)->team_name; ?></td>
                                        <td class="td"><?= $profile->getProfile($team->getTeam($data->team_id)->user_id)->profile_fname . " " . $profile->getProfile($team->getTeam($data->team_id)->user_id)->profile_lname; ?></td>
                                        <td class="td icons">
                                            <button class="bx bxs-edit-alt" data-id="<?= $data->id; ?>"></button>
                                            <a type="button" href="#"><i id="delete" class='bx bx-trash'></i></a>
                                            <a href="/account/admin/task?id=<?= $data->id; ?>"><i id="view" class='bx bxs-show'></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                            <script>
                                document.querySelectorAll('.bx.bxs-edit-alt').forEach(update => {
                                    update.addEventListener('click', function() {
                                        document.getElementById("authentication-update").classList.toggle("show")

                                        const updateId = document.querySelector('.updateId')
                                        updateId.value = update.dataset.id
                                        console.log(updateId.value = update.dataset.id)


                                        if (
                                            document.getElementById("authentication-update").classList.contains("show")
                                        ) {

                                            document.querySelectorAll(".bx.bx-x").forEach(function(element) {
                                                element.addEventListener("click", function() {
                                                    document
                                                        .getElementById("authentication-update")
                                                        .classList.remove("show")
                                                })
                                            })
                                        }
                                        document.querySelectorAll(".btn-prev").forEach(function(element) {
                                            element.addEventListener("click", function() {
                                                document.getElementById("authentication-update").classList.remove("show")
                                            })
                                        })
                                    })
                                })
                            </script>
                        </table>

                    </div>
                    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/public/include/logoutModal.php'; ?>
                </section>
            </div>
        </main>
    </section>
    <!-- Script Table -->
    <script src="/assets/js/table.js"></script>
    <script src="/assets/js/main.js"></script>
</body>

</html>
