<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $studentId = $_POST["studentId"];
    $classId = $_POST["classId"];

    require_once "init.php";
    
    $sql = "SELECT * FROM tbl_attendance WHERE student_id = '$studentId' AND class_id = '$classId' AND state = 1";
    
    $result = mysqli_query($conn, $sql);
    
    $output["numberOfPresents"] = 0;
    
    while ($row = mysqli_fetch_assoc($result)) {
        
        $output["numberOfPresents"] += 1;

    }
    
    $sql = "SELECT * FROM tbl_attendance WHERE student_id = '$studentId' AND class_id = '$classId' AND state = 0";
    
    $result = mysqli_query($conn, $sql);
    
    $output["numberOfAbsences"] = 0;
    
    while ($row = mysqli_fetch_assoc($result)) {
        
        $output["numberOfAbsences"] += 1;

    }
    
    $sql = "SELECT * FROM tbl_attendance WHERE student_id = '$studentId' AND class_id = '$classId'";
    
    $result = mysqli_query($conn, $sql);
    
    $output["numberOfMeetings"] = 0;
    
    while ($row = mysqli_fetch_assoc($result)) {
        
        $output["numberOfMeetings"] += 1;

    }
    
    echo json_encode($output);
    mysqli_close($conn);

}


?>