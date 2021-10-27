<?php 
    include '../model/config/connect.php';
    include '../model/planning/planningFunc.php';

    session_start();

    // Page is only available for employees.
    if ($_SESSION['rollen_idRol'] == 1 || $_SESSION['rollen_idRol'] == 2) {
        session_start();
    } else {
        header('Location: signin.php');
        exit;
    }
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
    <title>Document</title>
</head>
<body>

    <?php include 'default/header.php' ?>

    <main>
        <div class="container">
            <div class="participant-container">
                <div class="participants-title">
                    <h3>ingeschreven leden.</h3>
                </div>
                <table class="participants-table">
                    <tr>
                        <th>Voornaam</th>
                        <th>Achternaam</th>
                        <th>Contact</th>
                    </tr>
                    <?php 
                        if (isset($_GET['idlijst'])) {
                            getParticipants();
                        }
                    ?>
                </table>
            </div>
        </div>
    </main>

    <?php include 'default/footer.php' ?>

    <script src="../javascript/script.js"></script>

</body>
</html>