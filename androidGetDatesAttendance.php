<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $classId = $_POST["classId"];
    $studentId = $_POST["studentId"];

    require_once "init.php";

//    $sql = "SELECT * FROM tbl_attendance JOIN tbl_student ON tbl_attendance.student_id = tbl_student.id WHERE class_id = '$classId' AND student_id = '$studentId' ORDER BY tbl_student.last_name";
    
    $sql = "SELECT * FROM tbl_attendance WHERE class_id = '$classId' AND student_id = '$studentId'";
    
    $result = mysqli_query($conn, $sql);

    $output["students"] = array();
    
    while ($row = mysqli_fetch_assoc($result)) {

        array_push($output["students"], $row);

    }

    echo json_encode($output);
    mysqli_close($conn);

}


?>