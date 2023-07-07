<?php
  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');

 
  if(!empty($_GET['id'])):
    include "data/database.php";
    $cart_id = $_GET['id'];
    $quantity = $_GET['quantity'];
    $stmt = $conn->prepare("UPDATE carts SET quantity = ? WHERE id = ?");
    $stmt->bind_param('ii',$quantity,$cart_id);
    $stmt->execute();
    $stmt->close();
    $output = ['messenger'=>"Đã tăng",'status'=>1]; 
    echo json_encode($output);
  else:
    $output = ['messenger'=>"Có lỗi xảy ra",'status'=>0];
    echo json_encode($output);  
  endif;
?>