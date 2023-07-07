<?php 
header("Accss-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include '../db.php';
try {

    $attractions = array();
    foreach($dbh->query("SELECT * from product  ") as $row) {
        array_push($attractions,array(
        'id' =>$row['product_id'],
        'gender' =>$row['product_gender'],
        'style' =>$row['product_style'],
        'size' =>$row['product_size'],
        'price' =>$row['product_price'],
        ));

     
    }
    echo json_encode($attractions);
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>