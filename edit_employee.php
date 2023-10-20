<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/styles.css">
    <title>Georgian Employee Edit</title>
</head>

<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <img src="images/logo.jpg" alt="Danilo S.A.">
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="view_employees.php">View Employees</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <body>
        <form method="post" action="update_employee.php">
            <h1>Edit Employee</h1>

            <?php
            include("db/db_connect.php");

            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
                $id = $_GET["id"];

                $sql = "SELECT * FROM employees WHERE id = $id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo '<input type="hidden" name="id" value="' . $row["id"] . '">';
                    echo 'First Name: <input type="text" name="first_name" value="' . $row["first_name"] . '"><br>';
                    echo 'Last Name: <input type="text" name="last_name" value="' . $row["last_name"] . '"><br>';
                    echo 'Company Name: <input type="text" name="company_name" value="' . $row["company_name"] . '"><br>';
                    echo 'Hours Worked: <input type="text" name="hours_worked" value="' . $row["hours_worked"] . '"><br>';
                    echo '<button type="submit">Update</button>';
                } else {
                    echo "Employee not found.";
                }
            } else {
                echo "Invalid request.";
            }

            $conn->close();
            ?>
        </form>
    </body>
    <footer>
        &copy;
        <?php echo date("Y"); ?> Intro to Web Prog using PHP - 203 | Danilo Mendes de Oliveira | Student Nº 200549002 |
        Georgian@ILAC | Professor Dr. Gurleen Kaur
    </footer>
</body>

</html>
