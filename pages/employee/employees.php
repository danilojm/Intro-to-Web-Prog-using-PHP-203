<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("location: /php/pages/login/login.html"); // Redirect to login page if not logged in
    exit;
}
$is_admin = 0;

if (isset($_SESSION["is_admin"])) {
    $is_admin = $_SESSION["is_admin"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../../css/styles.css">
    <title>Georgian Employee Register</title>
</head>

<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="../../images/logo.jpg" alt="Danilo S.A.">
            </div>
            <nav>
                <ul class="left-nav">
                    <li><a href="../../welcome.php">Home</a></li>
                    <?php
                    if ($is_admin == 1) {
                        echo '<li><a href="employees.php">Add Employee</a></li>';
                    }
                    ?>
                    <li><a href="view_employees.php">View Employees</a></li>
                    <li><a href="../users/view_users.php">View Users</a></li>
                </ul>
                <ul class="right-nav">
                    <li class="logout-link"><a href="../../pages/logout/logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>


    <form action="create_employee.php" method="POST" enctype="multipart/form-data">

        <h1>Add Employee</h1>

        <label for="first_name">Employee Name:</label>
        <input type="text" id="first_name" name="first_name" autocomplete="off" placeholder="First Name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" autocomplete="off" placeholder="Last Worked" required>

        <label for="company_name">Company's Name:</label>
        <input type="text" id="company_name" name="company_name" autocomplete="off" placeholder="Company's Name" required>

        <label for="hours_worked">Hours Worked:</label>
        <input type="text" id="hours_worked" name="hours_worked" autocomplete="off" placeholder="Hours Worked" required>

        <label for="image">Profile Image:</label>
        <input type="file" id="image" name="image" accept="image/png, image/gif, image/jpeg" required />
        <br />

        <br><br>
        <?php
        if ($is_admin == 1) {
            echo '<button type="submit">Add Employee</button>';
        } else {
            echo '<button type="submit" disabled>Add Employee</button>';
        }
        ?>
    </form>

    <footer>
        &copy;
        <?php echo date("Y"); ?> Intro to Web Prog using PHP - 203 | Danilo Mendes de Oliveira | Student Nº 200549002 |
        Georgian@ILAC | Professor Dr. Gurleen Kaur
    </footer>
</body>

</html>