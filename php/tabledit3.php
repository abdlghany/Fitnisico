<?php  
$connect = mysqli_connect('localhost', 'admin', 'admin', 'gym');
$input = filter_input_array(INPUT_POST);
if($input["action"] === "delete")
{
 $query ="DELETE FROM `inquiry`
 WHERE inc = ".$input["inc"].";";
 mysqli_query($connect, $query);
};
echo json_encode($input);
?>