<?php 
    include '../model/config/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../design/default/header.css">
    <link rel="stylesheet" href="../design/pages/participants.css">
    <link rel="stylesheet" href="../design/default/footer.css">
    <title>Member | Fight Floor</title>
</head>
<body>

    <?php include 'default/header.php' ?>

    <main>
        <div class="container" style="margin-top: 100px;">
            <?php 
                if(isset($_GET['SessionFunc'])) {
                    include '../model/session/register.php';

                    switch($_GET['SessionFunc']) {
                        case 1:insertMember();
                        break;
                    }
                }
            ?>
        </div>
    </main>

    <?php include 'default/footer.php' ?>

    <script src="../javascript/script.js"></script>

</body>
</html>