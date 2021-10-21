<?
function getProfileDetails(){
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
?>