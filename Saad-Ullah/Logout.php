<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
    session_destroy();
    header( 'Location: index.php');
}
else{
    header( 'Location: index.php');
}
