<?php
session_start();
$date = $_POST['date'];
$conn = mysqli_connect("localhost", "admin", "admin", "gym");
if (mysqli_connect_errno()) {
    die("Connection failed.");
    echo "<h5>an error 0 has occured! <a href=../home.php>Click here to return to the previous page.</a></h5>";
}
$sql = "INSERT INTO mbooking VALUES(NULL,".$_SESSION['id'].", '$date');";
if (mysqli_query($conn, $sql))
{
$_SESSION['booking'] = true;
$_SESSION['bookingsuccess']= true;
mysqli_close($conn);
header("Location: ../home.php");
}
$_SESSION['booking'] = true;
mysqli_close($conn);
echo "<br><h5>an error 2 has occured! <a href=../home.php>Click here to return to the previous page.</a></h5>";
?>