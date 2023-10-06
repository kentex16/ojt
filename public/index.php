<?php

require_once("../core/Core.php");

$username = $password = $message = "";
$inputError = "";

if (isset($_POST["btnLogin"])) {
    // Validate Inputs
    if ($_POST["username"] == "" || $_POST["password"] == "") {
        $inputError = '<div class="alert alert-danger alert-dismissible" style="margin: 0 -100%;">
	    <a href="#" class="close" style="margin-top: 1%;" data-dismiss="alert" aria-label="close">&times;</a>
	   <center> Username is required! </center>
	  </div>';
    }

    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $authenticate->verifyUser($username, $password);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mukta:wght@400;700&display=swap');


*,
*::after,
*::before {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

:root {
    --mulkta: 'Mukta', sans-serif;
}

body {
    /* background-image: url('https://media.discordapp.net/attachments/980860281137815573/981499979099164682/wallpaperflare.com_wallpaper.jpg?width=718&height=404');  */
    background-image: url('../img/bg-reg.png');
    /* background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    font-family: var(--mulkta);
    overflow: hidden; */
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    font-family: var(--mulkta);
    background-position: center;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    object-fit: cover;
    overflow: hidden;

}

img {
    width: 100%;
}

.containers {
    background-color: #16558F;
    margin: 213px auto;
    padding: 0;
    width: 450px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    align-items: center;
    background-image: url('../images/bg-melham1.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    border-radius: 20px;
}

.containers .form-container {
    width: 100%;
}

.form-container form {
    background-color: #7fb5f4;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    align-content: center;
    padding: 20px 50px;
    border-radius: 20px;
    position: relative;

}

.form-container form h2 {
    font-weight: bold;
}

.form-container form input[type="text"],
.form-container form input[type="password"] {
    width: 100%;
    padding: 10px 20px;
    margin: 10px 0;
    border: 1px solid black;
    border-radius: 10px;
}

.fa-user,
.fa-eye {
    color: #0335ff;
    font-size: 20px;
    position: absolute;
    top: 102px;
    /* bottom: 5px; */
    right: 64px;
}

.fa-eye {
    right: 60px;
    top: 165px;
    cursor: pointer;
}

.form-container form a {
    text-decoration: none;
    align-self: flex-end;
    color: Black;
    font-size: 13px;
    padding: 5px 0;
    transition: all .2s ease-in-out;
}

.form-container form a:hover {
    text-decoration: underline;
    transform: scale(1.1);
}

.form-container form input[type="submit"] {
    padding: 10px 40px;
    margin: 15px 0;
    border-radius: 10px;
    background-color: #16558F;
    border: none;
    font-weight: bold;
    color: white;
    transition: all .2s ease-in-out;
}

.form-container form input[type="submit"]:hover {
    transform: scale(1.1);
}

.form-container form .register {
    color: black;
    font-size: 15px;
    padding: 5px 0;
    display: flex;
    align-items: center;
    justify-content: center;
    align-content: center;
    flex-direction: row;
    margin-bottom: -15px;
    text-align: center;
    transition: all .2s ease-in-out;

}

.register span a {
    font-size: 18px;
    text-decoration: none;
    margin-left: 5px;
    transition: all .2s ease-in-out;
}

.register span a:hover {
    text-decoration: underline;
    transform: scale(1.1);
    color: red;
}

.containers .overlay-container {
    order: -1;
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 30px 0px;
    border-radius: 20px;


}

.overlay-container .overlay {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    align-content: center;
}

.overlay img {
    width: 130px;
    height: 130px;
    border-radius: 50%;
}

.overlay p {
    display: none;
}


@media screen and (min-width: 800px) {
    .containers {
        margin-top: auto 0;
        flex-direction: row;
        width: 800px;
        height: 500px;
    }

    .form-container form {
        height: 500px;
        width: 100%;
    }

    .overlay p {
        display: block;
        text-align: center;
        font-size: 15px;
        color: black;
        margin-top: 10px;
        font-weight: bold;
    }

    .fa-user {
        top: 226px;
        right: 67px;
        color: #16558F;
    }

    .fa-eye {
        top: 288px;
        right: 66px;
        color: #16558F;
    }

    .overlay-panel {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        align-content: center;
    }

    .overlay img {
        margin-bottom: 15px;
    }

    .form-container form input[type="submit"] {
        position: absolute;
        bottom: 54px;
    }

    .form-container form .register {
        position: absolute;
        bottom: 19px;
    }
}

    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskMAV</title>
    <link rel="icon" type="image/png" href="/assets/img/taskmav-logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- Start of Header Scripts  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@widgetbot/crate@3" async defer>
        new Crate({
            server: '980634785334575174',
            channel: '980634857942163506',
        })
    </script>
</head>

<body>
    <div class="alert">
        <span class="error"> <?= $inputError; ?></span>
    </div>

    <div class="containers" id="container">
        <div class="form-container log-in-container">
            <form method="POST">
                <h2>LOGIN</h2>
                <input name="username" type="text" id="username" class="form__input" autocomplete="off" placeholder="Email" />
                <i class="fa-solid fa-user"></i>
                <input name="password" type="password" id="password" class="form__input" autocomplete="off" placeholder="Password" />
                <i class="fa-solid fa-eye" id="eye" onclick="toggle()" aria-hidden="true"></i>

                <!-- code inserted for the toggle password -->
                <script>
                    var state = false;

                    function toggle() {
                        if (state) {
                            document.getElementById("password").
                            setAttribute("type", "password");
                            state = false;
                        } else {
                            document.getElementById("password").
                            setAttribute("type", "text");
                            state = true;
                        }
                    }
                </script>

                <a href="forgot-pass">Forgot your password?</a>
                <input type="submit" name="btnLogin" value="Login" />
                <p class="register">Don't have account <span><a href="/account/register">Sign up</a></span></p>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <img src="/assets/img/melham-logo.png" alt="Logo">
                    <p>COLLABORATIVE:RESPECT:INTEGRITY:PRIDE</p>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
