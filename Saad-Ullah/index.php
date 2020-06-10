<html>
<center>
    <h1>Login</h1>
    <?php
    if(isset($_GET['message'])){
        $message1=$_GET['message'];
        echo "<script type='text/javascript'>alert($message1);</script>";

    }

    $cookieNameId="user1";
    $cookiePassId="pass1";
    $cookieName="";
    $cookiePass="";
    if (isset($_COOKIE[$cookieNameId]) && isset($_COOKIE[$cookiePassId])) {
        $cookieName=$_COOKIE[$cookieNameId];
        $cookiePass=$_COOKIE[$cookiePassId];

    }
    ?>
    <form action="#" method="post" > <br />
        Name: <input type="text" name="name" value="<?php echo $cookieName;?>" /> <br /><br />
        Password: <input type="password" value="<?php echo $cookiePass?>" name="pass" /> <br /><br />
        <input type="submit" name="submit" value="login!" /><br /><br />
        <input type="checkbox" name="remember" /> Remember me<br /><br />
        <a href="Registration.php">For Regitration</a>
    </form>
</center>
<?php
include 'Database_Connection.php';
if(isset($_POST['submit'])) {
    if (empty($_POST['pass']) != true && empty($_POST['name']) != true) {
        $name = $_POST['name'];
        $pass = $_POST['pass'];

        $obj = new \Database_Connection\DatabaseConnection();
        $l = $obj->checkLogin($name, $pass);
        if (!empty($l)) {
            session_start();
            if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
                echo "a";
                $_SESSION['username'] = $name;
                $_SESSION['password'] = $pass;
            }
            if (isset( $_POST['remember'])) {
                $remember = $_POST['remember'];
                if (!isset($_COOKIE[$cookieNameId]) && !isset($_COOKIE[$cookiePassId])) {
                    setcookie($cookieNameId, $name);
                    setcookie($cookiePassId, $pass);
                }
            }
                  header("Location: DisplayUser.php");
        }
    }

}
?>

</html>