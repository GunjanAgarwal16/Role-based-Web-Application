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

$firstname = $_POST['first_name'];
$lastname = $_POST['last_name'];
$mobile = $_POST['mobile'];
$registration_id = $_POST['registration_id'];
// Check if the username already exists
$query = "SELECT * FROM users WHERE registration_id = '$username'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $error[] = "Username already exists. Please choose a different username.";
} else {
$password = $_POST['password'];
$user = "User";

// Hash the password (if you're storing it hashed)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$q = "INSERT INTO register (firstname, lastname, mobile, registration_id, password, User) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($q);
$stmt->bind_param("ssssss", $firstname, $lastname, $mobile, $registration_id, $hashed_password, $user);

if ($stmt->execute()) {
    // You might redirect the user to a success page here
    header("Location: home.php");
    exit(); 
} else {
    // Display a user-friendly error message
    echo "Registration failed: " . $stmt->error;
}
}
$stmt->close();
$conn->close();
?>
