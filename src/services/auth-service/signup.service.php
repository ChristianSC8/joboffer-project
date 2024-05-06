<?php
session_start();
require_once '../../config/connection.php';

if (isset($_POST["signup"])) {
    $_SESSION["role"] = $_POST["role"];
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["password"] = $_POST["password"];
}

if (isset($_POST["role"]) && $_POST["role"] == 2) {
    header("location: ../../components/company/company.php");
} else {

    if (isset($_POST["signup"])) {
        $roleuser = $_POST["role"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $errors = array();

        $passHash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);

        $connect = Connection::connect();
        $sql = "SELECT * FROM users WHERE email_user = :email";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $rowCount = $stmt->rowCount();

        if ($rowCount > 0) {
            array_push($errors, "Email already exists!");
        }

        if (count($errors) > 0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        } else {
            $sql = "INSERT INTO `users`(`username_user`, `lastname_user`, `document_user`, `address_user`, `phone_user`, `pathimg_user`, `pathcv_user`, `email_user`, `password_user`, `id_rol_user`) VALUES ('$username', '', '', '', '', '', '', '$email', '$passHash', '$roleuser')";

            $stmt = $connect->prepare($sql);
            if ($stmt->execute()) {
                header("location: ../../components/auth/login.php");
            } else {
                echo "Error al crear el usuario: ";
            }
        }
    } else if (isset($_POST["register"])) {
        $roleuser = $_POST["role"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $errors = array();

        $passHash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);

        $connect = Connection::connect();
        $sql = "SELECT * FROM users WHERE email_user = :email";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $rowCount = $stmt->rowCount();

        if ($rowCount > 0) {
            array_push($errors, "Email already exists!");
        }

        if (count($errors) > 0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
        } else {
            $sql = "INSERT INTO `users`(`username_user`, `lastname_user`, `document_user`, `address_user`, `phone_user`, `pathimg_user`, `pathcv_user`, `email_user`, `password_user`, `id_rol_user`) VALUES ('$username', '', '', '', '', '', '', '$email', '$passHash', '$roleuser')";

            $stmt = $connect->prepare($sql);
            if ($stmt->execute()) {
                header("location: ../../components/users/users-start.php");
                session_start();
                $_SESSION['message'] = "User registered successfully";
            } else {
                echo "Error al crear el usuario: ";
            }
        }
    } else {
        echo "No create";
    }
}
