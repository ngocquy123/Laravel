<?php 
    $conn = new mysqli("localhost","root","","intern-php") or die('Connect Database Failed');
    if($conn->error):
        return "Kết nối database thất bại". $conn->error;
    else:
        return false;
    endif;
?>