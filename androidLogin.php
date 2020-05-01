<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST["username"];
    $password = sha1($_POST["password"]);
    $loginAs = $_POST["loginAs"];

    require_once "init.php";

    switch ($loginAs) {

        case "student":
            $sql = "SELECT * FROM tbl_student WHERE username = '$username' AND _password = '$password'";
            break;
        
        case "teacher":
            $sql = "SELECT * FROM tbl_faculty WHERE username = '$username' AND _password = '$password'";
            break;

    }
    
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) <= 0) {
    
        $output["status"] = "failed";

        switch ($loginAs) {

            case "student":
                $output["studentId"] = "";
                break;
            
            case "teacher":
                $output["facultyId"] = "";
                break;
                
        }
        
        $output["firstName"] = "";
        $output["middleName"] = "";
        $output["lastName"] = "";
    
        echo json_encode($output);
        mysqli_close($conn);
    
    } else {
    
        $row = mysqli_fetch_assoc($result);
    
        $output["status"] = "success";

        switch ($loginAs) {

            case "student":
                $output["studentId"] = $row["student_id"];
                break;
            
            case "teacher":
                $output["facultyId"] = $row["faculty_id"];
                break;
                
        }

        $output["id"] = $row["id"];
        $output["firstName"] = $row["first_name"];
        $output["middleName"] = $row["middle_name"];
        $output["lastName"] = $row["last_name"];
    
        echo json_encode($output);
        mysqli_close($conn);
    
    }

}


?>