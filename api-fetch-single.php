<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: GET');


$data = json_decode(file_get_contents("php://input"), true);
 
$student_id = $data['sid'];

include "db.php";

$sql = "select * from students where id= {$student_id} order by id desc";

$result = mysqli_query($conn,$sql);


if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode($output);

} else {
    echo json_encode(array('message'=>'No Record Found!', 'status' => false));
}





?>