<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $state = $_POST["state"];

    $studentId = $_POST["studentId"];
    $dateId = $_POST["dateId"];
    $classId = $_POST["classId"];

    require_once "init.php";
    
    $sql = "UPDATE tbl_attendance SET state = '$state' WHERE student_id = '$studentId' AND date_id = '$dateId' AND class_id = '$classId'";

    if (mysqli_query($conn, $sql)) {
    
        $output["status"] = "success";
    
        echo json_encode($output);
        mysqli_close($conn);

    } else {
    
        $output["status"] = "failed";
    
        echo json_encode($output);
        mysqli_close($conn);

    }

}


?>
