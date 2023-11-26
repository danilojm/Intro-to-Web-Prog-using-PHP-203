<?php
session_start();
require_once "../../db/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT id, password, is_admin FROM users WHERE username = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $user_id, $hashed_password, $is_admin);
            if (mysqli_stmt_fetch($stmt)) {
                if (password_verify($password, $hashed_password)) {
                    // Password is correct, create a session
                    $_SESSION["user_id"] = $user_id;
                    $_SESSION["is_admin"] = $is_admin;
                    
                    $sql = "SELECT id, password, is_admin FROM users WHERE username = ?";
                    
                    header("location: /php/welcome.php"); // Redirect to a welcome page
                } else {
                    echo "<script>alert('Incorrect password'); window.location.href = '/php/pages/login/login.html';</script>";
                }
            }
        } else {
            echo "<script>alert('Username not found.'); window.location.href = '/php/pages/login/login.html';</script>";
        }
        mysqli_stmt_close($stmt);
    }
}
?>
