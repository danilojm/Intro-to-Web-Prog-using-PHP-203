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
    <title>Georgian User Edit</title>
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
                        echo '<li><a href="../employee/employees.php">Add Employee</a></li>';
                    }
                    ?>
                    <li><a href="../employee/view_employees.php">View Employees</a></li>
                    <li><a href="view_users.php">View Users</a></li>
                </ul>
                <ul class="right-nav">
                    <li class="logout-link"><a href="../../pages/logout/logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <form method="post" action="update_user.php">
        <h1>Edit User</h1>

        <?php
        include("../../db/db_connect.php");

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
            $id = $_GET["id"];

            $sql = "SELECT * FROM users WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<input type="hidden" name="id" value="' . $row["id"] . '">';
                echo 'First Name: <input type="text" name="first_name" value="' . $row["first_name"] . '"><br>';
                echo 'Last Name: <input type="text" name="last_name" value="' . $row["last_name"] . '"><br>';
                echo 'Birthday: <input type="date" name="birthday" value="' . $row["birthday"] . '"><br>';
                echo 'Username: <input type="text" name="username" value="' . $row["username"] . '"><br>';
                echo 'Password: <input type="password"  class="edit-password" name="password" required><br>';
                echo '<input type="hidden" name="is_admin" value="0">'; // Hidden input for unchecked checkbox
                echo 'Is Admin: <input type="checkbox" name="is_admin" ' . ($row["is_admin"] == 1 ? 'checked' : '') . ' value="1" /><br>';
                echo '<button type="submit">Update User</button>';
            } else {
                echo "User not found.";
            }
        } else {
            echo "Invalid request.";
        }

        $conn->close();
        ?>
    </form>

    <footer>
        &copy;
        <?php echo date("Y"); ?> Intro to Web Prog using PHP - 203 | Danilo Mendes de Oliveira | Student Nº 200549002 |
        Georgian@ILAC | Professor Dr. Gurleen Kaur
    </footer>
</body>

</html>