<?php
/**
 * Created by PhpStorm.
 * User: cyj
 * Date: 2017/6/21
 * Time: 18:29
 */
?>
<!DOCTYPE html>
<html>


<body>
<p>
    user_ID:<?php
    echo $_POST["user_id"];
    $user_id = $_POST["user_id"];
    ?>
    <br>
    password:<?php
    echo $_POST["password"];
    $password = $_POST["password"];
    ?>
</p>


<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test";
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);

// 检测连接
if ($conn->connect_error)
{
    die("连接失败: " . $conn->connect_error);
}
echo "连接数据库成功<br>";


//get existed user data

$user_id_list = mysqli_query($conn, "SELECT id FROM data");
//find if any exist user id
$exist = false;

while ($user = mysqli_fetch_array($user_id_list))
{
    if ($user_id == $user["id"])
    {
        echo "Register Error: User ID already exists!";
        $exist = true;
        break;
    }

}
if (!$exist)
{
    $sql = "INSERT INTO data  (id ,password) VALUES ('" . $_POST["user_id"] . "','" . $_POST["password"] . "')";

    if (mysqli_query($conn, $sql))
    {
        echo "新记录插入成功";
    } else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}


?>
</body>
</html>
