<?php
include("db/db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $company_name = $_POST["company_name"];
    $hours_worked = $_POST["hours_worked"];

    // Verifique se o usuário confirmou a alteração
    if (isset($_POST["confirm"]) && $_POST["confirm"] === "yes") {
        $sql = "UPDATE employees SET 
                first_name = '$first_name',
                last_name = '$last_name',
                company_name = '$company_name',
                hours_worked = '$hours_worked'
                WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Update Successful";
            header("Location: view_employees.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Alteração não confirmada. <a href='javascript:history.back()'>Voltar</a>";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>