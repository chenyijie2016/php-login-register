<?php
/**
 * Created by PhpStorm.
 * User: cyj
 * Date: 2017/6/21
 * Time: 23:01
 */
?>
<?php
session_start();
//$_SESSION["login"] = false;
if (isset($_POST["user_id"]) and isset($_POST["password"]))
{
    $user_id = $_POST["user_id"];
    $user_password = $_POST["password"];
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

$user_exits = false;
$password_correct = false;

//get all existed user data from table "data"
//In the case where a small amount of data, otherwise use "WHERE"
$user_id_list = mysqli_query($conn, "SELECT * FROM data");


while ($user = mysqli_fetch_array($user_id_list))
{
    if ($user_id == $user["id"])
    {
        $user_exits = true;

        if ($user["password"] == $user_password)
        {
            $password_correct = true;
            $_SESSION["login"] = true;
            $_SESSION["user_id"] = $user_id;
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style ref="stylesheet">
        .content {
            margin: auto;
            text-align: center;
            font-family: SimSun;
            padding: 10px;
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
    <title>Log in</title>
</head>
<body>
<h1 class="content">Log in</h1>
<div class="content">
    <?php
    //echo "ID:" . $user_id . "<br>";
    //echo "PASSWORD:" . $user_password . "<br>";

    if (!$user_exits)
    {
        echo('<div class="fail">User does not exist</div>');
        die('<a href="login.php">return to login</a>');
    }

    if(!$password_correct)
    {
        echo('<div class="fail">Wrong Password</div>');
        die('<a href="login.php">return to login</a>');
    }

    echo '<div class="success">Login Success!</div>';

    ?>

    <a href="manger.php">Manger Your Data</a>
</div>
</body>
</html>
