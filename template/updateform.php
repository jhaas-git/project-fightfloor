<?php 
include '../model/accounts/AccountFunc.php';

session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: signin.php');
    exit;
}

// Assign $gebruikers to the updateForm function. Now these database results are echo'able.
$gebruikers = updateForm();

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
    <link rel="stylesheet" href="../design/pages/admin.css">
    <link rel="stylesheet" href="../design/default/footer.css">
    <title>Document</title>
</head>

<body>

    <?php include 'default/header.php' ?>

    <main>
        <div class="container">
            <form action='admin.php?AccountFunc=8' method='post'>
                <h3 class="small">Voornaam</h3>
                <input type='text' name='voornaam' value='<?php echo $gebruikers['sVoornaam'] ?>'>
                <h3 class="small">Achternaam</h3>
                <input type='text' name='achternaam' value='<?php echo $gebruikers['sAchternaam'] ?>'>
                <h3 class="small">Woonplaats</h3>
                <input type='text' name='woonplaats' value='<?php echo $gebruikers['sWoonplaats'] ?>'>
                <h3 class="small">Adres</h3>
                <input type='text' name='adres' value='<?php echo $gebruikers['sAdres'] ?>'>
                <h3 class="small">Postcode</h3>
                <input type='text' name='postcode' value='<?php echo $gebruikers['sPostcode'] ?>'>
                <h3 class="small">Telefoonnummer</h3>
                <input type='text' name='telefoonnummer' value='<?php echo $gebruikers['sTelefoon'] ?>'>
                <h3 class="small">e-Mailadres</h3>
                <input type='text' name='mail' value='<?php echo $gebruikers['sMail'] ?>'>
                <button type='submit'>updaten</button>
            </form>
        </div>
    </main>

    <?php include 'default/footer.php' ?>

    <script src="../javascript/script.js"></script>

</body>
</html>