<?php
session_start();
$conn = mysqli_connect("localhost", "admin", "admin", "gym");
if (mysqli_connect_errno()) {
    die("Connection failed.");
}
if(count($_POST)>0) {
 $name = $_POST['name'];
 $pass = $_POST['password'];
 $pass2 = $_POST['password2'];
 $email = $_POST['email'];
 $mobile = $_POST['mobile'];
 $admin = $_POST['admin'];
 $sql0 = "select * from accounts where email = '$email';";
 $result = $conn->query($sql0);
if ($result->num_rows > 0) {
    $_SESSION['manage_site_user_accounts'] = true;
	$_SESSION['emailExists']= true;
	mysqli_close($conn);
	header("Location: ../home.php");
}
else {
 if($pass == $pass2 ){
  $sql = "INSERT INTO accounts VALUES (NULL, '$name', '$email', '$pass', '$mobile','$admin');";
if (mysqli_query($conn, $sql))
{
 $_SESSION['manage_site_user_accounts'] = true;
 $_SESSION['registermessage']= true;
 mysqli_close($conn);
 header("Location: ../home.php");
}
else
{
 mysqli_close($conn);
 echo "<h5>an error has occured! <a href=../home.php>Click here to return to the previous page.</a></h5>";
}
}
else {
    $_SESSION['manage_site_user_accounts'] = true;
	$_SESSION['unmatchedpasswords']= true;
	mysqli_close($conn);
	header("Location: ../home.php");
	}
}
};
?>