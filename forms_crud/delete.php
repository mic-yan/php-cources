<?php

require "functions.php";

if (isset($_GET['id'])) {
    include("db_conn.php");
    $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DBNAME);
    $query = $mysqli->query("DELETE FROM message WHERE id=" . $_GET['id']);
    header("Location: index.php?page=".$_GET['page']);
}