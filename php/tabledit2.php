<?php  
$connect = mysqli_connect('localhost', 'admin', 'admin', 'gym');
$input = filter_input_array(INPUT_POST);
if($input["action"] === "edit")
{
$date = mysqli_real_escape_string($connect, $input["date"]);
$query = "UPDATE `mbooking` SET `date`='".$date."' WHERE inc =".$input["inc"].";";
 mysqli_query($connect, $query);
};
if($input["action"] === "delete")
{
 $query ="DELETE FROM `mbooking`
 WHERE inc = ".$input['inc'].";";
 mysqli_query($connect, $query);
};
echo json_encode($input);
?>