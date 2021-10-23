<?php 
    include '../model/config/connect.php';
    include '../model/planning/planningFunc.php';

    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../design/default/header.css">
    <link rel="stylesheet" href="../design/pages/planning.css">
    <link rel="stylesheet" href="../design/default/footer.css">
    <title>Rooster | Fight Floor</title>
</head>
<body>

    <?php include 'default/header.php' ?>

    <main>
        <div class="container">
            <div class="timeline">
                <ul>
                    <?php
                        getLessons();
                    ?>
                </ul>
            </div>
        </div>
    </main>

    <?php include 'default/footer.php' ?>
    <script src="../javascript/script.js"></script>

</body>
</html>