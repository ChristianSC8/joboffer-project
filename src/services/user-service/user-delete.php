<?php
require_once '../../config/connection.php';



if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $connect = Connection::connect();
        $sql = "DELETE FROM users WHERE id_user = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // session_start();
            // $_SESSION['deleteMsg'] = "User deleted successfully";
        } else {

        }
        header("location: ../../components/users/users-start.php");
    } catch (PDOException $e) {
        $message = "Error al eliminar usuario: " . $e->getMessage();
    }
}