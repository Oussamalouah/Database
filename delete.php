<?php
include 'process.php';
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $sql = "delete from `data` where id=$id";
    $result = mysqli_query($mysqli,$sql);
    


}

if ($result) {
    
    header('location:php.php');
}
?>