<?php

require 'functions.php';

try {
$n = 4;

include('db_conn.php');
$mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DBNAME);
$query = $mysqli->query("SELECT * FROM message");
$data = $query->fetch_all(MYSQLI_ASSOC);
$query->free();

$mess_num = number_of_messages($data);
$page_num = number_of_pages($mess_num, $n);

$page = page_validation($page_num);
$first_page = get_first_message($page, $n);

$page_content = get_page_content($data, $first_page, $n);
$page_text = output_content($page_content, $_GET['page']);
include 'page.php';

$mysqli->close();

} catch(Exception $e) {
    echo $e->getMessage();
}