<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <h1 class="title">Login</h1>
            <form class="form" method="post" action="register_login.php">
                <div class="input-field">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" placeholder="Enter your username" required>
                </div>
                <div class="input-field">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password" required>
                </div>
                <div class="submit">
                    <input type="submit" value="Login">
                 </div>
            </form>

            <p>Don't have an account? <a href="registration_form.php">Register here</a></p>
        </div>
    </div>
</body>
</html>
