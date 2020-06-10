<?php
namespace Database_Connection;
use PDO;
    class DatabaseConnection
    {
        var $servername;
        var $username ;
        var $password;
        function __construct()
        {
            $this->servername = "localhost";
            $this->username = "root";
            $this->password = "";
        }

        public function DBConnection()
        {
            global $servername,$username,$password;
            try
            {
                $conn = new \PDO("mysql:host=localhost;dbname=saad", "root", "");
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               return $conn;

            }catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

        }
        public function insertUser($name,$pass)
        {
            try {
                $conn=$this->DBConnection();
                $sql="INSERT INTO login VALUES (NULL, '".$name."', '".$pass."');";
                $conn->exec($sql);
                echo "<br>data insert successfull";

            }catch
            (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        }

        public function updateUser($ID,$name,$pass)
        {
            try {
                $conn=$this->DBConnection();
                $sql = "UPDATE login SET name='" . $name . "' , password='".$pass."'WHERE id=" . $ID . "";
                $conn->exec($sql);
                echo "<br>data insert successfull";
                // Prepare statement
                $stmt = $conn->prepare($sql);
                // execute the query
                $stmt->execute();
                // echo a message to say the UPDATE succeeded
                echo $stmt->rowCount() . " records UPDATED successfully";
            }catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        }

        public function deleteUser($ID)
        {
            try{
                if($ID>0) {
                    $conn = $this->DBConnection();
                    // sql to delete a record
                    $sql = "DELETE FROM login WHERE id=" . $ID . "";
                    // use exec() because no results are returned
                    $conn->exec($sql);
                    echo "Record deleted successfully";
                }
                } catch(PDOException $e) {
                    echo $sql . "<br>" . $e->getMessage();

                }

        }

        public function userList()
        {
            try {
                $conn=$this->DBConnection();
                $sql="select * from login";
                $stmt = $conn->query($sql);
                $r=$stmt->fetchAll();
                return $r;
                 } catch(PDOException $e) {
                     echo "Error: " . $e->getMessage();
                 }

        }
        public function checkLogin($name,$pass)
        {
            try {
                $conn=$this->DBConnection();
                $sql="select * from login where name='".$name."' && password='".$pass."';";
                $stmt = $conn->query($sql);
                $r=$stmt->fetchAll();
//                echo '<per>';
                //print_r($r);
                return $r;

            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

        }


}

