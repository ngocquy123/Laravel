<?php
  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');
  include "data/database.php";
  if(!empty($_GET['id'])):
  $product_id = $_GET['id'];
  $quantity = 1;
  $check = $conn->query("SELECT * FROM carts WHERE product_id = $product_id");
  $output = [];
  if($check->num_rows === 1):
        $output = 'Sản phẩm đã được thêm';
    else:
        $stmt = $conn->prepare("INSERT INTO carts(product_id,quantity) VALUES(?,?)");
        $stmt->bind_param('ii',$product_id,$quantity);
        $stmt->execute();
        $stmt->close();
        $output = 'success';
    endif; 
    echo json_encode($output);
else:
    echo json_encode('failed');
endif;
?>