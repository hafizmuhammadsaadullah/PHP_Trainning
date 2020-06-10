<?php
include 'Database_Connection.php';
$obj=new \Database_Connection\DatabaseConnection();
$obj->DBConnection();
if(isset($_POST['export'])) {
    $list = $obj->userList();

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=saaad.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('ID', 'Name', 'Password'));
    foreach ($list as $l) {
        fputcsv($output, array($l[0], $l[1], $l[2]));
    }
    fclose($output);
//    header("Location: DisplayUser.php");
}