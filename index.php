<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/styles.css">
    <title>Georgian Employee Register</title>
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


    <form action="create_employee.php" method="POST">

        <h1>Add Employee</h1>

        <label for="first_name">Employee Name:</label>
        <input type="text" id="first_name" name="first_name" placeholder="First Name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" placeholder="Last Worked" required>

        <label for="company_name">Company's Name:</label>
        <input type="text" id="company_name" name="company_name" placeholder="Company's Name" required>

        <label for="hours_worked">Hours Worked:</label>
        <input type="text" id="hours_worked" name="hours_worked" placeholder="Hours Worked" required>

        <br><br>

        <button type="submit">Add Employee</button>
    </form>

    <footer>
        &copy;
        <?php echo date("Y"); ?> Intro to Web Prog using PHP - 203 | Danilo Mendes de Oliveira | Student Nº 200549002 |
        Georgian@ILAC | Professor Dr. Gurleen Kaur
    </footer>
</body>

</html>