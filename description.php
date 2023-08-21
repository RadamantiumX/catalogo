<?php 
include('conn.php');

$catId = $_GET['id'];

$sql_id = "SELECT * FROM catalogo WHERE catID = $catId";

$id_results = mysqli_query($conn, $sql_id);

$json_results = mysqli_fetch_array($id_results);

?>

