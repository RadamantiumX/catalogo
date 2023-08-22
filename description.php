<?php 
include('conn.php');
$data = json_decode(file_get_contents('php://input'), true);

$brand = $data['params'];

$sql_brand = "SELECT * FROM catalogo WHERE brand = '$brand'";
$result = mysqli_query($conn, $sql_brand);
$response = array();
while($row = mysqli_fetch_assoc($result))
{
    $response[] = $row;
}

header('Content-Type: application/json');
echo json_encode($response);



