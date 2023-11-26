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
  <link rel="stylesheet" href="css/styles.css" />
  <title>Georgian Employee Register</title>
</head>

<body>
  <header>
    <div class="header-container">
      <div class="logo">
        <img src="images/logo.jpg" alt="Danilo S.A." />
      </div>
      <nav>
        <ul class="left-nav">
          <li><a href="welcome.php">Home</a></li>
          <?php
          if ($is_admin == 1) {
            echo '<li><a href="pages/employee/employees.php">Add Employee</a></li>';
          }
          ?>
          <li><a href="pages/employee/view_employees.php">View Employees</a></li>
          <li><a href="pages/users/view_users.php">View Users</a></li>
        </ul>
        <ul class="right-nav">
          <li class="logout-link">
            <a href="pages/logout/logout.php">Logout</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <form>

    <h3>
      Welcome to the Georgian Employee Register
    </h3>
  </form>

  <footer>
    &copy;
    <?php echo date("Y"); ?> Intro to Web Prog using PHP - 203 | Danilo Mendes de Oliveira | Student Nº 200549002 |
    Georgian@ILAC | Professor Dr. Gurleen Kaur
  </footer>
</body>

</html>