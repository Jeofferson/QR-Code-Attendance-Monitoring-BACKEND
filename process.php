<?php


// http://localhost:8080/SystemsIntegrationAndArchitecture/AttendanceMonitoringSystemQRCode/

require "init.php";


if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = sha1($_POST["password"]);

    $sql = "SELECT * FROM tbl_admin";

    $result = mysqli_query($GLOBALS["conn"], $sql);

    if ($result) {
        
        while($row = $result->fetch_assoc()) {

            if ($username == $row["username"] && $password == $row["password"]) {

                header("location: HomePage.php");

                die();

            }

        }

        header("location: index.php");

    }

}


if(isset($_POST["add_student"])) {

    $id = $_POST["id"];

    $studentId = $_POST["studentId"];
    $firstName = $_POST["firstName"];
    $middleName = $_POST["middleName"];
    $lastName = $_POST["lastName"];
    $course = $_POST["course"];
    
    $password = sha1(strtoupper($lastName));
    
    if ($_POST["add_student"] == "Create") {

        $sql = "INSERT INTO tbl_student (student_id, first_name, middle_name, last_name, course, username, _password) VALUES ('$studentId', '$firstName', '$middleName', '$lastName', '$course', '$studentId', '$password')";

    } else if ($_POST["add_student"] == "Edit") {

        $sql = "UPDATE tbl_student SET student_id='$studentId', first_name='$firstName', middle_name='$middleName', last_name='$lastName', course='$course' WHERE id='$id'";

    }

    if (mysqli_query($GLOBALS["conn"], $sql)) {

        header("location: HomePage.php");

    }

}


if(isset($_POST["add_faculty"])) {

    $id = $_POST["id"];

    $facultyId = $_POST["facultyId"];
    $firstName = $_POST["firstName"];
    $middleName = $_POST["middleName"];
    $lastName = $_POST["lastName"];
    $department = $_POST["department"];
    
    $password = sha1(strtoupper($lastName));

    if ($_POST["add_faculty"] == "Create") {

        $sql = "INSERT INTO tbl_faculty (faculty_id, first_name, middle_name, last_name, department, username, _password) VALUES ('$facultyId', '$firstName', '$middleName', '$lastName', '$department', '$facultyId', '$password')";

    } else if ($_POST["add_faculty"] == "Edit") {

        $sql = "UPDATE tbl_faculty SET faculty_id='$facultyId', first_name='$firstName', middle_name='$middleName', last_name='$lastName', department='$department' WHERE id='$id'";

    }

    if (mysqli_query($GLOBALS["conn"], $sql)) {

        header("location: FacultyList.php");

    }

}


if (isset($_POST["upload_csv_file_student"])) {

    uploadCsvFile(true, "csv_file_student");

}


if (isset($_POST["upload_csv_file_faculty"])) {

    uploadCsvFile(false, "csv_file_faculty");

}


if (isset($_GET["delete_student"])) {

    $id = $_GET["delete_student"];

    $sql = "DELETE FROM tbl_student WHERE id=$id";

    if (mysqli_query($GLOBALS["conn"], $sql)) {

        header("location: HomePage.php");

    }

}


if (isset($_GET["delete_faculty"])) {

    $id = $_GET["delete_faculty"];

    $sql = "DELETE FROM tbl_faculty WHERE id=$id";

    if (mysqli_query($GLOBALS["conn"], $sql)) {

        header("location: FacultyList.php");

    }

}


function uploadCsvFile($isStudent, $csvFilename) {

    if ($_FILES[$csvFilename]["name"]) {

        $filename = explode(".", $_FILES[$csvFilename]["name"]);

        if ($filename[1] == "csv") {

            $handle = fopen($_FILES[$csvFilename]["tmp_name"], "r");

            while ($data = fgetcsv($handle)) {

                if ($isStudent) {

                    $studentId = mysqli_real_escape_string($GLOBALS["conn"], $data[0]);
                    $firstName = mysqli_real_escape_string($GLOBALS["conn"], $data[1]);
                    $middleName = mysqli_real_escape_string($GLOBALS["conn"], $data[2]);
                    $lastName = mysqli_real_escape_string($GLOBALS["conn"], $data[3]);
                    $course = mysqli_real_escape_string($GLOBALS["conn"], $data[4]);
    
                    $password = sha1(strtoupper($lastName));

                    $sql = "INSERT INTO tbl_student (student_id, first_name, middle_name, last_name, course, username, _password) VALUES ('$studentId', '$firstName', '$middleName', '$lastName', '$course', '$studentId', '$password')";

                } else {

                    $facultyId = mysqli_real_escape_string($GLOBALS["conn"], $data[0]);
                    $firstName = mysqli_real_escape_string($GLOBALS["conn"], $data[1]);
                    $middleName = mysqli_real_escape_string($GLOBALS["conn"], $data[2]);
                    $lastName = mysqli_real_escape_string($GLOBALS["conn"], $data[3]);
                    $department = mysqli_real_escape_string($GLOBALS["conn"], $data[4]);
    
                    $password = sha1(strtoupper($lastName));

                    $sql = "INSERT INTO tbl_faculty (faculty_id, first_name, middle_name, last_name, department, username, _password) VALUES ('$facultyId', '$firstName', '$middleName', '$lastName', '$department', '$facultyId', '$password')";

                }

                mysqli_query($GLOBALS["conn"], $sql);

            }

            fclose($handle);

            if ($isStudent) {

                header("location: HomePage.php");

            } else {
                
                header("location: FacultyList.php");

            }

        } else {

            if ($isStudent) {

                header("location: HomePage.php");

            } else {
                
                header("location: FacultyList.php");

            }

        }

    }

}


function updateData() {


}


function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}


mysqli_close($conn);


?>