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
    <title>Georgian Employee List</title>
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
                        echo '<li><a href="pages/employee/employees.php">Add Employee</a></li>';
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

    <body>
        <form>
            <h1>User List</h1>

            <?php
            include("../../db/db_connect.php");

            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            $id_user = 0;

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Bithday</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Is Admin</th>
                        <th>Actions</th>
                      </tr>";
                while ($row = $result->fetch_assoc()) {
                    $id_user = $id_user + 1;
                    echo
                        "<tr>
                            <td>" . $id_user . "</td>
                            <td>" . $row["first_name"] . "</td>
                            <td>" . $row["last_name"] . "</td>
                            <td>" . $row["birthday"] . "</td>
                            <td>" . $row["username"] . "</td>
                            
                            <td class='password-cell'>
                                <input type='password' name='password' disabled value='" . $row["password"] . "' class='password-input'/>
                            </td>
                            
                            <td>" . ($row["is_admin"] == 1 ? 'True' : 'False') . "</td>

                            ";

                    if ($is_admin == 1) {
                        echo "<td class='buttons-collumn'>
                                        <a class='edit-button' href='edit_user.php?id=" . $row["id"] . "'>Edit</a> |
                                        <a class='delete-button' href='javascript:void(0);' onclick='confirmDelete(" . $row["id"] . ")'>Delete</a>
                                    </td>";
                    } else {
                        echo "<td class='buttons-collumn'>
                                        <a class='edit-button-disabled' >Edit</a> |
                                        <a class='delete-button-disabled' >Delete</a>
                                      </td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No records found";
            }

            $conn->close();
            ?>

            <script>
                function confirmDelete(id) {
                    var userConfirmed = confirm("Tem certeza que deseja deletar o registro?");
                    if (userConfirmed) {
                        window.location.href = 'delete_user.php?id=' + id + '&confirm=yes';
                    }
                }
            </script>
        </form>
    </body>
    <footer>
        &copy;
        <?php echo date("Y"); ?> Intro to Web Prog using PHP - 203 | Danilo Mendes de Oliveira | Student Nº 200549002 |
        Georgian@ILAC | Professor Dr. Gurleen Kaur
    </footer>
</body>

</html>