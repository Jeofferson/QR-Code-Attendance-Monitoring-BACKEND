<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $classId = $_POST["classId"];

    require_once "init.php";

    $sql = "SELECT * FROM tbl_date WHERE class_id = '$classId' ORDER BY milliseconds";
    
    $result = mysqli_query($conn, $sql);

    $output["dates"] = array();
    
    while ($row = mysqli_fetch_assoc($result)) {

        array_push($output["dates"], $row);

    }

    echo json_encode($output);
    mysqli_close($conn);

}


?>