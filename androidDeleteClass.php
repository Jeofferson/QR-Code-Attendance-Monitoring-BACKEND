<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $classId = $_POST["classId"];

    require_once "init.php";
    
    $sql = "DELETE FROM tbl_class WHERE id = '$classId'";
    mysqli_query($conn, $sql);
    
    $sql = "DELETE FROM tbl_students_class WHERE class_id = '$classId'";
    mysqli_query($conn, $sql);
    
    $sql = "DELETE FROM tbl_date WHERE class_id = '$classId'";
    mysqli_query($conn, $sql);
    
    $sql = "DELETE FROM tbl_attendance WHERE class_id = '$classId'";
    mysqli_query($conn, $sql);
    
    $output["status"] = "success";
    
    echo json_encode($output);
    mysqli_close($conn);
    
//    $sql = "DELETE tbl_class, tbl_students_class, tbl_date, tbl_attendance FROM tbl_class, tbl_students_class, tbl_date, tbl_attendance WHERE tbl_class.id = '$classId' AND tbl_students_class.class_id = '$classId' AND tbl_date.class_id = '$classId' AND tbl_attendance.class_id = '$classId'";
//
//    if (mysqli_query($conn, $sql)) {
//    
//        $output["status"] = "success";
//    
//        echo json_encode($output);
//        mysqli_close($conn);
//
//    } else {
//    
//        $output["status"] = "failed";
//    
//        echo json_encode($output);
//        mysqli_close($conn);
//
//    }

}


?>