<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $studentId = $_POST["studentId"];
    $classId = $_POST["classId"];

    require_once "init.php";
    
    $sql = "SELECT * FROM tbl_students_class WHERE student_id = '$studentId' AND class_id = '$classId'";
    
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
    
        $output["status"] = "exists";
    
        echo json_encode($output);
        mysqli_close($conn);
    
    } else {

        $sql = "INSERT INTO tbl_students_class (student_id, class_id) VALUES ('$studentId', '$classId')";

        if (mysqli_query($conn, $sql)) {

            $lastInsertId = mysqli_insert_id($conn);

            $sql = "SELECT * FROM tbl_date WHERE class_id = '$classId'";

            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {

                $dateId = $row["id"];

                $sql = "INSERT INTO tbl_attendance (state, student_id, date_id, class_id) VALUES (0, '$studentId', '$dateId', '$classId')";

                mysqli_query($conn, $sql);

            }

            $output["status"] = "success";

            echo json_encode($output);
            mysqli_close($conn);

        } else {

            $output["status"] = "failed";

            echo json_encode($output);
            mysqli_close($conn);

        }
        
    }

}


?>
