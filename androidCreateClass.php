<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $classId = $_POST["classId"];
    $subject = $_POST["subject"];
    $section = $_POST["section"];
    $id = $_POST["id"];
    
    $type = $_POST["type"];

    require_once "init.php";

    switch ($type) {

        case "create":
            $sql = "INSERT INTO tbl_class (subject, section, faculty_id) VALUES ('$subject', '$section', '$id')";
            break;
        
        case "edit":
            $sql = "UPDATE tbl_class SET subject = '$subject', section = '$section' WHERE id = '$classId'";
            break;

    }

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