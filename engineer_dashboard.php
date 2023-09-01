


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Engineer Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        #container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 20px;
            font-size: 24px;
        }

        .logout-form {
            margin-top: 20px;
            text-align: center;
        }

        .logout-btn {
            padding: 8px 16px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo '<div id="container">';
        if (isset($loginPrompt)) {
            echo '<p>' . $loginPrompt . '</p>';
        } else {
            echo '<h1>Welcome to the Engineer Dashboard, ' . $_SESSION['username'] . '!</h1>';
            // Rest of your engineer dashboard content here...
            echo '<form class="logout-form" action="logout.php" method="post">';
            echo '<input type="submit" class="logout-btn" value="Logout">';
            echo '</form>';
        }
        echo '</div>';
    }
    else {
       echo "<h1>Please log in to access the dashboard.</h1>";
   }
   ?>

</body>
</html>

