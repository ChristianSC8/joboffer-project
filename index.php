<!-- haed include  -->
<?php
session_start();

include "layouts/head.php";

// if (isset($_SESSION['user_authenticated']) && $_SESSION['user_authenticated'] === true) {
//     header("Location: src/components/dashboard/dashboard.php");
//     exit();
// }
?>
<!-- =============================================== -->
<main class="">

    <header class="">
        <?php
        include "src/components/app/app.header.php"
        ?>
    </header>
    <footer class="bg-white">
        <?php
        include "src/components/app/app.footer.php";
        ?>
    </footer>
</main>
<!-- =============================================== -->
<?php
include "layouts/footer.php";
?>
<!-- footer influde -->