<?php 

function insertMember() {
    require '../model/config/connect.php';

    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $woonplaats = $_POST['woonplaats'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $mail = $_POST['mail'];
    $wachtwoord = $_POST['wachtwoord'];
    $hash = hash('sha256', $wachtwoord);
    
    $insertAccount = "INSERT INTO gebruikers (sVoornaam, sAchternaam, sWoonplaats, sAdres, sPostcode, sTelefoon, sMail, sWachtwoord) 
    VALUES (:voornaam, :achternaam, :woonplaats, :adres, :postcode, :telefoonnummer, :mail, :wachtwoord)";
    
    $stmt = $pdo->prepare($insertAccount);
    $stmt->execute([
        ':voornaam' => $voornaam,
        ':achternaam' => $achternaam,
        ':woonplaats' => $woonplaats,
        ':adres' => $adres,
        ':postcode' => $postcode,
        ':telefoonnummer' => $telefoonnummer,
        ':mail' => $mail,
        ':wachtwoord' => $hash
    ]);
    
    header("Location: ../template/signin.php");    
}

function insertEmployee() {
    require '../model/config/connect.php';

    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $woonplaats = $_POST['woonplaats'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $telefoonnummer = $_POST['telefoonnummer'];
    $mail = $_POST['mail'];
    $wachtwoord = $_POST['wachtwoord'];
    $hash = hash('sha256', $wachtwoord);
    
    $insertAccount = "INSERT INTO gebruikers (sVoornaam, sAchternaam, sWoonplaats, sAdres, sPostcode, sTelefoon, sMail, sWachtwoord, rollen_idRol) 
    VALUES (:voornaam, :achternaam, :woonplaats, :adres, :postcode, :telefoonnummer, :mail, :wachtwoord, 2)";
    
    $stmt = $pdo->prepare($insertAccount);
    $stmt->execute([
        ':voornaam' => $voornaam,
        ':achternaam' => $achternaam,
        ':woonplaats' => $woonplaats,
        ':adres' => $adres,
        ':postcode' => $postcode,
        ':telefoonnummer' => $telefoonnummer,
        ':mail' => $mail,
        ':wachtwoord' => $hash
    ]);
    
    header("Location: ../template/signin.php");    
}

?>