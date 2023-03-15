<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user_team_name'])) {
    $team_name = $_SESSION['user_team_name'];
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Fantasy Home Page</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Custom styles for this template -->
    <link href="./myStyle.css" rel="stylesheet">

    <style>
        .map-container {
            position: relative;
            padding-bottom: 56.25%;
            height: 0;
            overflow: hidden;
        }

        .map-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <?php require('header.php'); ?>
    <main class="container-fluid">
        <div class="container" style="color: black;">
            <div class="row">
                <ol class="col-12 breadcrumb">
                    <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                    <li class="breadcrumb-item active">Contact Us</li>
                </ol>
                <div class="col-12">
                    <h3>Contact Us</h3>
                    <hr>
                </div>
            </div>

            <div class="row row-content">
                <div class="col-12">
                    <h3>Location Information</h3>
                </div>
                <div class="col-12 col-sm-4 offset-sm-1">
                    <h5>Our Address</h5>
                    <address style="font-size: 100%">
                        8, Oriel House<br>
                        Dublin Road, Dundalk<br>
                        Louth, Ireland.<br>
                        <i class="fa fa-phone"></i>: +353 85 2155 782<br>
                        <i class="fa fa-fax"></i>: +353 85 2155 782<br>
                        <i class="fa fa-envelope"></i>:
                        <a href="mailto:d00251785@student.dkit.ie">d00251785@student.dkit.ie</a>
                    </address>
                </div>
                <div class="col-12 col-sm-6 offset-sm-1 mb-3">
                    <h5>Map of our Location</h5>
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9383.600612463533!2d-6.40681236715206!3d53.98679629844613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4860cc116af05e6f%3A0x9e3abcb109894861!2sMarshes%20Upper%2C%20Dundalk%2C%20Co.%20Louth%2C%20A91%20E5X9!5e0!3m2!1sen!2sie!4v1677852533988!5m2!1sen!2sie" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <div class="col-12 col-sm-11 offset-sm-1">
                    <div class="btn-group" role="group">
                        <!-- the btn-primary and btn -info are bootstrap classes for colors -->
                        <a role="button" href="tel:+353852155782" class="btn btn-primary"><i class="fa fa-phone"></i> Call</a>
                        <a role="button" href="" class="btn btn-info"><i class="fa fa-skype"></i> Skype</a>
                        <a role="button" href="mailto:d00251785@student.dkit.ie" class="btn btn-success"><i class="fa fa-envelope-o"></i> Email</a>
                    </div>
                </div>
            </div>

            <div class="row row-content mt-3 mb-3">
                <div class="col-12">
                    <h3>Send us your Feedback</h3>
                </div>
                <div class="col-12 col-md-9">
                    <form action="contact-form-handler.php" id="feedbackForm" name="feedbackForm" method="post" onkeyup="return hideErrors()" onsubmit="return validateForm()" class="p-4 mx-auto border rounded" style="max-width: 600px;">
                        <div class="form-group mb-2">
                            <label for="firstname">First Name*</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
                        </div>
                        <div id="firstnameError" style="display: none; color: red;"></div>

                        <div class="form-group mb-2">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
                        </div>
                        <div id="lastnameError" style="display: none; color: red;"></div>

                        <div class="form-group mb-2 ">
                            <label for="email">Email*</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div id="emailError" style="display: none; color: red;"></div>

                        <div class="form-group row mb-2">
                            <label for="telnum" class="col-md-2 col-form-label">Contact Tel.</label>
                            <div class="col-md-10">
                                <input type="tel" class="form-control" id="telnum" name="telnum" placeholder="Tel. number">
                            </div>
                        </div>
                        <div id="telnumError" style="display: none; color: red;"></div>

                        <div class="form-group row mb-2">
                            <label for="phonetype" class="col-md-2 col-form-label">Phone Type</label>
                            <div class="col-md-10">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="phonetype" value="Mobile" checked>Mobile
                                    </label>
                                </div>


                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="phonetype" value="Home">Home
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group mb-2">
                            <label for="address1">Address Line 1*</label>
                            <input type="text" class="form-control" id="address1" name="address1" placeholder="Address Line 1" required>
                        </div>
                        <div id="address1Error" style="display: none; color: red;"></div>

                        <div class="form-group mb-3">
                            <label for="address2">Address Line 2</label>
                            <input type="text" class="form-control" id="address2" name="address2" placeholder="Address Line 2">
                        </div>


                        <div class="form-group row mb-4">
                            <label for="city" class="col-md-2 col-form-label">City</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="city" name="city" placeholder="City">
                            </div>
                            <div id="cityError" style="display: none; color: red;"></div>

                            <label for="county" class="col-md-2 col-form-label">County</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="county" name="county" placeholder="County">
                            </div>
                            <div id="countyError" style="display: none; color: red;"></div>
                        </div>


                        <div class="form-group row mb-2">

                            <label for="country" class="col-md-2 col-form-label">Country*</label>
                            <div class="col-md-4">
                                <select class="form-control" id="country" name="country" required>
                                    <option value="">Select your country</option>
                                    <option value="United States">United States</option>
                                    <option value="Canada">Canada</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="France">France</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Australia">Australia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div id="countryError" style="display: none; color: red;"></div>

                            <label for="postcode" class="col-md-2 col-form-label">Postcode*</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode" required>
                            </div>
                            <div id="postcodeError" style="display: none; color: red;"></div>
                        </div>


                        <div class="form-group mb-2">
                            <label for="feedback" class="col-md-3 col-form-label">Your Feedback</label>
                            <div class="col-md-10">
                                <textarea class="form-control" id="feedback" name="feedback" rows="12" required></textarea>
                            </div>
                            <div id="feedbackError" style="display: none; color: red;"></div>

                        </div>

                        <div id="error" style="display: none; color: red;"></div>

                        <div class="form-group row">
                            <div class="col-md-2"></div>
                            <div class="col-md-10 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>


                    </form>

                </div>
                <div class=" col-12 col-md">
                </div>
            </div>

        </div>
    </main><!-- /.container -->
    <div class="b-example-divider"></div>
    <?php require('footer.php'); ?>
    <script>
        function validateForm() {
            let firstname = document.getElementById('firstname').value;
            let lastname = document.getElementById('lastname').value;
            let email = document.getElementById('email').value;
            let telnum = document.getElementById('telnum').value;
            let address1 = document.getElementById('address1').value;
            let city = document.getElementById('city').value;
            let county = document.getElementById('county').value;
            let country = document.getElementById('country').value;
            let postcode = document.getElementById('postcode').value;
            let feedback = document.getElementById('feedback').value;
            let phonetype = document.getElementsByName('phonetype').value;




            //lets make specific error messages for each field with good regex patterns
            let firstnameRegex = /^[a-zA-Z]+$/;
            let lastnameRegex = /^[a-zA-Z]+$/;
            let emailRegex = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
            let telnumRegex = /^\+353[-\s]?\d{9}$/;
            let address1Regex = /^[a-zA-Z0-9\s\.,\-\/\\()']+$/;
            let cityRegex = /^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/;
            let countyRegex = /\b(Co\.?\s)?(antrim|armagh|carlow|cavan|clare|cork|derry|donegal|down|dublin|fermanagh|galway|kerry|kildare|kilkenny|laois|leitrim|limerick|longford|louth|mayo|meath|monaghan|offaly|roscommon|sligo|tipperary|tyrone|waterford|westmeath|wexford|wicklow)\b/;
            let postcodeRegex = /^(D6W|D6WF|D8W|D10|D12|D14|D16|D18|D20|D22|D24|A41|A42|A45|A63|A67|A75|A91|C15|D01|D02|D03|D04|D05|D06|D07|D08|D09|D11|D13|D15|D17|E21|E25|E32|E34|E41|E45|E53|E91|F12|F23|F26|F28|F31|F35|F42|F45|F52|F56|F91|H12|H14|H16|H18|H23|H53|H54|H62|H65|H71|H91|K32|K34|K36|K45|K56|K67|K78|K79|N37|N39|N41|N91|P12|P14|P17|P24|P25|P31|P32|P36|P43|P47|P51|P56|R14|R21|R32|R35|R42|R45|R51|T12|T23|T34|T45|T56|V14|V15|V23|V31|V35|V42|V92)[A-Z0-9]{4}$/;
            let feedbackRegex = /^[a-zA-Z0-9\s,'-]*$/;
            if (firstname == "" || email == "" || feedback == "") {
                document.getElementById("error").innerHTML = "Please fill out all required fields.";
                document.getElementById("error").style.display = "block";
                return false;
            }

            //lets check if the fields are empty
            if (firstname == "" || !firstnameRegex.test(firstname)) {
                document.getElementById("error").innerHTML = "Please enter a valid first name";
                document.getElementById("error").style.display = "block";
                document.feedbackForm.firstname.focus();
                //make the input bar red
                document.getElementById("firstname").style.borderColor = "red";
                return false;
            }



            if (!lastnameRegex.test(lastname)) {
                document.getElementById("error").innerHTML = "Please enter a valid last name";
                document.getElementById("error").style.display = "block";
                document.feedbackForm.lastname.focus();
                return false;
            }

            if (email == "" || !emailRegex.test(email)) {
                document.getElementById("error").innerHTML = "Please enter a valid email";
                document.getElementById("error").style.display = "block";
                document.feedbackForm.email.focus();
                return false;
            }

            if (!telnumRegex.test(telnum)) {
                document.getElementById("error").innerHTML = "Please enter a valid phone number";
                document.getElementById("error").style.display = "block";
                document.feedbackForm.telnum.focus();
                return false;
            }

            if (address1 == "" || !address1Regex.test(address1)) {
                document.getElementById("error").innerHTML = "Please enter a valid address";
                document.getElementById("error").style.display = "block";
                document.feedbackForm.address1.focus();
                return false;
            }

            if (!cityRegex.test(city)) {
                document.getElementById("error").innerHTML = "Please enter a valid city";
                document.getElementById("error").style.display = "block";
                document.feedbackForm.city.focus();
                return false;
            }

            if (county == "" || !countyRegex.test(county)) {
                document.getElementById("error").innerHTML = "Please enter a valid county";
                document.getElementById("error").style.display = "block";
                document.feedbackForm.county.focus();
                return false;
            }

            if (country == "") {
                document.getElementById("error").innerHTML = "Please Select A country";
                document.getElementById("error").style.display = "block";
                document.feedbackForm.country.focus();
                return false;
            }

            if (postcode == "" || !postcodeRegex.test(postcode)) {
                document.getElementById("error").innerHTML = "Please enter a valid postcode";
                document.getElementById("error").style.display = "block";
                document.feedbackForm.postcode.focus();
                return false;
            }

            if (feedback == "" || !feedbackRegex.test(feedback)) {
                document.getElementById("error").innerHTML = "Please enter a  feedback";
                document.getElementById("error").style.display = "block";
                document.feedbackForm.feedback.focus();
                return false;
            }



            //if all the fields are valid, then return true
            return true;

        }
        //lets hide the error messages when the user starts typing and the field is valid
        function hideErrors() {
            document.getElementById("error").style.display = "none";
            document.getElementById("firstnameError").style.display = "none";
            document.getElementById("lastnameError").style.display = "none";
            document.getElementById("emailError").style.display = "none";
            document.getElementById("telnumError").style.display = "none";
            document.getElementById("address1Error").style.display = "none";
            document.getElementById("cityError").style.display = "none";
            document.getElementById("countyError").style.display = "none";
            document.getElementById("countryError").style.display = "none";
            document.getElementById("postcodeError").style.display = "none";
            document.getElementById("feedbackError").style.display = "none";
        }

        //the hide errors function will be called when the user starts typing in the field by using the onkeyup event handler 
        //and the validate function will be called when the user submits the form by using the onsubmit event handler
        // document.getElementById("contactForm").onsubmit = validate;
        document.getElementById("contactForm").onkeyup = hideErrors;
    </script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>