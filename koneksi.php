<?php  /* sesusi dengan database yang telah dibuat*/
    $conn = new mysqli("localhost","root","","db_web");  
    if ($conn->connect_error) {
        die ($conn->connect_error);
    };
?>