<?php
  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');


  include "data/database.php";
   $query = $conn->query("SELECT * FROM shoes");
   
    $output = [];
   if($query->num_rows > 0):
    while($row = $query->fetch_assoc()):
        $output[] = $row;
    endwhile; 
    $output;
    else:
        $output = 'Không tìm thấy sản phẩm';
    endif; 
    echo json_encode($output);
?>