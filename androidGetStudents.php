<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $classId = $_POST["classId"];

    require_once "init.php";

    $sql = "SELECT * FROM tbl_students_class JOIN tbl_student ON tbl_students_class.student_id = tbl_student.id WHERE class_id = '$classId' ORDER BY tbl_student.last_name";
    
    $result = mysqli_query($conn, $sql);

    $output["students"] = array();
    
    while ($row = mysqli_fetch_assoc($result)) {

        array_push($output["students"], $row);

    }

    echo json_encode($output);
    mysqli_close($conn);

}


?>