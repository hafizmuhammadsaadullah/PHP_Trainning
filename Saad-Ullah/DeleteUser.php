<?php
session_start();
if(!isset($_SESSION['username1']) && !isset($_SESSION['password'])){
    header("Location: index.php");
}
include 'Database_Connection.php';
$obj =new \Database_Connection\DatabaseConnection();
$id=$_GET['id'] ;
$name=$_GET['name'] ;
$pass=$_GET['pass'];
$message="Unsuccessfull";
if(isset($_GET['update'])) {
    $obj->updateUser($id,$name,$pass);
    $message="Update successful";
}
if(isset($_GET['delete'])) {
$obj->deleteUser($id);
$message="Delete Successful";
}
header("Location: DisplayUser.php?message=$message");
?>
