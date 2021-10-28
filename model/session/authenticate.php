<?php

require '../config/connect.php';

session_start();

$mail = $_POST['username'];
$wachtwoord = $_POST['wachtwoord'];
$hash = hash('sha256', $wachtwoord);

// Select user data related to the e-mail which the user submit.
$authenticateUser = "SELECT idUser, sVoornaam, sWachtwoord, rollen_idRol FROM gebruikers WHERE sMail = :mail";

$stmt = $pdo->prepare($authenticateUser);
$result = $stmt->execute([
    ':mail' => $mail
]);

if ($stmt->rowCount() == 1){
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the password equals the hashed field inside the database.
    if($hash == $user['sWachtwoord']){
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['idUser'] = $user['idUser'];
        $_SESSION['sVoornaam'] = $user['sVoornaam'];
        $_SESSION['rollen_idRol'] = $user['rollen_idRol'];

        header('Location: ../../template/profile.php');
    }
}

?>