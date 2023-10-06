<?php
session_set_cookie_params(3600, '/', 'localhost');
session_start();

// Config
$BASE_URL = 'localhost';
$ROOT_URL = '/public';

// Database
require_once dirname(__DIR__) . '/core/database/Database.php';

// Controllers
require_once dirname(__DIR__) . '/app/controllers/AuthController.php';
require_once dirname(__DIR__) . '/app/controllers/CompanyController.php';
require_once dirname(__DIR__) . '/app/controllers/DepartmentController.php';
require_once dirname(__DIR__) . '/app/controllers/EventController.php';
require_once dirname(__DIR__) . '/app/controllers/FileController.php';
require_once dirname(__DIR__) . '/app/controllers/NotificationController.php';
require_once dirname(__DIR__) . '/app/controllers/ProfileController.php';
require_once dirname(__DIR__) . '/app/controllers/ProjectController.php';
require_once dirname(__DIR__) . '/app/controllers/TaskController.php';
require_once dirname(__DIR__) . '/app/controllers/TeamController.php';
require_once dirname(__DIR__) . '/app/controllers/UserController.php';

// Models
require_once dirname(__DIR__) . '/app/models/CompanyModel.php';
require_once dirname(__DIR__) . '/app/models/DepartmentModel.php';
require_once dirname(__DIR__) . '/app/models/EventModel.php';
require_once dirname(__DIR__) . '/app/models/FileModel.php';
require_once dirname(__DIR__) . '/app/models/NotificationModel.php';
require_once dirname(__DIR__) . '/app/models/ProfileModel.php';
require_once dirname(__DIR__) . '/app/models/ProjectModel.php';
require_once dirname(__DIR__) . '/app/models/TaskModel.php';
require_once dirname(__DIR__) . '/app/models/TeamModel.php';
require_once dirname(__DIR__) . '/app/models/UserModel.php';

// Utils
require_once dirname(__DIR__) . '/core/Utils/FileUtils.php';
require_once dirname(__DIR__) . '/core/Utils/StringUtils.php';
require_once dirname(__DIR__) . '/core/Utils/PictureUtils.php';

// Objects
$authenticate = new AuthController();
$company = new CompanyController();
$department = new DepartmentController();
$notification = new NotificationController();
$file = new FileController();
$profile = new ProfileController();
$project = new ProjectController();
$task = new TaskController();
$team = new TeamController();
$user = new UserController();

$fileUtils = new FileUtils();
$stringUtils = new StringUtils();
$pictureUtils = new PictureUtils();
