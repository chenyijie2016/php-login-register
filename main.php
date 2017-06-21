<?php
/**
 * Created by PhpStorm.
 * User: cyj
 * Date: 2017/6/21
 * Time: 18:29
 */
?>
    <pre>
    user_ID:<?php echo $_POST["user_id"]; ?>
        password:<?php echo $_POST["password"]; ?>

</pre>


<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test";
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);

// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
echo "连接成功";


$sql = "INSERT INTO data  (id ,password) VALUES ('" . $_POST["user_id"] . "','" . $_POST["password"] . "')";

if (mysqli_query($conn, $sql)) {
    echo "新记录插入成功";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


?>