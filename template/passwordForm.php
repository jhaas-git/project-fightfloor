<?php 
include '../model/accounts/AccountFunc.php';

session_start();
if (!isset($_SESSION['loggedin'])) {
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
    <link rel="stylesheet" href="../design/pages/admin.css">
    <link rel="stylesheet" href="../design/default/footer.css">
    <title>Document</title>
</head>

<body>

    <?php include 'default/header.php' ?>

    <main>
        <div class="container">
            <form action='admin.php?AccountFunc=9' method='post'>
                <h3 class="small">nieuw wachtwoord</h3>
                <input type='password' name='wachtwoord' placeholder='********' required>
                <button type='submit'>updaten</button>
            </form>
        </div>
    </main>

    <?php include 'default/footer.php' ?>

    <script src="../javascript/script.js"></script>

</body>
</html>