<?php

function new_connection() {
    include "db_connect.php";
    global $mysqli;
    $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DBNAME);
    if ($mysqli->connect_errno) {
        throw new Exception($mysqli->connect_error);
    }
}

function user_data_validation() {

        if (!isset($_POST["nickname"]) || !isset($_POST["fname"]) || !isset($_POST["email"]) || !isset($_POST["password"])) {
            throw new Exception("Some data is missing");
        } else {
            global $nickname;
            $nickname = $_POST["nickname"];
            global $fname;
            $fname = $_POST["fname"];
            global $email;
            $email = $_POST["email"];
            global $password;
            $password = $_POST["password"];
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $nickname)) {
                throw new Exception("Invalid nickname");
            } else {
                if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $fname)) {
                    throw new Exception("Invalid name");
                } else {
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        throw new Exception("Invalid email");
                    } else {
                        if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=+¬]/', $password)) {
                            throw new Exception("Password must also contain special characters, numbers and capital letters");
                        } else {
                            global $hashed_password;
                            $hashed_password = password_hash("$password", PASSWORD_BCRYPT);
                        }
                    }
                }
            }
        }
    }