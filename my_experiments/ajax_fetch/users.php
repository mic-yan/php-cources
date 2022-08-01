<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fetch</title>
</head>
<body>
<div>
    <div>
        <h2>Users List</h2>
    </div>
    <div>
                <?php
                try {
                    require "db_connect.php";
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($mysqli, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "Id = " . $row['id'] . ", nickname = " . $row['nickname'] . ". email = " . $row['email'] . "<br>";
                        }
                    }
                } catch(Exception $e) {
                    echo $e->getMessage();
                }
                ?>
</div>
</body>
</html>