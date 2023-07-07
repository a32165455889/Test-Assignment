<?php 
header("Accss-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include '../db.php';
try {

    $attractions = array();
    foreach($dbh->query("SELECT * from buy LEFT JOIN product
        ON buy.product_id=product.product_id;") as $row) {
        array_push($attractions,array(
            'id' =>$row['product_id'],
            'fname' =>$row['buy_fname'],
            'lname' =>$row['buy_lname'],
            'gender' =>$row['product_gender'],
            'style' =>$row['product_style'],
            'size' =>$row['product_size'],
            'price' =>$row['product_price'],
            'address' =>$row['address'],
            'status' =>$row['status'],
            'date' =>$row['date'],
        ));

     
    }
    echo json_encode($attractions);
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>