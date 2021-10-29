<?php
function updateForm() {
    require '../model/config/connect.php';
    session_start();

    require '../model/config/connect.php';
    
    $selectProfileDetails = 'SELECT sVoornaam, sAchternaam, sWoonplaats, sAdres, sPostcode, sTelefoon, sMail 
            FROM gebruikers 
            WHERE idUser=:idUser';

    $statement = $pdo->prepare($selectProfileDetails);
    $statement->execute([
        ':idUser' => $_SESSION['idUser']
    ]);

    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $pdo=null;
    return $row;
}

function updateUser() {
    require '../model/config/connect.php';
    session_start();

    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $woonplaats = $_POST['woonplaats'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $mail = $_POST['mail'];
    
    $updateUserInfo = 'UPDATE gebruikers 
    SET sVoornaam = :voornaam, sAchternaam = :achternaam, sWoonplaats = :woonplaats, sAdres = :adres, sPostcode = :postcode, sTelefoon = :telefoonnummer, sMail = :mail
    WHERE idUser=:idUser';
    
    $stmt = $pdo->prepare($updateUserInfo);
    $stmt->execute([
        ':voornaam' => $voornaam,
        ':achternaam' => $achternaam,
        ':woonplaats' => $woonplaats,
        ':adres' => $adres,
        ':postcode' => $postcode,
        ':telefoonnummer' => $telefoonnummer,
        ':mail' => $mail,
        ':idUser' => $_SESSION['idUser']
    ]);
    
    header("Location: ../template/profile.php");  

}

function updatePass() {
    require '../model/config/connect.php';
    session_start();

    $wachtwoord = $_POST['wachtwoord'];
    $hash = hash('sha256', $wachtwoord);
    
    $updateUserInfo = 'UPDATE gebruikers 
    SET sWachtwoord = :wachtwoord
    WHERE idUser=:idUser';
    
    $stmt = $pdo->prepare($updateUserInfo);
    $stmt->execute([
        ':wachtwoord' => $hash,
        ':idUser' => $_SESSION['idUser']
    ]);
    
    header("Location: ../template/signin.php");  
}

?>