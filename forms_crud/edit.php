<?php

require "functions.php";

if (isset($_GET['page']) && isset($_GET['id'])) {
    include 'db_conn.php';
    $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DBNAME);
    $query = $mysqli->query("SELECT * FROM message WHERE id=".$_GET['id']);
    $data = $query->fetch_all(MYSQLI_ASSOC);
    $query->free();
    if (!empty($query)) {
        include "edit_message.php";
        if (isset($_POST['back'])) {
            header('Location: index.php?page='.$_GET['page']);
        }
        if (isset($_POST['mess_changed'])) {
            $stmt = $mysqli->prepare("UPDATE message SET message_text = ? WHERE id=".$_GET['id']);
            $changed_message = htmlspecialchars($_POST['mess_changed']);
            $stmt->bind_param("s", $changed_message);
            $stmt->execute();
            $stmt->close();
            header('Location: index.php?page=' . $_GET['page']);
        }
    }
}