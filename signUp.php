<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./signUp.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Sign Up</title>
</head>

<body>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <img src="./images/logo.png" alt="">
                </div>
                <div class="col-md-6 right">
                    <form id="signup-form" action="connect.php" method="post" onsubmit="return validateForm()">
                        <div class="input-box">
                            <header>Create account</header>
                            <div class="input-field">
                                <input type="text" class="input" id="team_name" name="team_name" required autocomplete="off">
                                <label for="team_name">Team Name</label>
                            </div>
                            <div class="input-field">
                                <input type="email" class="input" id="email" name="email" required autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                <label for="email">Email</label>
                                <span id="email-error" class="error-message"></span>
                            </div>
                            <div class="input-field">
                                <input type="password" class="input" id="password" name="password" required minlength="8">
                                <label for="password">Password</label>
                                <span id="password-error" class="error-message"></span>
                            </div>
                            <div class="input-field">
                                <input type="password" class="input" id="password_confirmation" name="password_confirmation" required minlength="8">
                                <label for="password_confirmation">Confirm Password</label>
                                <span id="password-error" class="error-message"></span>
                            </div>
                            <div class="input-field">
                                <input type="submit" class="submit" value="Sign Up">
                            </div>
                            <div class="signin">
                                <span>Already have an account? <a href="index.php#log">Log in here</a></span>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        function validateForm() {
            let email = document.getElementById("email");
            let password = document.getElementById("password");
            let emailError = document.getElementById("email-error");
            let passwordError = document.getElementById("password-error");

            let isValid = true;

            if (!document.getElementById("signup-form").checkValidity()) {
                isValid = false;
            }

            if (!email.checkValidity()) {
                emailError.innerText = "Please enter a valid email";
                emailError.style.display = "block";
                isValid = false;
            } else {
                emailError.innerText = "";
                emailError.style.display = "none";
            }

            if (!password.checkValidity()) {
                passwordError.innerText = "Please enter a password of at least 8 characters";
                passwordError.style.display = "block";
                isValid = false;
            } else {
                passwordError.innerText = "";
                passwordError.style.display = "none";
            }

            return isValid;
        }
    </script>
</body>

</html>