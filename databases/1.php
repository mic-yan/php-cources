<html>
<head>
    <title>Add New Message</title>
</head>
<body>
<h2>Add New Message:</h2>
<form method="post" enctype="multipart/form-data">
    <label> File: </label>
    <input type="file" name="image">
    <br><br>
    <input type="submit" value="Send" name="send">
    <input type="reset" value="Reset">
</form>
</body>
</html>

<?php

if (!isset($_POST['send'])) {
    echo "Fail";
} else {
    var_dump($_FILES['image']);
    move_uploaded_file($_FILES['image']['tmp_name'], "e:/xampp/htdocs/img/".$_FILES['image']['name']);
}