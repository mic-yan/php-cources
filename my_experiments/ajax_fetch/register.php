<?php

require_once "functions.php";

try {
    new_connection();

    if (isset($_POST["submit"])) {
        user_data_validation();
        $stmt = $mysqli->prepare("INSERT INTO users (nickname, fname, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nickname, $fname, $email, $hashed_password);
        $stmt->execute();
        header("Location: /ajax_fetch/index_ajax.php?name=" . $_POST['nickname']);
    }
} catch(Exception $e) {
    echo $e->getMessage();
}

?>

<html>
<head>
    <title>Регистрация</title>
    <link rel="stylesheet" href="http://localhost/bootstrap/css/bootstrap.css">
</head>
<body>
<div class="container">
<form method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Nickname</label>
        <input type="text" class="form-control" name="nickname" placeholder="Nickname">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" name="fname" placeholder="Name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" name="email" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-default" name="submit">Submit</button>
</form>
</div>
</body>
</html>