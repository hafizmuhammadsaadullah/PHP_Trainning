<?php
include 'Database_Connection.php';
$obj=new \Database_Connection\DatabaseConnection();
$obj->DBConnection();
if(isset($_POST['import']) ) {

    if (($_FILES['myFile']['name']!="")) {
// Where the file is going to be stored
        $target_dir = "./upload/";
        $file = $_FILES['myFile']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $file_extension = $path['extension'];
        $temp_name = $_FILES['myFile']['tmp_name'];
        $path_filename_ext = $target_dir . $filename . "." . $file_extension;
        $data="";
// Check if file already exists
        if (file_exists($path_filename_ext)) {
            echo "Sorry, file already exists.";
        } else {
            move_uploaded_file($temp_name, $path_filename_ext);
            echo "Congratulations! File Uploaded Successfully.";
        }
    }
    // Validate file input to check if is not empty
    if (!isset($file)) {
        $response = array(
            "type" => "error",
            "message" => "File input should not be empty."
        );

    }
    // Validate file input to check if is with valid extension
    else if ($file_extension != "csv") {
        $response = array(
            "type" => "error",
            "message" => "Invalid CSV: File must have .csv extension."
        );
    } // Validate file size
    else if (($_FILES["myFile"]["size"] > 2000000)) {
        $response = array(
            "type" => "error",
            "message" => "Invalid CSV: File size is too large."
        );
    } // Validate if all the records have same number of fields
    else {
        $lengthArray = array();
        $row = 1;
        if (($fp = fopen($_FILES["myFile"]["tmp_name"], "r")) !== FALSE) {
            while (($data = fgetcsv($fp, 1000, ",")) !== FALSE) {
                $lengthArray[] = count($data);
                $row++;
                if ($row != 1) {
                    $obj->insertUser($data[1],$data[2]);
                }
            }
            fclose($fp);
        }

        $lengthArray = array_unique($lengthArray);

        if (count($lengthArray) == 1) {
            $response = array(
                "type" => "success",
                "message" => "File Validation Success."
            );
        } else {
            $response = array(
                "type" => "error",
                "message" => "Invalid CSV: Count mismatch."
            );
        }

    }
}
else{
    echo "Please upload file :')";
}