<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registration Form</title>
</head>
<body>
    <div class="wrapper">
        <form class="form" method="post" action="register.php" id="register_form">
            <div class="container">
                <h1 class="title">Registration Form</h1>
                <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
                ?>

                <div class="input-field">
                    First Name : 
                    <input type="text" class="input" name="first_name" id="first_name" placeholder="Enter First Name" required><br><br>
                </div>
                <div class="input-field">
                    Last Name : 
                    <input type="text" class="input" name="last_name" id="last_name" placeholder="Enter Last Name" required><br><br>
                </div>
                <div class="input-field">
                    Mobile No. : 
                    <input type="number" class="input" name="mobile" id="mobile" placeholder="Enter Phone Number" required><br><br>
                </div>
                <div class="input-field">
                    Registration ID : 
                    <input type="text" class="input" name="registration_id" id="registration_id" placeholder="Enter Registration ID" required><br><br>
                </div>
                <div class="input-field">
                    Password : 
                    <input type="password" class="input" name="password" id="password" placeholder="Enter password" required><br><br>
                </div>
                <div class="input-field">
                    Confirm Password : 
                    <input type="password" class="input" name="confirm_password" id="confirm_password" placeholder="Confirm password" required>
                    <span id="password_error" class="error-msg"></span>
                </div>
            </div>
            <div class="submit">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("register_form");
            const passwordInput = document.getElementById("password");
            const confirmPasswordInput = document.getElementById("confirm_password");
            const passwordError = document.getElementById("password_error");

            form.addEventListener("submit", function (event) {
                if (passwordInput.value !== confirmPasswordInput.value) {
                    passwordError.textContent = "Passwords do not match";
                    event.preventDefault(); // Prevent form submission
                }
            });

            // Clear password error message when user starts typing
            passwordInput.addEventListener("input", function () {
                passwordError.textContent = "";
            });

            confirmPasswordInput.addEventListener("input", function () {
                passwordError.textContent = "";
            });
            form.addEventListener("submit", function (event) {
            const firstNameInput = document.getElementById("first_name");
            const lastNameInput = document.getElementById("last_name");
            // ... (other inputs)

            let isValid = true;

            if (!firstNameInput.value) {
                firstNameError.textContent = "First name is required";
                isValid = false;
            }

            if (!lastNameInput.value) {
                lastNameError.textContent = "Last name is required";
                isValid = false;
            }

            // ... (other validations)

            if (!isValid) {
                event.preventDefault(); // Prevent form submission
            }
});


        });
    </script>
</body>
</html>

