<?php
include("../../db/db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $company_name = $_POST["company_name"];
    $hours_worked = $_POST["hours_worked"];

    $targetDirectory = "../../uploads/";
    $imageName = uniqid() . "_" . basename($_FILES["image"]["name"]);
    $targetFile = $targetDirectory . $imageName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an actual image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "<script>alert('File is not an image.');</script>";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "<script>alert('Sorry, file already exists.');</script>";
        $uploadOk = 0;
    }

    // Check file size (you can adjust the size as needed)
    if ($_FILES["image"]["size"] > 10000000) {
        echo "<script>alert('Sorry, your file is too large.');</script>";
        $uploadOk = 0;
    }

    // Allow only certain file formats
    $allowedFormats = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedFormats)) {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG, and GIF files are allowed.');</script>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.');</script>";
        header("Location: view_employees.php");
        exit();
    } else {


        $sql = "INSERT INTO employees (first_name, last_name, company_name, hours_worked, image_id) 
                VALUES ('$first_name', '$last_name', '$company_name', '$hours_worked', '$imageName')";

        if ($conn->query($sql) === TRUE and move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "<script>alert('Create Successful.');</script>";
            header("Location: view_employees.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }




    $conn->close();
}
?>