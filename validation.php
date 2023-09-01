<?php
        $first_name = $last_name = $mobile = $registration_id = $password = $confirm_password = "";
        $password_error = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $mobile = $_POST["mobile"];
            $registration_id = $_POST["registration_id"];
            $password = $_POST["password"];
            $confirm_password = $_POST["confirm_password"];

            if ($password != $confirm_password) {
                $password_error = "Passwords do not match";
            }
        }
        ?>