<?php
    include '../model/config/connect.php';
    session_start();
    // If the user is not logged in redirect to the sign in page...
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
    <link rel="stylesheet" href="../design/pages/home.css">
    <link rel="stylesheet" href="../design/default/footer.css">
    <title><?php echo $_SESSION['sVoornaam'];?> | Fight Floor</title>
</head>
<body>

<?php include 'default/header.php' ?>

    <main>
        <a href="../model/signout.php">uitloggen</a>
    </main>

<?php include 'default/footer.php' ?>

</body>
</html>