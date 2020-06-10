<html>
<head>
    <SCRIPT>
        function checkName()
        {
            var inputtxt=document.getElementById("name").value;
            // alert(inputtxt);
            if(document.getElementById("name").value=="") {
                document.getElementById("errname").innerHTML = "please enter name";
            } else {

                var letters = /^[A-Za-z]+$/;
                if (inputtxt.match(letters)) {

                    document.getElementById("errname").innerHTML = "";
                } else {
                    document.getElementById("errname").innerHTML = "Please only use valid character";
                }
            }
        }
        function checkAge()
        {
            var age=parseInt(document.getElementById("age").value);
            if(document.getElementById("age").value=="") {
                document.getElementById("errage").innerHTML = "please enter age";
            } else {

                if (age<18 || age>60) {

                    document.getElementById("errage").innerHTML = "invalid age";
                } else {
                    document.getElementById("errage").innerHTML = "";
                }
            }
        }
    </SCRIPT>
</head>
<center>
    <h1>Registration</h1>
    <form action="#" method="post" ><br />
        Name :<br /> <input type="text" required="" onblur="checkName()" id="name" name="name" /><span id="errname"  style="color:red;"></span><br />
        Email : <br /><input type="email" required="" name="email"/><br />
        Phone : <br /><input type="number" required="" name="phone" /><span id="errphone"  style="color:red;"></span><br />
        Age : <br /><input type="txt" name="age" required="" id="age" onblur="checkAge()" /><span id="errage"  style="color:red;"></span><br />
        Password : <br /><input type="password" required="" name="pass" /><br />
        DOB : <br /><input type="date" required="" name="dob" /><br />
        <label >Gender : </label>
        <input type="radio" id="male" name="gender" required=""  value="male"><label for="male">Male</label>
        <input type="radio" id="female" name="gender" required="" value="female"><label for="female">Female</label><br>
        <label for="degree">Choose a Degree:</label>

        <select name="degree" id="degree">
            <option value="matric">Matric</option>
            <option value="inter">Inter</option>
            <option value="bs-se">BS-SE</option>
            <option value="bs-cs">BS-CS</option>
        </select><br />
        <input type="submit" name="submit" value="Register!" /><br /><br />


    </form>
</center>
<?php
include 'Database_Connection.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    echo $pass.$name;
//    $obj = new \Database_Connection\DatabaseConnection();
//    $obj->insertUser($name,$pass);
//    $mess="Regsteration-Success";
//   header("Location: DisplayUser.php?message=$mess");

}
?>

</html>