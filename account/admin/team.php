<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/Core.php';

if (empty($_SESSION['user']) || $_SESSION['user'] == null) {
    header("Location: /?error=1");
}

if (isset($_POST['btnSubmit'])) {
    $company_id = $_SESSION['user']->company_id;
    $department_id = $_SESSION['user']->department_id;
    $user_id = 0;
    $name = $_POST['team_name'];
    $currentsize = 0;
    $maxsize = 25;

    $team->saveTeam($company_id, $department_id, $user_id, $name, $currentsize, $maxsize);
}

$userDetails = $user->getUser($_SESSION['user']->id);
$profileDetails = $profile->getProfile($_SESSION['user']->id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Teams</title>
    <link rel="shortcut icon" href="/assets/img/taskmav-logo.png" type="image/x-icon">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/team.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/public/include/sidebar.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/public/include/topbar.php'; ?>
                <div class="container-fluid">
                    <div class="card-body">
                        <div class="container-fluid">
                            <h1 class="h3 mb-2 text-gray-800"></h1>
                            <div>
                                <h1 class="mt-4">Team List</h1>
                                <div class="search-container">
                                    <form action="#">
                                        <button class="button" type="search"><i class='bx bx-search'></i>
                                            <input type="text" class="search" placeholder="Search.." name="search">
                                        </button>
                                        <button class="button-add" type="add"><i class='bx bx-plus'></i></button>
                                        <button class="button" type="filter"><i class='bx bx-filter'></i></button>
                                        <!-- Add modal -->
                                        <div id="authentication-add" class="modal-add">
                                            <div class="modal-container">
                                                <!-- Modal content -->
                                                <div class="">
                                                    <div class="modal-content">
                                                        <div class="modal-title">
                                                            <p class="">Add Team</p>
                                                            <button><i class='bx bx-x'></i></button>
                                                        </div>
                                                        <form action="" method="post" class="form" id="form">
                                                            <div class="steps">
                                                                <div class="form-project">
                                                                    <div class="form-group team_name">
                                                                        <label for="team_name">Team Name</label>
                                                                        <input type="text" name="team_name" id="team_name" placeholder="Team Name" autocomplete="off" required>
                                                                        <div data-validation="team_name"></div>
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
                                                            <p class="">Update Team</p>
                                                            <button><i class='bx bx-x'></i></button>
                                                        </div>
                                                        <form action="" method="post" class="form" id="form">
                                                            <div class="form-project">
                                                                <div class="form-group username">
                                                                    <label for="leader">Leader</label>
                                                                    <input type="text" name="leader" id="leader" placeholder="Leader" autocomplete="off" required>
                                                                    <div data-validation="leader"></div>
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

                                    </form>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Team ID</th>
                                            <th>Team Name</th>
                                            <th>Team Leader</th>
                                            <th>No. of Members</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Team ID</th>
                                            <th>Team Name</th>
                                            <th>Team Leader</th>
                                            <th>No. of Members</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody id="retriever">
                                        <tr hidden>
                                            <th>Team ID</th>
                                            <th>Team Name</th>
                                            <th>Team Leader</th>
                                            <th>No. of Members</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php foreach ($team->getAllTeam() as $key => $data) : ?>
                                            <tr>
                                                <th scope='row'><?= $data->id; ?></th>
                                                <td><?= $data->team_name; ?></td>
                                                <td><?= $profile->getProfile($team->getTeam($data->id)->user_id)->profile_fname . " " . $profile->getProfile($team->getTeam($data->id)->user_id)->profile_lname; ?></td>
                                                <td><?= $data->team_currentsize; ?></td>
                                                <td hidden>13</td>
                                                <td>
                                                    <a href='#'><i class='bx bxs-edit'></i></a>
                                                    <i id="delete" class='bx bx-trash'></i>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                        <script>
                                            $(document).ready(function() {
                                                $('.updateBtn').on('click', function() {
                                                    $('#updateProjectModal').modal('show');

                                                    $tr = $(this).closest('tr');

                                                    var data = $tr.children("td").map(function() {
                                                        return $(this).text();
                                                    }).get();

                                                    var data = $tr.children("td").map(function() {
                                                        return $(this).text();
                                                    }).get();

                                                    $('#new_department').val(data[0]);
                                                    $('#departmentID').val(data[3]);
                                                });
                                            });
                                        </script>
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <a href="#" class="next">Next &raquo;</a>
                                <a href="#" class="previous">&laquo; Previous</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="/assets/js/plugins/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/js/plugins/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/plugins/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/assets/js/plugins/sb-admin-2.min.js"></script>
    <script src="/assets/js/plugins/sb-admin-2.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="/assets/js/main.js"></script>
</body>

</html>
