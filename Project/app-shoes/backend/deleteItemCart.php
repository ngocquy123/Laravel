<?php
  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');

 
  if(!empty($_GET['id'])):
    include "data/database.php";
    $cart_id = $_GET['id'];
   $stmt = $conn->prepare("DELETE FROM carts WHERE id = ?");
    $stmt->bind_param('i',$cart_id);
    $stmt->execute();
    $stmt->close();
    $output = ['messenger'=>"Đã xóa sản phẩm khỏi giỏ hàng",'status'=>1]; 
    echo json_encode($output);
  else:
    $output = ['messenger'=>"Sản phẩm không có trong giỏ hàng",'status'=>0];
    echo json_encode($output);  
  endif;
?>