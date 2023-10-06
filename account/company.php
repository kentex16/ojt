<?php

require_once("../../core/Core.php");

if (isset($_POST['addCompanyBtn'])) {
    $name = !empty($_POST['companyName']) ? $_POST['companyName'] : "";
    $ceo = !empty($_POST['companyCEO']) ? $_POST['companyCEO'] : "";
    $representative = !empty($_POST['companyRep']) ? $_POST['companyRep'] : "";
    $honorific = !empty($_POST['companyHonor']) ? $_POST['companyHonorific'] : "";
    $address = !empty($_POST['companyAddress']) ? $_POST['companyAddress'] : "";
    $website = !empty($_POST['companyWebsite']) ? $_POST['companyWebsite'] : "";
    $email = !empty($_POST['companyEmail']) ? $_POST['companyEmail'] : "";
    $cellphone = !empty($_POST['companyCP']) ? $_POST['companyCP'] : "";
    $telephone = !empty($_POST['companyTP']) ? $_POST['companyTP'] : "";

    if ($company->saveCompany($name, $ceo, $representative, $honorific, $address, $website, $pictureUtils->companyImage($_FILES['companyLogo']), $email, $cellphone, $telephone)) {
        header("Location: /");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">

    <link rel="stylesheet" href="/assets/css/creg.css">
    <title> Company Registration </title>

</head>

<body>
    <div class="container">
        <header>Registration</header>

        <form method="POST" enctype="multipart/form-data">

            <div class="form first">
                <div class="details personal">
                    <span class="title">Company Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Company Name</label>
                            <input type="text" name="companyName" placeholder="Enter Company Name" required>
                        </div>

                        <div class="input-field">
                            <label>Company CEO</label>
                            <input type="text" name="companyCEO" placeholder="Enter Company CEO's Name" required>
                        </div>

                        <div class="input-field">
                            <label>Company Representative</label>
                            <input type="text" name="companyRep" placeholder="Enter Company Representative" required>
                        </div>

                        <div class="input-field">
                            <label>Company Honorifics</label>
                            <select name="companyHonor" required>
                                <option value="0" disabled selected>Select</option>
                                <option value="1">Mr</option>
                                <option value="2">Ms</option>
                                <option value="3">Mrs</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Company Address</label>
                            <input type="text" name="companyAddress" placeholder="Enter Company Address" required>
                        </div>

                        <div class="fileupload">
                            <label>Company Logo</label>
                            <input type="file" name="companyLogo" id="file" class="myclass" required>
                            <label for="file">Choose a file</label>
                        </div>

                        <div class="input-field">
                            <label>Company Email</label>
                            <input type="text" name="companyEmail" placeholder="Enter Company email" required>
                        </div>

                        <div class="input-field">
                            <label>Company Cellphone</label>
                            <input type="text" name="companyCP" onkeypress="return validateNumber(event)" maxlength="11" placeholder="Enter company cellphone" required>
                        </div>

                        <div class="input-field">
                            <label>Company Telephone</label>
                            <input type="text" name="companyTP" onkeypress="return validateNumber(event)" maxlength="11" placeholder="Enter company telephone" required>
                        </div>

                    </div>
                    <button class="submitBtn" type="submit" name="addCompanyBtn">
                        <span class="btnText">Register</span>
                    </button>
                    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                    <p>Already have an account? <a href="#">Sign in</a>.</p>

                </div>
            </div>
            <script src="/assets/js/main.js"></script>
</body>

</html>
