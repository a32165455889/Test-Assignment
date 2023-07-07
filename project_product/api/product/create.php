<?php 
header("Accss-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include '../db.php';

$data = json_decode(file_get_contents("php://input"));

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    echo json_encode(array("status" => "error"));
    die();
}
try {

    $stmt = $dbh->prepare("INSERT INTO buy (buy_fname ,
    buy_lname,product_id,address,status,date)
    VALUES (?, ?, ?, ?, 'ซื้อ', now() )");
$stmt->bindParam(1, $data->fname);
$stmt->bindParam(2, $data->lname);
$stmt->bindParam(3, $data->id);
$stmt->bindParam(4, $data->address);


if($stmt->execute()){
    echo json_encode(array("status" => "ok"));
}  else{
    echo json_encode(array("status" => "error"));
}
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>