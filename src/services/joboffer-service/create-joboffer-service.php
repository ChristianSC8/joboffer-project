<?php
session_start();

require_once '../../config/connection.php';


if (isset($_POST["joboffer"])) {

    if (isset($_SESSION["id_company"]) || isset($_SESSION["id_user"])) {

        $idUserCreated = 0;

        if (isset($_SESSION["id_company"])) {
            $idUserCreated = $_SESSION["id_company"];
        } else {
            $idUserCreated = $_SESSION["id_user"];
        }

        

        $title = $_POST["title"];
        $description = $_POST["description"];
        $datestart = $_POST["datestart"];
        $dateend = $_POST["dateend"];
        $address = $_POST["address"];
        $salary = $_POST["salary"];
        $typeJob = $_POST["type-job"];
        $stateJob = $_POST["state-job"];
        $limitJob = $_POST["limit-job"];
        $category = $_POST["category"];
        $idUser = $idUserCreated; 


        $sql = "INSERT INTO `joboffers`(`title_joboffer`, `description_joboffer`, `publicationdate_joboffer`, `addres_joboffer`, `salary_joboffer`, `contractype_joboffer`, `enddate_joboffer`, `state_joboffer`, `category_joboffer`, `limit_joboffer`, `date_created_joboffer`, `date_update_joboffer`, `id_companies_joboffer`, `id_category_joboffer`) VALUES ('$title','$description',' $datestart','$address','$salary','$typeJob','$dateend','$stateJob','$category','$limitJob','','','$idUser','$category')";
        $connect = Connection::connect();
        $stmt = $connect->prepare($sql);
        if ($stmt->execute()) {
            header("location: ../../components/joboffer/joboffer-start.php");
        } else {
            echo "Error al crear el oferta laboral:";
        }
    }
}
