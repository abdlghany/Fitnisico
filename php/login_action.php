<?php
session_start();
$mysqli = new mysqli("localhost", "admin", "admin", "gym");
if ($mysqli->connect_error) {
    die("Connection failed.");
}
if(count($_POST)>0) {
$pass = $_POST['password'];
$email = $_POST['email'];
//selecting email disregarding case status.
$sql = "select * from accounts where LOWER(email) LIKE LOWER('$email') and password = '$pass';";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
        $_SESSION['name'] = $row["name"];
		$_SESSION['email'] = $row["email"];
        $_SESSION['id'] = $row["id"];
        $_SESSION['loggedin'] = true;
		if($row["admin"] == no){
		mysqli_close($conn);
		header("Location: ../home.php");}
		else {
		$_SESSION['userisadmin'] = true;
        $_SESSION['home'] = true;
		mysqli_close($conn);
		header("Location: ../home.php");
		}
}
}else{
	$_SESSION['loginfailed']= true;
	mysqli_close($conn);
header("Location: ../home.php");	
}
echo "<h5><a href=home.php>Click here to return to the previous page.</a></h5>";
};
?>