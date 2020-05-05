<?php
session_start();

$conn = mysqli_connect("localhost", "admin", "admin", "gym");
if (mysqli_connect_errno()) {
    die("Connection failed.");
}
if(count($_POST)>0) {
$email = $_POST['email'];
$inquiry = $_POST['inquiry'];
$sql = 'INSERT INTO inquiry VALUES(null, "'.$email.'", "'.$inquiry.'");'; //used a more complex query, in case the user uses (') when writing the inquiry. ex: (you're).
if (mysqli_query($conn, $sql))
{
$_SESSION['about_us'] = true;
$_SESSION['inquirysuccess']= true;
mysqli_close($conn);
header("Location: ../home.php");
}
};
$_SESSION['about_us'] = true;
mysqli_close($conn);
echo "<br><h5>an error has occured! <a href=../home.php>Click here to return to the previous page.</a></h5>";
?>