<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    #table {
        width: 80%; /* Adjust the table width */
        margin: 20px auto; /* Center the table horizontally */
        border-collapse: collapse;
        border: 1px solid #ccc; /* Add a border to the table */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a shadow to the table */
    }

    #table th,
    #table td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ccc;
    }

    #table th {
        background-color: #ede7e1;
    }

    #table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #table td select {
        padding: 6px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 100px;
    }

    #table td input[type="submit"] {
        padding: 6px 12px;
        background-color: brown;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    #table td input[type="submit"]:hover {
        background-color: #8b0000;
    }

    h1 {
        margin-top: 20px;
        font-size: 24px;
    }

    form {
        margin-top: 20px;
    }

    .logout-btn {
        padding: 6px 12px;
        background-color: #333;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .logout-btn:hover {
        background-color: #555;
    }
    .container {
            text-align: center;
            margin: 50px auto;
            max-width: 800px; /* Adjust the maximum width of the container */
        }

    .container h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

    .container .logout-btn {
            margin-top: 20px;
        }
</style>


</head>

<body>
    <?php

    session_start();

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<div class='container'>";
        echo "<h1>User Details</h1>";
        // Connecting database
        $host = "localhost";
        $db_username = "root";
        $db_password = "";
        $database = "registerform";

        $conn = mysqli_connect($host, $db_username, $db_password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Check if form is submitted for updating records
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Loop through the submitted data and update records
            foreach ($_POST["registration_id"] as $key => $registration_id) {
                $newUser = $_POST["User"][$key];

                // Update the User column in the database
                $updateQuery = "UPDATE register SET User='$newUser' WHERE registration_id='$registration_id'";
                mysqli_query($conn, $updateQuery);
            }
        }

        // Fetching user details from the database
        $query = "SELECT * FROM register WHERE User != 'Admin'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<form method='post'>";
            echo "<table id=table>";
            echo "<tr><th>Name</th><th>Mobile</th><th>Role</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["firstname"] . "</td>";
                echo "<td>" . $row["mobile"] . "</td>";
                echo "<td>";
                echo "<input type='hidden' name='registration_id[]' value='" . $row["registration_id"] . "'>";
                echo "<select name='User[]'>";
                echo "<option value='user'" . ($row["User"] == "user" ? " selected" : "") . ">User</option>";
                echo "<option value='engineer'" . ($row["User"] == "engineer" ? " selected" : "") . ">Engineer</option>";
                echo "</select>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</table>";
            echo "<input type='submit' value='Update All'>";
            echo "</form>";
        } else {
            echo "Error fetching data: " . mysqli_error($conn);
        }
    }
    else {
        echo "<div class='container'>";
        echo "<h1>Please log in to access the dashboard.</h1>";
        echo "</div>";
    }
    ?>
    <form action="home.php" method="post">
        <input type="submit" value="Logout">
    </form>
</body>

</html>
