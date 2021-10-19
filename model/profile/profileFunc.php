<?
session_start();

function profileDetails(){
    require '../config/connect.php';
    
    // SELECT user specific information.
    $selectDetails = 'SELECT sVoornaam, sAchternaam, sWoonplaats, sAdres, sPostcode, sTelefoon, sMail 
            FROM gebruikers 
            WHERE idUser=:idUser';

    $statement = $pdo->prepare($selectDetails);
    $statement->execute([
        ':idUser' => $_SESSION['idUser']
    ]);

    while (($row = $statement->fetch(PDO::FETCH_ASSOC)) !== false) {
        echo $row['sVoornaam'] . '<br>';
        echo $row['sAchternaam'] . '<br>';
        echo $row['sWoonplaats'] . '<br>';
        echo $row['sAdres'] . '<br>';
        echo $row['sPostcode'] . '<br>';
        echo $row['sTelefoon'] . '<br>';
        echo $row['sMail'] . '<br>';
    }
}

profileDetails();
?>