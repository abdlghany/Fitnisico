<?php  
$connect = mysqli_connect('localhost', 'admin', 'admin', 'gym');
$input = filter_input_array(INPUT_POST);
if($input["action"] === "edit")
{
$id = $input["id"];
$name = $input["name"];
$email = $input["email"];
$password = $input["password"];
$mobile = $input["mobile"];
$admin = $input["admin"];
$query = "UPDATE `accounts` SET `name`='$name',`email`='$email',`password`='$password',`mobile`='$mobile',`admin`='$admin' WHERE id= $id;";
 mysqli_query($connect, $query);
};
if($input["action"] === "delete")
{
$id = $input['id'];
 $query ="DELETE FROM `accounts`
 WHERE id = $id;";
 mysqli_query($connect, $query);
};
echo json_encode($input);
?>