<?php  
$connect = mysqli_connect('localhost', 'admin', 'admin', 'gym');
$input = filter_input_array(INPUT_POST);
if($input["action"] === "edit")
{
$email = mysqli_real_escape_string($connect, $input["email"]);
$coachs = mysqli_real_escape_string($connect, $input["coachs"]);
$coach = mysqli_real_escape_string($connect, $input["coach"]);
$day = mysqli_real_escape_string($connect, $input["day"]);
$fromt = mysqli_real_escape_string($connect, $input["fromT"]);
$tot = mysqli_real_escape_string($connect, $input["toT"]);
$query = "UPDATE `booking` SET `email`='".$email."',`coachs`='".$coachs."',`coach`='".$coach."',`day`='".$day."',`fromT`='".$fromt."',`toT`='".$tot."' WHERE inc =".$input["inc"].";";
 mysqli_query($connect, $query);
};
if($input["action"] === "delete")
{
 $query ="DELETE FROM `booking`
 WHERE inc = ".$input['inc'].";";
 mysqli_query($connect, $query);
};
echo json_encode($input);
?>