<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dateId = $_POST["dateId"];
    $date = $_POST["date"];
    $milliseconds = $_POST["milliseconds"];
    $classId = $_POST["classId"];

    $type = $_POST["type"];

    require_once "init.php";

    switch ($type) {

        case "create":
            $sql = "INSERT INTO tbl_date (date, milliseconds, class_id) VALUES ('$date', '$milliseconds', '$classId')";
            break;
        
        case "edit":
            $sql = "UPDATE tbl_date SET date = '$date', milliseconds = '$milliseconds' WHERE id = '$dateId'";
            break;

    }

    if (mysqli_query($conn, $sql)) {

        switch ($type) {

            case "create":
                $lastInsertId = mysqli_insert_id($conn);

                $sql = "SELECT * FROM tbl_students_class WHERE class_id = '$classId'";
    
                $result = mysqli_query($conn, $sql);
                
                while ($row = mysqli_fetch_assoc($result)) {

                    $studentId = $row["student_id"];

                    $sql = "INSERT INTO tbl_attendance (state, student_id, date_id, class_id) VALUES (0, '$studentId', '$lastInsertId', '$classId')";

                    mysqli_query($conn, $sql);

                }
                    
                $output["status"] = "success";
            
                echo json_encode($output);
                mysqli_close($conn);
                break;
            
            case "edit":
                $output["status"] = "success";
            
                echo json_encode($output);
                mysqli_close($conn);
                break;

        }

    } else {
    
        $output["status"] = "failed";
    
        echo json_encode($output);
        mysqli_close($conn);

    }

}


?>