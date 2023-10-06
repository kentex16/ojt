<?php

require_once("../../core/Core.php");

if (isset($_POST['registerForm'])) {

    // User Variables
    $companyId = !empty($_POST['companyId']) ? $_POST['companyId'] : 1;
    $username = !empty($_POST['username']) ? $_POST['username'] : "";
    $password = !empty($_POST['password']) ? $authenticate->setPassword($_POST['password']) : "";
    $picture = !empty($_POST['picture']) ? $_POST['picture'] : "";
    $datejoined = !empty($_POST['picture']) ? $_POST['picture'] : "";
    $usertype = !empty($_POST['picture']) ? $_POST['picture'] : 1;
    $isFirst = !empty($_POST['picture']) ? $_POST['picture'] : 1;
    $isBanned = !empty($_POST['picture']) ? $_POST['picture'] : 1;

    // Profile Variables
    $fname = !empty($_POST['firstname']) ? $_POST['firstname'] : "";
    $mname = !empty($_POST['middlename']) ? $_POST['middlename'] : "";
    $lname = !empty($_POST['lastname']) ? $_POST['lastname'] : "";
    $address = !empty($_POST['address']) ? $_POST['address'] : "";
    $house = !empty($_POST['address']) ? $_POST['address'] : "";
    $street = !empty($_POST['address']) ? $_POST['address'] : "";
    $barangay = !empty($_POST['address']) ? $_POST['address'] : "";
    $city = !empty($_POST['address']) ? $_POST['address'] : "";
    $zipcode = !empty($_POST['address']) ? $_POST['address'] : "";
    $email = !empty($_POST['address']) ? $_POST['address'] : "";
    $telephone = !empty($_POST['address']) ? $_POST['address'] : "";
    $cellphone = !empty($_POST['address']) ? $_POST['address'] : "";

    if ($lastInsertId = $user->saveUser($companyId, $username, $password, $picture, $datejoined, $usertype, $isFirst, $isBanned)) {
        $profile->saveProfile($lastInsertId, $fname, $mname, $lname, $address, $house, $street, $barangay, $city, $zipcode, $email, $telephone, $cellphone);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Monitoring Registration</title>
    <link rel="task-mav-logo" sizes="57x57" href="/assets/img/taskmav-logo.png">
    <link rel="stylesheet" href="/assets/css/register.css">
</head>

<body>

    <!-- Register Form -->
    <section class="register_form">
        <!-- Start Container -->
        <div class="container">
            <!-- Start Logo -->
            <div class="logo_container">
                <img src="/assets/img/taskmav-logo.png" class="img_logo" alt="TaskMav Logo">
                <p class="title">Task Monitoring</p>
            </div>
            <!-- End Logo -->

            <!-- Progress -->
            <div class="progress">
                <div class="progress-bar" id="progress"></div>

                <div class="progress-step progress-active" data-title="Profile"></div>
                <div class="progress-step" data-title="Address"></div>
                <div class="progress-step" data-title="Credentials"></div>
            </div>
            <!-- End Progress -->
            <!-- Start Form -->
            <form action="sign-up.php" method="post" class="form" id="form">
                <div class="steps active">
                    <div class="form-steps">
                        <!-- First Name -->
                        <div class="form-group firstname">
                            <label for="firstname">First Name</label>
                            <input type="text" name="firstname" id="firstname" placeholder="First Name" autocomplete="off" required>
                            <div data-validation="firstname"></div>
                        </div>
                        <!-- Middle Name -->
                        <div class="form-group middlename">
                            <label for="middlename">Middle Name (<small>Optional</small>)</label>
                            <input type="text" name="middlename" id="middlename" placeholder="Middle Name" autocomplete="off">
                            <div data-validation="middlename"></div>
                        </div>
                        <!-- Last Name -->
                        <div class="form-group lastname">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" id="lastname" placeholder="Last Name" autocomplete="off" required>
                            <div data-validation="lastname"></div>
                        </div>
                        <!-- Contact Number -->
                        <div class="form-group cNo">
                            <label for="contact_number">Contact Number</label>
                            <input type="text" name="contact_number" id="contact_number" placeholder="Contact Number" autocomplete="off" required>
                            <div data-validation="contact_number"></div>
                        </div>
                        <!-- Gender -->
                        <div class="form-group gender">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender">
                                <option value="">Select Gender</option>
                                <option value="">Male</option>
                                <option value="">Female</option>
                            </select>
                        </div>
                        <div class="btn">
                            <button class="btn-nxt" name="btnNext">Next</button>
                        </div>
                    </div>
                </div>
                <div class="steps">
                    <div class="form-steps">
                        <!-- House # -->
                        <div class="form-group house_no">
                            <label for="house_no">House #</label>
                            <input type="text" name="house_no" id="house_no" placeholder="House #" autocomplete="off" required>
                            <div data-validation="house_no"></div>
                        </div>
                        <!-- Street Name -->
                        <div class="form-group street_name">
                            <label for="street_name">Street Name</label>
                            <input type="text" name="street_name" id="street_name" placeholder="Street Name" autocomplete="off" required>
                            <div data-validation="street_name"></div>
                        </div>
                        <!-- City -->
                        <div class="form-group city">
                            <label for="city">City</label>
                            <select id="city" name="city">
                                <option value="">Select City</option>
                                <option value="Caloocan">Caloocan</option>
                                <option value="Calumpang">Calumpang</option>
                                <option value="Dasmariñas Village">Dasmariñas Village</option>
                                <option value="Ermita">Ermita</option>
                                <option value="Intramuros">Intramuros</option>
                                <option value="Las Piñas">Las Piñas</option>
                                <option value="Makati">Makati</option>
                                <option value="Malabon">Malabon</option>
                                <option value="Malate">Malate</option>
                                <option value="Mandaluyong">Mandaluyong</option>
                                <option value="Manila">Manila</option>
                                <option value="Marikina">Marikina</option>
                                <option value="Muntinlupa">Muntinlupa</option>
                                <option value="National Capital Region">National Capital Region</option>
                                <option value="Navotas">Navotas</option>
                                <option value="Niugan">Niugan</option>
                                <option value="Paco">Paco</option>
                                <option value="Pandacan">Pandacan</option>
                                <option value="Parañaque">Parañaque</option>
                                <option value="Pasay">Pasay</option>
                                <option value="Pasig">Pasig</option>
                                <option value="Pateros">Pateros</option>
                                <option value="Port Area">Port Area</option>
                                <option value="Quezon City">Quezon City</option>
                                <option value="Quiapo">Quiapo</option>
                                <option value="Sambayanihan People's Village">Sambayanihan People's Village</option>
                                <option value="San Juan">San Juan</option>
                                <option value="San Miguel">San Miguel</option>
                                <option value="Santa Ana">Santa Ana</option>
                                <option value="Santa Cruz">Santa Cruz</option>
                                <option value="Singkamas">Singkamas</option>
                                <option value="Taguig">Taguig</option>
                                <option value="Tanza">Tanza</option>
                                <option value="Tanza">Tanza</option>
                                <option value="Tondo">Tondo</option>
                                <option value="Valenzuela">Valenzuela</option>
                            </select>
                            <div data-validation="city"></div>
                        </div>
                        <!-- Barangay -->
                        <div class="form-group barangay">
                            <label for="barangay">Barangay</label>
                            <input type="text" name="barangay" id="barangay" placeholder="Barangay" autocomplete="off" required>
                            <div data-validation="barangay"></div>
                        </div>
                        <!-- Zip Code -->
                        <div class="form-group zip">
                            <label for="zip">Zip Code</label>
                            <input type="text" name="zip" id="zip" placeholder="Zip Code" autocomplete="off" required>
                            <div data-validation="zip"></div>
                        </div>
                        <!-- Country -->
                        <div class="form-group country">
                            <label for="country">Country</label>
                            <select name="country" id="country">
                                <option value="">Select Country</option>
                                <optgroup id="country-optgroup-Africa" label="Africa">
                                    <option value="DZ" label="Algeria">Algeria</option>
                                    <option value="AO" label="Angola">Angola</option>
                                    <option value="BJ" label="Benin">Benin</option>
                                    <option value="BW" label="Botswana">Botswana</option>
                                    <option value="BF" label="Burkina Faso">Burkina Faso</option>
                                    <option value="BI" label="Burundi">Burundi</option>
                                    <option value="CM" label="Cameroon">Cameroon</option>
                                    <option value="CV" label="Cape Verde">Cape Verde</option>
                                    <option value="CF" label="Central African Republic">Central African Republic
                                    </option>
                                    <option value="TD" label="Chad">Chad</option>
                                    <option value="KM" label="Comoros">Comoros</option>
                                    <option value="CG" label="Congo - Brazzaville">Congo - Brazzaville</option>
                                    <option value="CD" label="Congo - Kinshasa">Congo - Kinshasa</option>
                                    <option value="CI" label="Côte d’Ivoire">Côte d’Ivoire</option>
                                    <option value="DJ" label="Djibouti">Djibouti</option>
                                    <option value="EG" label="Egypt">Egypt</option>
                                    <option value="GQ" label="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="ER" label="Eritrea">Eritrea</option>
                                    <option value="ET" label="Ethiopia">Ethiopia</option>
                                    <option value="GA" label="Gabon">Gabon</option>
                                    <option value="GM" label="Gambia">Gambia</option>
                                    <option value="GH" label="Ghana">Ghana</option>
                                    <option value="GN" label="Guinea">Guinea</option>
                                    <option value="GW" label="Guinea-Bissau">Guinea-Bissau</option>
                                    <option value="KE" label="Kenya">Kenya</option>
                                    <option value="LS" label="Lesotho">Lesotho</option>
                                    <option value="LR" label="Liberia">Liberia</option>
                                    <option value="LY" label="Libya">Libya</option>
                                    <option value="MG" label="Madagascar">Madagascar</option>
                                    <option value="MW" label="Malawi">Malawi</option>
                                    <option value="ML" label="Mali">Mali</option>
                                    <option value="MR" label="Mauritania">Mauritania</option>
                                    <option value="MU" label="Mauritius">Mauritius</option>
                                    <option value="YT" label="Mayotte">Mayotte</option>
                                    <option value="MA" label="Morocco">Morocco</option>
                                    <option value="MZ" label="Mozambique">Mozambique</option>
                                    <option value="NA" label="Namibia">Namibia</option>
                                    <option value="NE" label="Niger">Niger</option>
                                    <option value="NG" label="Nigeria">Nigeria</option>
                                    <option value="RW" label="Rwanda">Rwanda</option>
                                    <option value="RE" label="Réunion">Réunion</option>
                                    <option value="SH" label="Saint Helena">Saint Helena</option>
                                    <option value="SN" label="Senegal">Senegal</option>
                                    <option value="SC" label="Seychelles">Seychelles</option>
                                    <option value="SL" label="Sierra Leone">Sierra Leone</option>
                                    <option value="SO" label="Somalia">Somalia</option>
                                    <option value="ZA" label="South Africa">South Africa</option>
                                    <option value="SD" label="Sudan">Sudan</option>
                                    <option value="SZ" label="Swaziland">Swaziland</option>
                                    <option value="ST" label="São Tomé and Príncipe">São Tomé and Príncipe</option>
                                    <option value="TZ" label="Tanzania">Tanzania</option>
                                    <option value="TG" label="Togo">Togo</option>
                                    <option value="TN" label="Tunisia">Tunisia</option>
                                    <option value="UG" label="Uganda">Uganda</option>
                                    <option value="EH" label="Western Sahara">Western Sahara</option>
                                    <option value="ZM" label="Zambia">Zambia</option>
                                    <option value="ZW" label="Zimbabwe">Zimbabwe</option>
                                </optgroup>
                                <optgroup id="country-optgroup-Americas" label="Americas">
                                    <option value="AI" label="Anguilla">Anguilla</option>
                                    <option value="AG" label="Antigua and Barbuda">Antigua and Barbuda</option>
                                    <option value="AR" label="Argentina">Argentina</option>
                                    <option value="AW" label="Aruba">Aruba</option>
                                    <option value="BS" label="Bahamas">Bahamas</option>
                                    <option value="BB" label="Barbados">Barbados</option>
                                    <option value="BZ" label="Belize">Belize</option>
                                    <option value="BM" label="Bermuda">Bermuda</option>
                                    <option value="BO" label="Bolivia">Bolivia</option>
                                    <option value="BR" label="Brazil">Brazil</option>
                                    <option value="VG" label="British Virgin Islands">British Virgin Islands</option>
                                    <option value="CA" label="Canada">Canada</option>
                                    <option value="KY" label="Cayman Islands">Cayman Islands</option>
                                    <option value="CL" label="Chile">Chile</option>
                                    <option value="CO" label="Colombia">Colombia</option>
                                    <option value="CR" label="Costa Rica">Costa Rica</option>
                                    <option value="CU" label="Cuba">Cuba</option>
                                    <option value="DM" label="Dominica">Dominica</option>
                                    <option value="DO" label="Dominican Republic">Dominican Republic</option>
                                    <option value="EC" label="Ecuador">Ecuador</option>
                                    <option value="SV" label="El Salvador">El Salvador</option>
                                    <option value="FK" label="Falkland Islands">Falkland Islands</option>
                                    <option value="GF" label="French Guiana">French Guiana</option>
                                    <option value="GL" label="Greenland">Greenland</option>
                                    <option value="GD" label="Grenada">Grenada</option>
                                    <option value="GP" label="Guadeloupe">Guadeloupe</option>
                                    <option value="GT" label="Guatemala">Guatemala</option>
                                    <option value="GY" label="Guyana">Guyana</option>
                                    <option value="HT" label="Haiti">Haiti</option>
                                    <option value="HN" label="Honduras">Honduras</option>
                                    <option value="JM" label="Jamaica">Jamaica</option>
                                    <option value="MQ" label="Martinique">Martinique</option>
                                    <option value="MX" label="Mexico">Mexico</option>
                                    <option value="MS" label="Montserrat">Montserrat</option>
                                    <option value="AN" label="Netherlands Antilles">Netherlands Antilles</option>
                                    <option value="NI" label="Nicaragua">Nicaragua</option>
                                    <option value="PA" label="Panama">Panama</option>
                                    <option value="PY" label="Paraguay">Paraguay</option>
                                    <option value="PE" label="Peru">Peru</option>
                                    <option value="PR" label="Puerto Rico">Puerto Rico</option>
                                    <option value="BL" label="Saint Barthélemy">Saint Barthélemy</option>
                                    <option value="KN" label="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                    <option value="LC" label="Saint Lucia">Saint Lucia</option>
                                    <option value="MF" label="Saint Martin">Saint Martin</option>
                                    <option value="PM" label="Saint Pierre and Miquelon">Saint Pierre and Miquelon
                                    </option>
                                    <option value="VC" label="Saint Vincent and the Grenadines">Saint Vincent and the
                                        Grenadines</option>
                                    <option value="SR" label="Suriname">Suriname</option>
                                    <option value="TT" label="Trinidad and Tobago">Trinidad and Tobago</option>
                                    <option value="TC" label="Turks and Caicos Islands">Turks and Caicos Islands
                                    </option>
                                    <option value="VI" label="U.S. Virgin Islands">U.S. Virgin Islands</option>
                                    <option value="US" label="United States">United States</option>
                                    <option value="UY" label="Uruguay">Uruguay</option>
                                    <option value="VE" label="Venezuela">Venezuela</option>
                                </optgroup>
                                <optgroup id="country-optgroup-Asia" label="Asia">
                                    <option value="AF" label="Afghanistan">Afghanistan</option>
                                    <option value="AM" label="Armenia">Armenia</option>
                                    <option value="AZ" label="Azerbaijan">Azerbaijan</option>
                                    <option value="BH" label="Bahrain">Bahrain</option>
                                    <option value="BD" label="Bangladesh">Bangladesh</option>
                                    <option value="BT" label="Bhutan">Bhutan</option>
                                    <option value="BN" label="Brunei">Brunei</option>
                                    <option value="KH" label="Cambodia">Cambodia</option>
                                    <option value="CN" label="China">China</option>
                                    <option value="GE" label="Georgia">Georgia</option>
                                    <option value="HK" label="Hong Kong SAR China">Hong Kong SAR China</option>
                                    <option value="IN" label="India">India</option>
                                    <option value="ID" label="Indonesia">Indonesia</option>
                                    <option value="IR" label="Iran">Iran</option>
                                    <option value="IQ" label="Iraq">Iraq</option>
                                    <option value="IL" label="Israel">Israel</option>
                                    <option value="JP" label="Japan">Japan</option>
                                    <option value="JO" label="Jordan">Jordan</option>
                                    <option value="KZ" label="Kazakhstan">Kazakhstan</option>
                                    <option value="KW" label="Kuwait">Kuwait</option>
                                    <option value="KG" label="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="LA" label="Laos">Laos</option>
                                    <option value="LB" label="Lebanon">Lebanon</option>
                                    <option value="MO" label="Macau SAR China">Macau SAR China</option>
                                    <option value="MY" label="Malaysia">Malaysia</option>
                                    <option value="MV" label="Maldives">Maldives</option>
                                    <option value="MN" label="Mongolia">Mongolia</option>
                                    <option value="MM" label="Myanmar [Burma]">Myanmar [Burma]</option>
                                    <option value="NP" label="Nepal">Nepal</option>
                                    <option value="NT" label="Neutral Zone">Neutral Zone</option>
                                    <option value="KP" label="North Korea">North Korea</option>
                                    <option value="OM" label="Oman">Oman</option>
                                    <option value="PK" label="Pakistan">Pakistan</option>
                                    <option value="PS" label="Palestinian Territories">Palestinian Territories</option>
                                    <option value="YD" label="People's Democratic Republic of Yemen">People's Democratic
                                        Republic of Yemen</option>
                                    <option value="PH" label="Philippines">Philippines</option>
                                    <option value="QA" label="Qatar">Qatar</option>
                                    <option value="SA" label="Saudi Arabia">Saudi Arabia</option>
                                    <option value="SG" label="Singapore">Singapore</option>
                                    <option value="KR" label="South Korea">South Korea</option>
                                    <option value="LK" label="Sri Lanka">Sri Lanka</option>
                                    <option value="SY" label="Syria">Syria</option>
                                    <option value="TW" label="Taiwan">Taiwan</option>
                                    <option value="TJ" label="Tajikistan">Tajikistan</option>
                                    <option value="TH" label="Thailand">Thailand</option>
                                    <option value="TL" label="Timor-Leste">Timor-Leste</option>
                                    <option value="TR" label="Turkey">Turkey</option>
                                    <option value="TM" label="Turkmenistan">Turkmenistan</option>
                                    <option value="AE" label="United Arab Emirates">United Arab Emirates</option>
                                    <option value="UZ" label="Uzbekistan">Uzbekistan</option>
                                    <option value="VN" label="Vietnam">Vietnam</option>
                                    <option value="YE" label="Yemen">Yemen</option>
                                </optgroup>
                                <optgroup id="country-optgroup-Europe" label="Europe">
                                    <option value="AL" label="Albania">Albania</option>
                                    <option value="AD" label="Andorra">Andorra</option>
                                    <option value="AT" label="Austria">Austria</option>
                                    <option value="BY" label="Belarus">Belarus</option>
                                    <option value="BE" label="Belgium">Belgium</option>
                                    <option value="BA" label="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                    <option value="BG" label="Bulgaria">Bulgaria</option>
                                    <option value="HR" label="Croatia">Croatia</option>
                                    <option value="CY" label="Cyprus">Cyprus</option>
                                    <option value="CZ" label="Czech Republic">Czech Republic</option>
                                    <option value="DK" label="Denmark">Denmark</option>
                                    <option value="DD" label="East Germany">East Germany</option>
                                    <option value="EE" label="Estonia">Estonia</option>
                                    <option value="FO" label="Faroe Islands">Faroe Islands</option>
                                    <option value="FI" label="Finland">Finland</option>
                                    <option value="FR" label="France">France</option>
                                    <option value="DE" label="Germany">Germany</option>
                                    <option value="GI" label="Gibraltar">Gibraltar</option>
                                    <option value="GR" label="Greece">Greece</option>
                                    <option value="GG" label="Guernsey">Guernsey</option>
                                    <option value="HU" label="Hungary">Hungary</option>
                                    <option value="IS" label="Iceland">Iceland</option>
                                    <option value="IE" label="Ireland">Ireland</option>
                                    <option value="IM" label="Isle of Man">Isle of Man</option>
                                    <option value="IT" label="Italy">Italy</option>
                                    <option value="JE" label="Jersey">Jersey</option>
                                    <option value="LV" label="Latvia">Latvia</option>
                                    <option value="LI" label="Liechtenstein">Liechtenstein</option>
                                    <option value="LT" label="Lithuania">Lithuania</option>
                                    <option value="LU" label="Luxembourg">Luxembourg</option>
                                    <option value="MK" label="Macedonia">Macedonia</option>
                                    <option value="MT" label="Malta">Malta</option>
                                    <option value="FX" label="Metropolitan France">Metropolitan France</option>
                                    <option value="MD" label="Moldova">Moldova</option>
                                    <option value="MC" label="Monaco">Monaco</option>
                                    <option value="ME" label="Montenegro">Montenegro</option>
                                    <option value="NL" label="Netherlands">Netherlands</option>
                                    <option value="NO" label="Norway">Norway</option>
                                    <option value="PL" label="Poland">Poland</option>
                                    <option value="PT" label="Portugal">Portugal</option>
                                    <option value="RO" label="Romania">Romania</option>
                                    <option value="RU" label="Russia">Russia</option>
                                    <option value="SM" label="San Marino">San Marino</option>
                                    <option value="RS" label="Serbia">Serbia</option>
                                    <option value="CS" label="Serbia and Montenegro">Serbia and Montenegro</option>
                                    <option value="SK" label="Slovakia">Slovakia</option>
                                    <option value="SI" label="Slovenia">Slovenia</option>
                                    <option value="ES" label="Spain">Spain</option>
                                    <option value="SJ" label="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                    <option value="SE" label="Sweden">Sweden</option>
                                    <option value="CH" label="Switzerland">Switzerland</option>
                                    <option value="UA" label="Ukraine">Ukraine</option>
                                    <option value="SU" label="Union of Soviet Socialist Republics">Union of Soviet
                                        Socialist Republics</option>
                                    <option value="GB" label="United Kingdom">United Kingdom</option>
                                    <option value="VA" label="Vatican City">Vatican City</option>
                                    <option value="AX" label="Åland Islands">Åland Islands</option>
                                </optgroup>
                                <optgroup id="country-optgroup-Oceania" label="Oceania">
                                    <option value="AS" label="American Samoa">American Samoa</option>
                                    <option value="AQ" label="Antarctica">Antarctica</option>
                                    <option value="AU" label="Australia">Australia</option>
                                    <option value="BV" label="Bouvet Island">Bouvet Island</option>
                                    <option value="IO" label="British Indian Ocean Territory">British Indian Ocean
                                        Territory</option>
                                    <option value="CX" label="Christmas Island">Christmas Island</option>
                                    <option value="CC" label="Cocos [Keeling] Islands">Cocos [Keeling] Islands</option>
                                    <option value="CK" label="Cook Islands">Cook Islands</option>
                                    <option value="FJ" label="Fiji">Fiji</option>
                                    <option value="PF" label="French Polynesia">French Polynesia</option>
                                    <option value="TF" label="French Southern Territories">French Southern Territories
                                    </option>
                                    <option value="GU" label="Guam">Guam</option>
                                    <option value="HM" label="Heard Island and McDonald Islands">Heard Island and
                                        McDonald Islands</option>
                                    <option value="KI" label="Kiribati">Kiribati</option>
                                    <option value="MH" label="Marshall Islands">Marshall Islands</option>
                                    <option value="FM" label="Micronesia">Micronesia</option>
                                    <option value="NR" label="Nauru">Nauru</option>
                                    <option value="NC" label="New Caledonia">New Caledonia</option>
                                    <option value="NZ" label="New Zealand">New Zealand</option>
                                    <option value="NU" label="Niue">Niue</option>
                                    <option value="NF" label="Norfolk Island">Norfolk Island</option>
                                    <option value="MP" label="Northern Mariana Islands">Northern Mariana Islands
                                    </option>
                                    <option value="PW" label="Palau">Palau</option>
                                    <option value="PG" label="Papua New Guinea">Papua New Guinea</option>
                                    <option value="PN" label="Pitcairn Islands">Pitcairn Islands</option>
                                    <option value="WS" label="Samoa">Samoa</option>
                                    <option value="SB" label="Solomon Islands">Solomon Islands</option>
                                    <option value="GS" label="South Georgia and the South Sandwich Islands">South
                                        Georgia and the South Sandwich Islands</option>
                                    <option value="TK" label="Tokelau">Tokelau</option>
                                    <option value="TO" label="Tonga">Tonga</option>
                                    <option value="TV" label="Tuvalu">Tuvalu</option>
                                    <option value="UM" label="U.S. Minor Outlying Islands">U.S. Minor Outlying Islands
                                    </option>
                                    <option value="VU" label="Vanuatu">Vanuatu</option>
                                    <option value="WF" label="Wallis and Futuna">Wallis and Futuna</option>
                                </optgroup>
                            </select>
                        </div>

                        <div class="btn">
                            <button class="btn-prev" name="btnNext">Previous</button>
                            <button class="btn-nxt" name="btnNext">Next</button>
                        </div>
                    </div>
                </div>
                <div class="steps">
                    <div class="form-steps">
                        <!-- Username -->
                        <div class="form-group username">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" placeholder="Username" autocomplete="off" required>
                            <div data-validation="username"></div>
                        </div>
                        <!-- Email -->
                        <div class="form-group email">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email" autocomplete="off" required>
                            <div data-validation="email"></div>
                        </div>
                        <!-- Password -->
                        <div class="form-group password">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required>
                            <div data-validation="password"></div>
                        </div>
                        <!-- Confirm Password -->
                        <div class="form-group confirm_password">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" autocomplete="off" required>
                            <div data-validation="confirm_password"></div>
                        </div>

                        <div class="btn">
                            <button class="btn-prev" name="btn-prev">Previous</button>
                            <button class="btn-sub" name="btnSubmit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- End Form -->
        </div>
        <!-- End Container -->
    </section>


    <script>
        const prevBtn = document.querySelectorAll('.btn-prev');
        const nextBtn = document.querySelectorAll('.btn-nxt');
        const subBtn = document.querySelector('.btn-sub');
        const progress = document.getElementById('progress');
        const formSteps = document.querySelectorAll('.steps');
        const progressSteps = document.querySelectorAll('.progress-step');

        const form = document.getElementById('form');
        const dataValid = document.querySelectorAll('[data-validation]');

        let currentStep = 0;

        //next button
        nextBtn.forEach(btn => {
            btn.addEventListener('click', function(e) {
                currentStep++;
                updateFormSteps();
                updateProgress();
                inputValue();
            });
        });

        //previous button
        prevBtn.forEach(btn => {
            btn.addEventListener('click', function(e) {
                currentStep--;
                updateFormSteps();
                updateProgress();
            });
        });

        //update form steps
        function updateFormSteps() {
            formSteps.forEach(step => {
                step.classList.remove('active');
            });
            formSteps[currentStep].classList.add('active');
            // progress.style.width = `${(currentStep + 1) * 25}%`;

        }
        //update progress bar
        function updateProgress() {
            progressSteps.forEach((steps, index) => {
                if (index <= currentStep) {
                    steps.classList.add('progress-active');
                } else {
                    steps.classList.remove('progress-active');
                }
            });

            const progressActive = document.querySelectorAll('.progress-active');

            progress.style.width = ((progressActive.length - 1) / (progressSteps.length - 1)) * 85 + '%';
        }


        //input value
        // function inputValue(){
        //     dataValid.foreach(validValue =>{
        //         if(validValue === 'firstname' && document.getElementById('firstname').value === ''){
        //             dataValid.textContent = 'Firstname is required';
        //         }
        //         if(validValue === 'middlename' && document.getElementById('middlename').value === ''){
        //             dataValid.textContent = 'Middle name is required';
        //         }
        //         if(validValue === 'lastname' && document.getElementById('lastname').value === ''){
        //             dataValid.textContent = 'Lastname is required';
        //         }
        //     })
        // }
    </script>

</body>

</html>
