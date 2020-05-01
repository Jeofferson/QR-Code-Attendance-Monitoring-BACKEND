<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dateId = $_POST["dateId"];

    require_once "init.php";
    
    $sql = "DELETE FROM tbl_date WHERE id = '$dateId'";
    mysqli_query($conn, $sql);
    
    $sql = "DELETE FROM tbl_attendance WHERE date_id = '$dateId'";
    mysqli_query($conn, $sql);
    
    $output["status"] = "success";
    
    echo json_encode($output);
    mysqli_close($conn);

}


?>