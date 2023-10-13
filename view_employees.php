<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/styles.css">
    <title>Georgian Employee List</title>
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
        <form>
            <h1>Employee List</h1>

            <?php
            include("db/db_connect.php");

            $sql = "SELECT * FROM employees";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Company's Name</th>
                        <th>Hours Worked</th>
                        <th>Actions</th> <!-- Added a new column for actions -->
                      </tr>";
                while ($row = $result->fetch_assoc()) {
                    echo
                        "<tr>
                            <td>" . $row["first_name"] . "</td>
                            <td>" . $row["last_name"] . "</td>
                            <td>" . $row["company_name"] . "</td>
                            <td>" . $row["hours_worked"] . "</td>
                            <td>
                                <a class='edit-button' href='edit_employee.php?id=" . $row["id"] . "'>Edit</a> |
                                <a class='delete-button' href='delete_employee.php?id=" . $row["id"] . "'>Delete</a>
                            </td>
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "No records found";
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