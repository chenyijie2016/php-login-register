<?php
/**
 * Created by PhpStorm.
 * User: cyj
 * Date: 2017/6/21
 * Time: 22:53
 */
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
    </style>
    <title>Log in</title>
</head>
<body>
<h1 align="center">Log in</h1>
<div class="content">
    <form action="login_main.php" method="post">
        &nbsp;USER ID
        <input type="text" id="user_id" name="user_id">
        <br>
        PASSWORD
        <input type="password" id="password" name="password">
        <br>
        <input type="submit" value="submit">
    </form>

    <a href=register.php>Free to register</a>
</div>

</body>
</html>
