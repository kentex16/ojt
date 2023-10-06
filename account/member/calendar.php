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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Calendar</title>
    <link rel="icon" type="image/png" href="../img/logo.png" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

    <!-- Custom fonts for this template-->
    <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!--Box Icons Icons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- Custom styles for this template-->
    <!-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="/public/assets/css/user/calendar.css?v=<?php echo time(); ?>">

    <!-- Calendar -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

    <input type="hidden" id="deptID" value="3">
    <input type="hidden" id="role" value="2">

    <script>
        var role = $('#role').val();

        if (role === "2") {
            $(document).ready(function() {
                var calendar = $('#calendar').fullCalendar({
                    editable: true,
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    events: 'load.php',
                    selectable: true,
                    selectHelper: true,
                    select: function(start, end, allDay) {
                        var deptID = $('#deptID').val();
                        var title = prompt("Enter Event Title");
                        if (title) {
                            var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                            var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                            $.ajax({
                                url: "insert.php",
                                type: "POST",
                                data: {
                                    title: title,
                                    start: start,
                                    end: end,
                                    dept: deptID
                                },
                                success: function() {
                                    calendar.fullCalendar('refetchEvents');
                                    alert("Added Successfully");
                                }
                            })
                        }
                    },
                    editable: true,
                    eventResize: function(event) {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                        var title = event.title;
                        var id = event.id;
                        $.ajax({
                            url: "update.php",
                            type: "POST",
                            data: {
                                title: title,
                                start: start,
                                end: end,
                                id: id
                            },
                            success: function() {
                                calendar.fullCalendar('refetchEvents');
                                alert('Event Update');
                            }
                        })
                    },

                    eventDrop: function(event) {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                        var title = event.title;
                        var id = event.id;
                        $.ajax({
                            url: "update.php",
                            type: "POST",
                            data: {
                                title: title,
                                start: start,
                                end: end,
                                id: id
                            },
                            success: function() {
                                calendar.fullCalendar('refetchEvents');
                                alert("Event Updated");
                            }
                        });
                    },

                    eventClick: function(event) {
                        if (confirm("Are you sure you want to remove it?")) {
                            var id = event.id;
                            $.ajax({
                                url: "delete.php",
                                type: "POST",
                                data: {
                                    id: id
                                },
                                success: function() {
                                    calendar.fullCalendar('refetchEvents');
                                    alert("Event Removed");
                                }
                            })
                        }
                    },

                });
            });
        } else if (role === "3") {
            $(document).ready(function() {
                var calendar = $('#calendar').fullCalendar({
                    editable: true,
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    events: 'load.php'
                });
            });
        }
    </script>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/public/include/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

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
                                                <?=
                                                //full date
                                                date('l, F j, Y');
                                                ?>
                                            </div>
                                            <div class="time">
                                                <?php
                                                date_default_timezone_set("Asia/Manila");
                                                //full time
                                                echo date('h:i A');
                                                ?>
                                            </div>
                                        </div>
            </div>
            </a>
            </li>
            </ul>
            </li>
            </ul>
            </nav>

            <div class="container-fluid">
                <!-- Basic Card Example -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h6>Task Calendar</h6>
                    </div>
                    <div class="card-body-calendar">
                        <div id="calendar"></div>
                    </div>
                </div>

                <h2>Events</h2>
                <table>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Description</th>
                    </tr>
                    <tr>
                        <td>July 11, 2022</td>
                        <td>2:30pm - 4:00pm</td>
                        <td>Team Meeting</td>
                    </tr>
                    <tr>
                        <td>July 12, 2022</td>
                        <td>8:00am - 10:00am</td>
                        <td>Progress Report</td>
                    </tr>
                    <tr>
                        <td>July 15, 2022</td>
                        <td>1:00pm - 2:30pm</td>
                        <td>Team Meeting</td>
                    </tr>
                </table>
            </div>

            <script src="/assets/js/plugins/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="/assets/js/plugins/vendor/jquery-easing/jquery.easing.min.js"></script>
            <script src="/assets/js/main.js"></script>
            <script src="/assets/js/plugins/vendor/chart.js/Chart.min.js"></script>
</body>

</html>
