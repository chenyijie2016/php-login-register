<?php
/**
 * Created by PhpStorm.
 * User: cyj
 * Date: 2017/6/22
 * Time: 12:59
 */
?>

<?php
session_start();

//Avoid error when $_SESSION["login"] is not set
if (!isset($_SESSION["login"]))
{
    echo "<h1 align='center'>Forbidden</h1>";
    die("<div align='center'>You don't have permission to access, please login!</div>");
}


if (!$_SESSION["login"])
{
    echo "<h1 align='center'>Forbidden</h1>";
    die("<div align='center'>You don't have permission to access, please login!</div>");
}

$new_nickname = $_POST["nickname"];
$new_sex = $_POST["sex"];
$new_nationality = $_POST["nationality"];
$new_age = $_POST["age"];
$user_id = $_SESSION["user_id"];

// Your Database Settings
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test";


// Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Detect Connection
if ($conn->connect_error)
{
    die("Connection Error: " . $conn->connect_error);
}

$sql_update = "UPDATE user_data SET " . "nickname='{$new_nickname}' ,sex='{$new_sex}' ,nationality='{$new_nationality}' ,age='{$new_age}' WHERE user_id='{$user_id}'";
//$sql_update = "UPDATE user_data SET nickname='123' WHERE user_id='1' ";
$result = mysqli_query($conn, $sql_update);

if (!$result)
{
    echo "UPDATE ERROR, CHECK DATABASE SETTINGS?";
}
else
{
    echo "UPDATE SUCCESS";
}


?>

<a href="manger.php">RETURN</a>