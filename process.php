// below code not working
<?php
$mysqli = new mysqli("localhost","username","login");

$username = $_POST['username'];
$password = $_POST['password'];

$username = stripcslashes($username);
$password = stripcslashes($password);
$username = $mysqli->real_escape_string($username);
$password =  $mysqli->real_escape_string($password);

mysqli_connect("localhost", "root", "");
$mysqli->select_db("login", "");

$result = $mysqli->query("select + from users where username = '$username' and password = '$password'")
    or die("Failed");
$row = mysqli_fetch_array($result);

if ($row['username'] == $username && $row['password'] == $password) {
    echo "Login success!! Welcome " . $row['username'];
} else {
    echo "failed.";
}
