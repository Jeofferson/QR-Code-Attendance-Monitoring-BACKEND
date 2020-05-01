<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $facultyId = $_POST["facultyId"];

    require_once "init.php";

    $sql = "SELECT * FROM tbl_class WHERE faculty_id = '$facultyId' ORDER BY subject";
    
    $result = mysqli_query($conn, $sql);

    $output["classes"] = array();
    
    while ($row = mysqli_fetch_assoc($result)) {

        array_push($output["classes"], $row);

    }

    echo json_encode($output);
    mysqli_close($conn);

}


?>