<?php
include("config.php"); //connect in databse

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = htmlspecialchars($_POST["id"]);
    $fullname = htmlspecialchars($_POST["fullname"]);
    $age = htmlspecialchars($_POST["age"]);
    $email = htmlspecialchars($_POST["email"]);
    $course = htmlspecialchars($_POST["course"]);
    $school = htmlspecialchars($_POST["school"]);

    //if fields is empty
    if (empty($fullname) || empty($age) || empty($email) || empty($course) || empty($school)) {
        header("Location: index.php");
        exit();
    }

    $sql = "INSERT INTO people (ID, Name, Age, Email, Course, School) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    
    mysqli_stmt_bind_param($stmt, 'isisss', $id, $fullname, $age, $email, $course, $school);
    
    // Executestatement
    if (mysqli_stmt_execute($stmt)) {
        echo "Record inserted successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);

    // back to the index page
    header("Location: index.php");
    exit();
} else {
    header("Location: index.php");
}
?>
