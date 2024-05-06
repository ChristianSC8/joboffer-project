    <?php
    session_start();
    require_once '../../config/connection.php';

    if (isset($_POST["login"])) {

        $email = $_POST["email"];
        $password = $_POST["password"];

        $compayRole = 2;
        $connect = Connection::connect();
        $sql = "SELECT id_rol_company, email_company FROM companies WHERE email_company = :email AND id_rol_company = :rolecp";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':rolecp', $compayRole);
        $stmt->execute();
        $companies = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($companies && $companies['id_rol_company'] == $compayRole) {
            $connect = Connection::connect();
            $sql = "SELECT * FROM companies WHERE email_company = :email";
            $stmt = $connect->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $companies = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($companies) {

                if (password_verify($password, $companies['password_company'])) {
                    $connect = Connection::connect();
                    $sql = "SELECT u.*, r.name_rol AS name_rol_company FROM companies u INNER JOIN roles r ON u.id_rol_company = r.id_rol WHERE u.email_company = :email";
                    $stmt = $connect->prepare($sql);
                    $stmt->bindParam(':email', $email);
                    $stmt->execute();
                    $company = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($company) {
                        $_SESSION["user_authenticated"] = true;
                        $_SESSION["id_company"] = $company['id_company'];
                        $_SESSION["company_name"] = $company['username_company'];
                        $_SESSION["id_rol_company"] = $company['id_rol_company'];
                        $_SESSION["name_rol_company"] = $company['name_rol_company'];

                        header("Location: ../../components/dashboard/dashboard.php");
                        exit();
                    } else {
                        echo 'Error: No se pudo recuperar el usuario.';
                    }
                }
            } else {
                echo 'Error ';
            }
        }

        $userRole = 1;
        $connect = Connection::connect();
        $sql = "SELECT id_rol_user, email_user FROM users WHERE email_user = :email AND id_rol_user = :roleus";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':roleus', $userRole);
        $stmt->execute();
        $users = $stmt->fetch(PDO::FETCH_ASSOC);



        if ($users && $users['id_rol_user'] == $userRole) {
            $connect = Connection::connect();
            $sql = "SELECT * FROM users WHERE email_user = :email";
            $stmt = $connect->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $users = $stmt->fetch(PDO::FETCH_ASSOC);


            if ($users) {
                if (password_verify($password, $users['password_user'])) {

                    $connect = Connection::connect();
                    $sql = "SELECT u.*, r.name_rol AS name_rol_user FROM users u INNER JOIN roles r ON u.id_rol_user = r.id_rol WHERE u.email_user = :email";
                    $stmt = $connect->prepare($sql);
                    $stmt->bindParam(':email', $email);
                    $stmt->execute();
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($user) {
                        $_SESSION["user_authenticated"] = true;
                        $_SESSION["id_user"] = $user['id_user'];
                        $_SESSION["username_user"] = $user['username_user'];
                        $_SESSION["id_rol_user"] = $user['id_rol_user'];
                        $_SESSION["name_rol_user"] = $user['name_rol_user'];

                        header("Location: ../../components/dashboard/dashboard.php");
                        exit();
                    }
                }
            } else {
                echo 'Error ';
            }
        }

        
        $postRole = 3;
        $connect = Connection::connect();
        $sql = "SELECT id_rol_user, email_user FROM users WHERE email_user = :email AND id_rol_user = :roleus";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':roleus', $postRole);
        $stmt->execute();
        $users = $stmt->fetch(PDO::FETCH_ASSOC);

        

        if ($users && $users['id_rol_user'] == $postRole) {
            $connect = Connection::connect();
            $sql = "SELECT * FROM users WHERE email_user = :email";
            $stmt = $connect->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $users = $stmt->fetch(PDO::FETCH_ASSOC);
            

            if ($users) {
                if (password_verify($password, $users['password_user'])) {
                    
                    $connect = Connection::connect();
                    $sql = "SELECT u.*, r.name_rol AS name_rol_user FROM users u INNER JOIN roles r ON u.id_rol_user = r.id_rol WHERE u.email_user = :email";
                    $stmt = $connect->prepare($sql);
                    $stmt->bindParam(':email', $email);
                    $stmt->execute();
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    if ($user) {
                        $_SESSION["user_authenticated"] = true;
                        $_SESSION["username_user"] = $user['username_user'];
                        $_SESSION["id_rol_user"] = $user['id_rol_user'];
                        $_SESSION["name_rol_user"] = $user['name_rol_user'];
                        
                        header("Location: ../../../index.php");
                        exit();
                    }
                }
            } else {
                echo 'Error ';
            }
        }
    }

    ?>
