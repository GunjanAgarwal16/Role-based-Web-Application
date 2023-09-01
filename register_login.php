<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "registerform";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you're submitting a form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to retrieve user details from the 'register' table
    $query = "SELECT * FROM register WHERE registration_id = ?";
  
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);  // Use 'registration_id' for login
  
    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();

            // Verify the password using password_verify
            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['User'] = $User;
                if ($user['User'] === 'Admin') {
                    header("Location: admin_dashboard.php"); // Redirect to the admin dashboard page
                } 
                elseif($user['User'] === 'engineer'){
                    header("Location: engineer_dashboard.php");
                }
                else {
                    header("Location: dashboard.php"); // Redirect to the regular user dashboard page
                }
                exit();
                // You can perform additional actions here, such as setting session variables or redirecting to a logged-in page.
            } else {
                echo "Login failed: Incorrect password";
            }
        } else {
            echo "Login failed: User not found";
        }
    } else {
        echo "Error: " . $stmt->error;
    }
// After verifying the user's credentials
// For example, assuming you have a row in the database with a 'role' field
if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role']; // Assuming 'role' is the field for user role
    // ...
}

    $stmt->close();
}
?>

