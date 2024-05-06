<?php
require_once '../../config/connection.php';



if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $connect = Connection::connect();
        $sql = "DELETE FROM companies WHERE id_company = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {

        } else {

        }
        header("location: ../../components/company/company-start.php");
    } catch (PDOException $e) {
        $message = "Error al eliminar usuario: " . $e->getMessage();
    }
}