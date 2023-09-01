<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>User Dashboard</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <?php
            session_start();
            
            if(isset($_SESSION['username'])) {
                $username = $_SESSION['username'];

                $servername = "localhost";
                $db_username = "root";
                $db_password = "";
                $database = "registerform";

                // Create connection
                $conn = new mysqli($servername, $db_username, $db_password, $database);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $query = "SELECT * FROM register WHERE registration_id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("s", $username);

                if ($stmt->execute()) {
                    $result = $stmt->get_result();

                    if ($result->num_rows === 1) {
                        $user = $result->fetch_assoc();

                        echo "<h1>Welcome, {$user['firstname']} {$user['lastname']}!</h1>";
                        
                        echo "<h2>Your Information</h2>";
                        echo "<table>";
                        echo "<tr><th>Field</th><th>Value</th></tr>";
                        echo "<tr><td>First Name</td><td>{$user['firstname']}</td></tr>";
                        echo "<tr><td>Last Name</td><td>{$user['lastname']}</td></tr>";
                        echo "<tr><td>Mobile</td><td>{$user['mobile']}</td></tr>";
                        echo "<tr><td>Registration ID</td><td>{$user['registration_id']}</td></tr>";
                        echo "</table>";
                    } else {
                        echo "User not found.";
                    }
                } else {
                    echo "Error: " . $stmt->error;
                }+

                $stmt->close();
                $conn->close();
            } else {
                echo "<h1>Please log in to access the dashboard.</h1>";
            }
            ?>
            <p><a href="logout.php">Logout</a></p>
        </div>
    </div>
</body>
</html>

 