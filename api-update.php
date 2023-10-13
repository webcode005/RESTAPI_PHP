<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


$data = json_decode(file_get_contents("php://input"), true);
 
$student_id = $data['sid'];
$student_name = $data['sname'];
$student_email = $data['semail'];
$student_mobile = $data['smobile'];

include "db.php";

$sql = "UPDATE students SET name = '{$student_name}',email ='{$student_email}',mobile= '{$student_mobile}' WHERE id ='{$student_id}'";


if (mysqli_query($conn,$sql)) {
    echo json_encode(array('message'=>'Student Record Updated!', 'status' => true));

} else {
    echo json_encode(array('message'=>'Student Record Not Updated!', 'status' => false));
}





?>