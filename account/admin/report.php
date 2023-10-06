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
    <title>Report</title>
    <link rel="shortcut icon" href="/assets/img/taskmav-logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
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
                        <div class="page-title">Report</div>
                        <table id="report" class="display" style="width:100%">
                            <thead class="head">
                                <tr class="tr">
                                    <th class="th">Count</th>
                                    <th class="th">Name</th>
                                    <th class="th">Team</th>
                                    <th class="th">Progres</th>
                                    <th class="th">Status</th>
                                    <th class="th">Remaining Task</th>
                                    <th class="th">Completed Task</th>
                                    <th class="th">Department</th>
                                    <th class="th">Leader</th>
                                </tr>
                            </thead>
                            <tbody class="body">
                                <?php foreach ($project->getAllProject() as $key => $data) : ?>
                                    <tr class="tr">
                                        <td class="td"><?= $data->id; ?></td>
                                        <td class="td"><?= $data->project_title; ?></td>
                                        <td class="td"><?= $team->getTeam($data->team_id)->team_name; ?></td>
                                        <td class="td">61%</td>
                                        <td class="td"><?= $stringUtils->getProjectStatus($data->project_status); ?></td>
                                        <td class="td">4</td>
                                        <td class="td">5</td>
                                        <td class="td"><?= $department->getDepartment($data->department_id)->department_name; ?></td>
                                        <td class="td">Enrico Casiple</td>
                                    </tr>
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
