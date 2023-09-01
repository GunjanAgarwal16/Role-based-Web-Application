<?php
// Connecting database
$host = "localhost";
$username = "root";
$db_password = "";
$database = "registerform";

$conn = mysqli_connect($host, $username, $db_password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['registration_id']) && isset($_POST['User'])) {
    $uid = $_POST['registration_id'];
    $newRole = $_POST['User'];

    // Update the user's role in the database
    $updateQuery = "UPDATE register SET User = '$newRole' WHERE registration_id = '$uid'";

    if (mysqli_query($conn, $updateQuery)) {
        echo "Role updated successfully.";
        echo '<meta http-equiv="refresh" content="1;url=admin_dashboard.php">';
    } else {
        echo "Error updating role: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}


// Close the database connection
mysqli_close($conn);
