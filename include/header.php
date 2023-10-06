<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User</title>
    <link rel="shortcut icon" href="/assets/img/admin/taskmav-logo.png" type="image/x-icon">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    <link rel="stylesheet" href="/assets/css/admin/userlist.css">


    <style>
        .collapsible {
            background-color: offwhite;
            color: white;
            cursor: pointer;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
        }

        .active,
        .collapsible:hover {
            background-color: #7EBBF9;
        }

        .content {
            padding: 15px;
            display: none;
            overflow: hidden;
            background-color: #ffffff;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            margin-bottom: 5px;

        }

        .collapsible {
            color: black;
        }

        .btn-primary,
        .btn-danger,
        .btn-default {
            padding: 10px;
            color: white;
            background-color: cornflowerblue;
            border: 0px;
            border-radius: 10px;
            width: 120px;
        }

        .btn-danger,
        .btn-default {
            background-color: #e6534e;
        }

        .buttons {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .buttons>input {
            margin: 10px;
            padding: 10px 20px;
            border-radius: 15px;
            transition: all 0.2s ease-in-out;
            cursor: pointer;
        }

        .buttons>input:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <aside class="sidebar">
            <ul class="side-item">
                <li class="side-item-list">
                    <a href="dashboard.html" class="side-item-link">
                        <img src="../admin/img/taskmav-logo.png" alt="" class="project-logo">
                        <span class="project-name">Project Name
                            <span class="role">Admin</span>
                        </span>
                    </a>
                </li>
                <li class="side-item-list">
                    <ul class="item">
                        <li class="item-list">
                            <a href="/account/admin/dashboard">
                                <i class='bx bxs-grid-alt'></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="item-list">
                            <a href="/account/admin/project">
                                <i class='bx bxs-folder'></i>
                                Project
                            </a>
                        </li>
                        <li class="item-list">
                            <a href="/account/admin/report">
                                <i class='bx bxs-report'></i>
                                Report
                            </a>
                        </li>
                        <li class="item-list">
                            <a href="/account/admin/user">
                                <i class='bx bxs-user-account'></i>
                                User List
                            </a>
                        </li>
                        <div class="head-slide"></div>
                        <li class="item-list">
                            <a href="/account/admin/team">
                                <i class='bx bxs-group'></i>
                                Team
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="side-item-list darkmode"></li>
            </ul>
        </aside>

        <div id="content-wrapper" class="d-flex flex-column">
