<?php
/**
 * Created by PhpStorm.
 * User: cyj
 * Date: 2017/6/21
 * Time: 18:29
 */
?>

<?php
$user_id = $_POST["user_id"];
$password = $_POST["password"];

if ($user_id == "" || $password == "")
{
    die("ID or Password can't be empty!");
}


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
// echo "Connect Database Success<br>";


//get existed user data
$user_id_list = mysqli_query($conn, "SELECT id FROM data");
//find if any exist user id
$exist = false;

while ($user = mysqli_fetch_array($user_id_list))
{
    if ($user_id == $user["id"])
    {
        $exist = true;
        break;
    }
}
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<style ref="stylesheet">
    .content {
        font-family: SimSun;
        margin: auto;
        text-align: center;
    }
    .success
    {
        margin: auto;
        text-align: center;
        color: green;
        font-family: Consolas;
    }
    .fail
    {
        margin: auto;
        text-align: center;
        color: red;
        font-family: Consolas;
    }
</style>
<body>
<h1 class="content">Register Result</h1>
<p class="content">
    user_ID:<?php
    echo $_POST["user_id"] . "<br>";

    ?>
    password:<?php
    echo $_POST["password"] . "<br>";

    ?>

</p>
<div class="content">
    <?php

    if (!$exist)
    {
        $sql = "INSERT INTO data  (id ,password) VALUES ('" . $_POST["user_id"] . "','" . $_POST["password"] . "')";
        if (mysqli_query($conn, $sql))
        {
            echo '<div class="success">Register success!</div>';
        } else
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    else
    {
        echo '<div class="fail">Register Error: User ID already exists!</div>';
    }
    ?>
    <a href="login.php">Log in</a>
</div>
</body>
</html>
