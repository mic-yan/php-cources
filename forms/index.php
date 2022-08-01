<html>
<head>
    <title>Add New Message</title>
</head>
<body>
<h2>Add New Message:</h2>
<form method="post" enctype="multipart/form-data" name="test">
    <label>User:</label>
    <input type="text" name="user">
    <br><br>
    <label>Message:</label>
    <input type="text" name="message_text">
    <br><br>
    <label> File: </label>
    <input type="file" name="image">
    <br><br>
    <input type="submit" value="Send" name="send">
    <input type="reset" value="Reset">
</form>
</body>
</html>

<?php

// загружаем изображение на сервер в конкретную папку, по пути шифруя имя
if (isset($_POST["send"])) {
//    var_dump($_FILES['image']);
    $file_code = md5($_FILES['image']['name']);
    $file_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $file_name = $file_code.".".$file_ext;
    move_uploaded_file($_FILES['image']['tmp_name'], "e:/xampp/htdocs/img/".$file_name);
}

// проверяем на наличие данных и красиво с плейсхолдерами добавляем в бд
if (isset($_POST['user']) && isset($_POST['message_text']) && isset($_FILES['image'])) {
    include('db_conn.php');
    $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DBNAME);
    $stmt = $mysqli->prepare("INSERT INTO message (user, message_text, image) VALUES (?, ?, ?)");
    $user = $_POST['user'];
    $message_text = $_POST['message_text'];
    $image = $file_name;
    $stmt->bind_param("sss", $user, $message_text, $image);
    $stmt->execute();
    $stmt->close();
    }