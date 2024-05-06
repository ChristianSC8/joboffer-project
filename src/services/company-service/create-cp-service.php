<?php
session_start();

require_once '../../config/connection.php';

if (isset($_POST["company"])) {

    $roleCompany = $_SESSION["role"];
    $username = $_SESSION["username"];
    $email = $_SESSION["email"];
    $password = $_SESSION["password"];

    $companyName = $_POST["company"];
    $docCompany = $_POST["doccompany"];
    $webCompany = $_POST["webcompany"];
    $adreCompany = $_POST["adrecompany"];
    $phonCompany = $_POST["phoncompany"];
    $typeCompany = $_POST["typecompany"];
    $fundation = $_POST["fundation"];
    $description = $_POST["description"];

    $errors = array();

    $passHash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);

    $connect = Connection::connect();
    $sql = "SELECT * FROM companies WHERE email_company = :email";

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
        $sql = "INSERT INTO `companies`(`name_company`, `document_company`, `website_company`, `addres_company`, `phone_company`, `type_company`, `foundation_company`, `decription_company`, `username_company`, `email_company`, `password_company`, `id_rol_company`, `date_created_company`, `date_updated_company`) 
    
        VALUES ('$companyName','$docCompany','$webCompany','$adreCompany','$phonCompany','$typeCompany','$fundation','$description','$username','$email','$passHash','$roleCompany','','')";

        $stmt = $connect->prepare($sql);
        if ($stmt->execute()) {
            session_unset();
            session_destroy();
            header("location: ../../components/auth/login.php");
        } else {
            echo "Error al crear el usuario: ";
        }
    }
}

if (isset($_POST["register-cp"])) {

    $roleCp = $_POST["role-cp"];
    $nameCp = $_POST["name-cp"];
    $descriptionCp = $_POST["description-cp"];
    $documentCp = $_POST["document-cp"];
    $webCp = $_POST["web-cp"];
    $addressCp = $_POST["address-cp"];
    $phoneCp = $_POST["phone-cp"];
    $typeCp = $_POST["type-cp"];
    $fundationCp = $_POST["fundation-cp"];
    $usernameCp = $_POST["username-cp"];
    $emailCp = $_POST["email-cp"];
    $passwordCp = $_POST["password-cp"];

    $errors = array();

    $passHash = password_hash($passwordCp, PASSWORD_BCRYPT, ['cost' => 10]);

    $connect = Connection::connect();
    $sql = "SELECT * FROM companies WHERE email_company = :email";

    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':email', $emailCp);
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
        $sql = "INSERT INTO `companies`(`name_company`, `document_company`, `website_company`, `addres_company`, `phone_company`, `type_company`, `foundation_company`, `decription_company`, `username_company`, `email_company`, `password_company`, `id_rol_company`, `date_created_company`, `date_updated_company`) 
    
        VALUES ('$nameCp','$documentCp','$webCp','$addressCp','$phoneCp','$typeCp','$fundationCp','$descriptionCp','$usernameCp','$emailCp','$passHash','$roleCp','','')";

        $stmt = $connect->prepare($sql);
        if ($stmt->execute()) {
            session_start();
            $_SESSION['message'] = "User registered successfully";
            header("location: ../../components/company/company-start.php");
        } else {
            echo "Error al crear el usuario: ";
        }
    }
}
