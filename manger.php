<?php
/**
 * Created by PhpStorm.
 * User: cyj
 * Date: 2017/6/21
 * Time: 23:10
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

$sql = 'SELECT * FROM user_data WHERE user_id="' . $_SESSION["user_id"] . '"';


$all_data = mysqli_query($conn, $sql);

if (!$all_data)
{
    die("NOT FOUND TARGET USER");
}
if (!$user_data = mysqli_fetch_array($all_data))
{
    die("ERROR");
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style ref="stylesheet">
        .content {
            margin: auto;
            align-content: center;
            text-align: center;
            font-family: SimSun;
            padding: 10px;
        }
    </style>
    <title>Manger</title>
</head>
<body>
<h1 align="center">Manger</h1>

<div class="content">
    <p>
        <?php
        echo 'Hello ' . $user_data["nickname"] . "!";
        ?> </p>

    <form action="set_user_data.php" method="post" align="center">
        <table class="content">
            <tr>
                <td colspan="2">
                    User Information
                </td>
            </tr>
            <tr>
                <td>
                    NickName
                </td>
                <td>
                    <?php
                    echo '<input name="nickname" required="required" type="text" value="' . $user_data["nickname"] . '">';
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Sex
                </td>
                <td>
                    <?php
                    echo '<input name="sex" required="required" type="text" value="' . $user_data["sex"] . '">';
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Country
                </td>
                <td>
                    <?php
                    echo '<input name="nationality" required="required" type="text" value="' . $user_data["nationality"] . '">';
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Age
                </td>
                <td>
                    <?php
                    echo '<input name="age" type="number" min="1" max="120" required="required" value="' . $user_data["age"] . '">';
                    ?>
                </td>
            </tr>
        </table>
        <input type="submit" value="Submit Change">
    </form>


</div>

</body>
</html>