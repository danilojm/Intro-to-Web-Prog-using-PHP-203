<?php
include("db/db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $company_name = $_POST["company_name"];
    $hours_worked = $_POST["hours_worked"];

    $sql = "INSERT INTO employees (first_name, last_name, company_name, hours_worked) VALUES ('$first_name', '$last_name', '$company_name', '$hours_worked')";

    if ($conn->query($sql) === TRUE) {
        echo "Connection successful";
        header("Location: view_employees.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
