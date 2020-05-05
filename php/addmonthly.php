<?php
session_start();
$date = $_POST['date'];
$id = $_POST['id'];
$conn = mysqli_connect("localhost", "admin", "admin", "gym");
if (mysqli_connect_errno()) {
    die("Connection failed.");
    echo "<h5>an error 0 has occured! <a href=../home.php>Click here to return to the previous page.</a></h5>";
}
$sql = "INSERT INTO mbooking VALUES(NULL, $id , '$date');";
if (mysqli_query($conn, $sql))
{
$_SESSION['manage_site_monthly'] = true;
mysqli_close($conn);
header("Location: ../home.php");
}
$_SESSION['manage_site_monthly'] = true;
mysqli_close($conn);
echo "<br><h5>an error 2 has occured! <a href=../home.php>Click here to return to the previous page.</a></h5>";
?>