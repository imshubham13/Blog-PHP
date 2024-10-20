<?php
    $conn = mysqli_connect("localhost","root","","blogdb");

    if($conn)
    {
        echo "Connection Successfully";
    }else{
        die(mysqli_error("Error ====>"+$conn));
    }
?>