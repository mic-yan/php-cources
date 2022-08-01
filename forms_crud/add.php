<html lang="en">
<head>
    <title>Add New Message</title>
</head>
<body>
<h2>Add New Message:</h2>
<form method="post" enctype="multipart/form-data" name="test">
    <label>User: <input type="text" name="user"></label>
    <br><br>
    <label>Message: <input type="text" name="message_text"></label>
    <br><br>
    <label> File: <input type="file" name="image"></label>
    <br><br>
    <input type="submit" value="Send" name="send">
    <input type="reset" value="Reset">
    <input type="submit" value="Cancel" name="back">
</form>
</body>
</html>

<?php
require "functions.php";

if (isset($_POST['back'])) {
    header('Location: index.php?page='.$_GET['page']);
}

if (isset($_POST["send"])) {

    $file_name = filename_encoding($_FILES['image']['name']); // загружаем изображение на сервер в конкретную папку, по пути шифруя имя
    move_uploaded_file($_FILES['image']['tmp_name'], "e:/xampp/htdocs/img/".$file_name);

    if (isset($_POST['user']) && isset($_POST['message_text']) && isset($_FILES['image'])) { // проверяем на наличие данных и красиво с плейсхолдерами добавляем в бд
        include('db_conn.php');
        $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DBNAME);
        $stmt = $mysqli->prepare("INSERT INTO message (user, message_text, image) VALUES (?, ?, ?)");
        $user = htmlspecialchars($_POST['user']);
        $message_text = htmlspecialchars($_POST['message_text']);
        $image = $file_name;
        $stmt->bind_param("sss", $user, $message_text, $image);
        $stmt->execute();
        $stmt->close();
        header("Location: index.php?page=".$_GET['page']);
    }
}