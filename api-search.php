<?php 
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: GET');

// from input

// $data = json_decode(file_get_contents("php://input"), true);
 
// $search_value = $data['search'];


// from url

$search_value = isset($_GET['search']) ? $_GET['search'] : die();


include "db.php";

$sql = "SELECT * FROM students WHERE name LIKE '%{$search_value}%' order by id desc";

$result = mysqli_query($conn,$sql);


if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode($output);

} else {
    echo json_encode(array('message'=>'No Search Found!', 'status' => false));
}





?>