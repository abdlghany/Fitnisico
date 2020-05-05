<?php
session_start();
$conn = mysqli_connect("localhost", "admin", "admin", "gym");
if (mysqli_connect_errno()) {
    die("Connection failed.");
}
if(count($_POST)>0) {
$coachs = $_POST['coachs'];
$coach = $_POST['coach'];
$bookdate = $_POST['bookdate'];
$bookfrom = $_POST['bookfrom'];
$bookto = $_POST['bookto'];
$email = $_POST['email'];
if($coachs =='no'){$coach = null;}
$sql = "INSERT INTO booking VALUES(NULL,'$email', '$coachs', '$coach', '$bookdate', '$bookfrom','$bookto');";
if (mysqli_query($conn, $sql))
{
$_SESSION['manage_site_walk_in']= true;
mysqli_close($conn);
header("Location: ../home.php");
}
};
$_SESSION['manage_site_walk_in']= true;
mysqli_close($conn);
echo "<br><h5>an error has occured! <a href=../home.php>Click here to return to the previous page.</a></h5>";
?>