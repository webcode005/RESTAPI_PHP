<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


$data = json_decode(file_get_contents("php://input"), true);
 
$student_name = $data['sname'];
$student_email = $data['semail'];
$student_mobile = $data['smobile'];

include "db.php";

$sql = "INSERT INTO students (name,email,mobile) VALUES ('{$student_name}','{$student_email}','{$student_mobile}') ";


if (mysqli_query($conn,$sql)) {
    echo json_encode(array('message'=>'Student Record Inserted!', 'status' => true));

} else {
    echo json_encode(array('message'=>'Student Record Not Inserted!', 'status' => false));
}





?>