# Role-based-Web-Application
## Overview
This is a web-based User Role Management System built using HTML, CSS, PHP, and JavaScript. The system allows users to register, login, and access their respective dashboards based on their roles (normal user, engineer, or admin). Admins have the ability to view and update user roles, which are reflected in the database.

## Table of Contents

- [Features](#features)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Usage](#usage)
- [License](#license)
- [Acknowledgments](#acknowledgments)

## Features

- **User Registration**: Users can register themselves on the website.
- **Password Validation**: JavaScript is used to validate passwords during registration.
- **Role-Based Access**: Registered users are categorized into three roles - normal user, engineer, and admin. Each role has its own dashboard.
- **Admin Dashboard**: The admin can view user information and update user roles.
- **Database Integration**: User information and roles are stored in a database.
- **Security**: Unauthorized users are prevented from accessing protected dashboards.
- **Logout Functionality**: All dashboards have a logout button for easy user logout.

## Getting Started

To run this web application on your local machine using XAMPP, follow the steps below:

### Prerequisites

Before you begin, ensure you have the following software installed on your system:

- **XAMPP**: Download and install [XAMPP](https://www.apachefriends.org/index.html) if you haven't already. Make sure it includes Apache, PHP, and MySQL.

### Installation

1. Clone the repository to your local machine using Git:

   ```bash
   git clone https://github.com/GunjanAgarwal16/Role-based-Web-Application

2. Place the cloned project directory into the htdocs folder inside your XAMPP installation directory. The path may look like C:\xampp\htdocs\your-repo-name on Windows or /Applications/XAMPP/htdocs/your-repo-name on macOS.

3. Start the XAMPP Control Panel and ensure that the Apache and MySQL services are running.

4. Open a web browser and navigate to http://localhost/your-repo-name to access the application.

5. Create a MySQL database by opening phpMyAdmin, which is accessible from the XAMPP Control Panel.

6. Import the provided SQL schema file located in the database directory into your newly created database.
   
8. Rename the config.example.php file in the includes directory to config.php and update the database configuration:
   ```bash
   // includes/config.php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root'); // Use your MySQL username
   define('DB_PASS', '');     // Use your MySQL password (leave empty if none)
   define('DB_NAME', 'yourdatabase'); // Use the name of the database you created
   
9. Save the config.php file with your updated settings.

10. Refresh the web application in your browser, and it should be connected to your XAMPP MySQL database.

11. You can now register as a user and log in with the provided roles. The admin user can manage user roles in the admin dashboard.


## Usage

#### User Roles and Registration

1. **User Registration:**
   - Navigate to the registration page by clicking the "Register" link on the login page.
   - Fill in the required registration details, including username and password.
   - Ensure that your password meets the specified validation criteria (e.g., minimum length, special characters).
   - Click the "Register" button to create a new user account.

2. **User Login:**
   - On the login page, enter your registered username and password.
   - Click the "Login" button to access your dashboard.

3. **User Dashboard:**
   - Once logged in as a normal user, you will be redirected to your user dashboard.
   - Explore the features and functionality available to regular users.

#### Admin Dashboard

1. **Admin Login:**
   - On the login page, log in using the provided admin credentials (if available).
   - Alternatively, if you registered as an admin, use your admin account credentials.

2. **Admin Dashboard:**
   - Upon successful login as an admin, you will gain access to the admin dashboard.
   - In the admin dashboard, you can:
     - View a list of registered users along with their details.
     - Update user roles by changing them to either "Engineer" or "User."
     - Submit the changes to update user roles in the database.

#### Role-Based Access Control

- User roles are essential for controlling access to different parts of the application.
- As an admin, you can modify user roles from the admin dashboard.
- Once a user's role is updated by the admin, the user will have access to their respective dashboard based on their new role.

#### Log Out

- To log out from the application, simply click the "Logout" button, which is available in all dashboards.
- After logging out, you will be redirected to the login page, and you'll need to log in again to access your dashboard.

#### Security

- This application employs security measures to protect user data and ensure role-based access control.
- Unauthorized users who are not logged in will not be able to access any of the dashboards or sensitive data.

## Contributing
Contributions to this project are welcome. To contribute, please follow these guidelines:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your changes and test them thoroughly.
4. Commit your changes with clear and concise commit messages.
5. Push your changes to your fork.
6. Submit a pull request to the main repository's main branch.

## License
This project is licensed under the MIT License.










   



