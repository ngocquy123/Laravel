<?php
  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');

  include "data/database.php";
   $query = $conn->query("SELECT S.name,S.image,S.price,color,C.id,C.quantity FROM shoes S join carts C ON S.id = C.product_id");
    $data = [];
    $output = '';
   if($query->num_rows > 0):
    while($row = $query->fetch_assoc()):
        $data[] = $row;
    endwhile; 
        $output = ['status'=>1,'data'=>$data];
    else:
        $output = ['messenger'=>'Your cart is empty.','data'=>0];
    endif; 
    echo json_encode($output);
?>