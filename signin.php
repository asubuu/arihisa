<?php

if(isset($_POST['signin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    try{
        $db = new PDO('mysql:host=localhost;dbname=sample', 'arioka', '1a3d2k001');
        $sql = 'insert into users(username, password) values(?, ?)';
        $stmt = $db->prepare($sql);
        $stmt->execute(array($username, $password));
        $stmt = null;
        $db = null;

        header('Location: http://localhost/index.php');
        exit;
    }catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>新規登録</title>
</head>
<body>

<h1>新規登録画面</h1>
<form action="" method="POST">
    ユーザ名<input type="text" name="username" value=""><br>
    パスワード<input type="password" name="password" value=""><br>
    <input type="submit" name="signin" value="新規登録">
</form>
<br>
<a href="index.php">ログイン画面に戻る</a>

</body>
</html>