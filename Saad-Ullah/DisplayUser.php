<?php
session_start();
if(!isset($_SESSION['username1']) && !isset($_SESSION['password'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <script>

        function myFunction() {
            var id=document.getElementById("id").value;
            var name=document.getElementById("name").value;
            var pass=document.getElementById("pass").value;
            var r = confirm("Are you want to update it ?");
            if (r == true) {
                window.location.replace("DeleteUser.php?id="+id+"&name="+name+"&pass="+pass+"&update=update");
                alert("DeleteUser.php?id="+id+"&name="+name+"&pass="+pass+"&update=update");
                return;
            }

        }
        function myFunction1() {
            var id=document.getElementById("id").value;
            var name=document.getElementById("name").value;
            var pass=document.getElementById("pass").value;
            var r = confirm("Are you want to delete it ?");
            if (r == true) {
                window.location.replace("DeleteUser.php?id="+id+"&name="+name+"&delete=delete");
                alert("DeleteUser.php?id="+id+"&name="+name+"&delete=delete");
                return;
            }
            return;
        }
    </script>
<style>
table, th, td {
  border: 1px solid black;
},
GFG {
    background-color: white;
    border: 2px solid black;
    color: green;
    padding: 5px 10px;
    text-align: center;
    display: inline-block;
    font-size: 20px;
    margin: 10px 30px;
    cursor: pointer;
    text-decoration:none;
}
</style>
</head>
<body>
<center>
<h1 align="center">User List</h1>

<table style="color:blue;">
    <tr>

        <form action="importCSV.php" method="post" enctype="multipart/form-data">
            <td colspan="3"><input type="file" name="myFile" id="myFile"></td>
            <td><input type="Submit" name="import" required="" value="Import CSV"/></td>
        </form>
        <form action="exportCSV.php" method="post" enctype="multipart/form-data">
            <td  ><input type="submit" name="export" value="Export CSV"/></td>
            </td>
        </form>

    </tr>
  <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Password</th>
      <th>Update</th>
      <th>Delete</th>
  </tr>
    <?php
        if(isset($_GET['message'])) {
            $message = $_GET['message'];
            echo "<script type='text/javascript'>alert('$message');</script>";

        }
    include 'Database_Connection.php';
    $obj =new \Database_Connection\DatabaseConnection();
    $v=$obj->userList();
//    echo '<pre>';
//    print_r($v);
    foreach($v as $l) {
        ?>
        <tr>
            <form >
                <td><input type="text" value="<?php echo $l[0] ?>" id="id" name="id"/></td>
                <td><input type="text" value="<?php echo $l[1] ?>" id="name" name="name"/></td>
                <td><input type="password" value="<?php echo $l[2] ?>" id="pass" name="pass"/></td>
                <td><input type="submit" name="update" value="update" onclick="myFunction()" /></td>
                <td><input type="submit" name="delete" value="delete" onclick="myFunction1()" /></td>
            </form>
        </tr>
        <?php
    }

?>
    <tr>
        <td colspan="5" align="center">
            <a href="logout.php" >logout</a>
        </td>
    </tr>
</table>
</center>
</body>
</html>