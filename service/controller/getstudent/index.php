<?php

include_once '../../common/command/setup.php';
/* 
$data = $response->getResponse();  
$conn = $database->getConnection(); 
*/

$setId = "5916211";

$sql = "SELECT * FROM student WHERE code='$setId'";
$ps = $conn->query($sql);
$result = $ps->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
