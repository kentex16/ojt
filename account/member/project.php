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
    <title>Project</title>
    <link rel="shortcut icon" href="../admin/img/taskmav-logo.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/assets/css/user/project.css">

    <style>
        h1 {
            margin: 10px 0px 10px 40px;
            font-size: large;
            display: flex;
            font-size: x-large;
        }

        .project-card {
            display: grid;
            float: left;
            margin: 0 0 30px 40px;
            width: 20%;
            border-radius: 10px;
            box-shadow: 0px 5px 10px #9292f5;
            text-align: center;
            grid-template-areas:
                "image"
                "details"
        }

        .project-card:hover {
            transform: translateY(-10px);
            transition: 0.2s ease;
        }

        .details {
            height: fit-content;
            background-color: #f8f8ff;
            font-size: small;
            border-radius: 10px;
        }

        .card-text {
            overflow-y: scroll;
            height: 40px;
            margin: 7px 0 6px 10px;
            color: rgba(0, 0, 0, 0.541);
        }

        .card-text::-webkit-scrollbar {
            background-color: transparent;
        }

        .card-title {
            margin-top: 10px;
        }

        .image {
            display: flex;
            height: 18vh;
        }

        .card-img {
            width: 100%;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        i {
            margin-left: 5px;
        }

        .btn {
            display: flex;
            padding: 5px;
            background-color: rgb(245, 245, 245);
            border-radius: 5px;
            border: 1px solid rgba(0, 0, 255, 0.363);
            margin: 5px auto 10px 35%;
            width: fit-content;
        }

        .btn:hover {
            cursor: pointer;
            transform: scale(1.02);
            background-color: white;
        }

        .bar_container {
            width: 100%;
            border-radius: 20px;
            padding: 0 10px;
        }

        .progress {
            text-align: right;
            color: white;
            background-color: var(--sidebar);
            border-radius: 10px;
            width: max-content;
        }

        .head-slide {
        padding: 0 20px;
        }

        .ps1 {
            width: 75%;
        }

        .ps2 {
            width: 25%;
        }

        .ps3 {
            width: 50%;
        }

        .ps4 {
            width: 100%;
        }

        .ps5 {
            width: 5%;
        }
    </style>
</head>

<body>
    <section class="dashboard">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/public/include/sidebar.php'; ?>
        <main class="main">
            <div class="container">
                <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/public/include/topbar.php'; ?>
                <section class="content">
                    <h1> PROJECTS </h1>
                    <?php foreach ($project->getAllProject() as $key => $data) : ?>
                        <?php if ($data->team_id == $_SESSION['user']->team_id) : ?>
                            <div class="project-card">
                                <div class="image">
                                    <img class="card-img" src="/assets/img/user/image1.jpg"></img>
                                </div>
                                <div class="details">
                                    <h2 class="card-title"> <?= $data->project_title; ?> </h2>
                                    <p class="card-text"><?= $data->project_description; ?></p>
                                    <div class="bar_container">
                                        <div class="ps1 progress">75%</div>
                                    </div>
                                    <a href="/account/member/view?id=<?= $data->id; ?>" class="btn btn1"> View
                                        <i class='bx bxs-show'> </i>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </section>
            </div>
        </main>
    </section>

    <!-- Custom JavaScript -->
    <script src="/assets/js/user/main.js"></script>
</body>

</html>
