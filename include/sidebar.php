<aside class="sidebar">
    <ul class="side-item">
        <li class="side-item-list">
            <a href="dashboard.html" class="side-item-link">
                <img src="/assets/img/taskmav-logo.png" alt="" class="project-logo">
                <span class="project-name">Project Name
                    <span class="role"><?= $_SESSION['user']->user_usertype == 1 ? "Administrator" : "User"; ?></span>
                </span>
            </a>
        </li>
        <li class="side-item-list">
            <ul class="item">
                <li class="item-list">
                    <a href="<?= ($_SESSION['user']->user_usertype == 1 ? "/account/admin/dashboard" : ($_SESSION['user']->user_usertype == 3 ? "/account/member/" : "#")); ?>">
                        <i class='bx bxs-grid-alt'></i>
                        Dashboard
                    </a>
                </li>
                <li class="item-list">
                    <a href="<?= ($_SESSION['user']->user_usertype == 1 ? "/account/admin/project" : ($_SESSION['user']->user_usertype == 3 ? "/account/member/project" : "#")); ?>">
                        <i class='bx bxs-folder'></i>
                        Project
                    </a>
                </li>
                <li class="item-list">
                    <?php if ($_SESSION['user']->user_usertype == 1) : ?>
                        <a href="/account/admin/report">
                            <i class='bx bxs-report'></i>
                            Report
                        </a>
                    <?php elseif ($_SESSION['user']->user_usertype == 3) : ?>
                        <a href="/account/member/task">
                            <i class='bx bxs-report'></i>
                            Task
                        </a>
                    <?php endif; ?>
                </li>
                <li class="item-list">
                    <?php if ($_SESSION['user']->user_usertype == 1) : ?>
                        <a href="/account/admin/user">
                            <i class='bx bxs-user-account'></i>
                            User List
                        </a>
                    <?php elseif ($_SESSION['user']->user_usertype == 3) : ?>
                        <a href="/account/member/calendar">
                            <i class='bx bxs-user-account'></i>
                            Calendar Task
                        </a>
                    <?php endif; ?>
                </li>
                <?php if ($_SESSION['user']->user_usertype == 1) : ?>
                    <li class="item-list">
                        <a href="/account/admin/team">
                            <i class='bx bxs-group'></i>
                            Team
                        </a>
                    </li>
                <?php elseif ($_SESSION['user']->user_usertype == 3) : ?>
                    <div class="head-slide">Team Name</div>
                    <li class="item-list">
                        <a href="/account/member/member">
                            <i class='bx bxs-group'></i>
                            Team Members
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </li>
        <li class="side-item-list darkmode"></li>
    </ul>
</aside>
