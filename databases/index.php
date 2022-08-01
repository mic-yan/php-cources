<?php

require_once 'functions.php';

try {

$n = 4;
$page = page_validation();
include('db_conn.php');
$mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DBNAME);

if ($mysqli->connect_errno) {
    throw new Exception($mysqli->connect_error);
}

$sql = "SELECT * FROM message";

if (!($result = $mysqli->query($sql))) {
    throw new Exception($mysqli->error);
}

$data = $result->fetch_all(MYSQLI_ASSOC);
$result->free();
//    print_r($data);
$mess_num = number_of_messages($data);
//    echo $mess_num;
$page_num = number_of_pages($mess_num, $n);
//    echo $page_num;

$first_page = get_first_message($page, $n);
//    echo $first_page;
$page_content = get_page_content($data, $first_page, $n);
//    print_r ($page_content);
$page_text = output_content($page_content);
//    echo $page_text;

include 'page.php';
$mysqli->close();

} catch(Exception $e) {
    echo $e->getMessage();
}