<?
function getLessons(){
    require '../model/config/connect.php';

    // Only scheduled lessons that are upcoming will be displayed. Anything greater than the current time won't be shown. 
    // Ascending from first to last. This way it doesn't matter when a lesson is added.
    $selectLessons = $pdo->query('SELECT * FROM lessen
        RIGHT JOIN gebruikers
        ON lessen.gebruikers_idUser = gebruikers.idUser
        RIGHT JOIN sport
        ON lessen.sport_idSport = sport.idSport
        WHERE dTijdstip > CURRENT_TIMESTAMP ORDER BY lessen.dTijdstip ASC;'
    );

    foreach ($selectLessons as $lesInfo)
    {
        // Each result will create a new list item. The list item displays all information on that specific lesson.
        // When a logged in member visits the page, 'inschrijven' will be visible. This enables them to join a lesson.
        // When a logged in employee / owner visits the page, 'deelnemerslijst' will be visible. This enables them to fetch all members that signed up for that lesson.
        // If no session is active no button will be visible.
        echo "<li>
                <div class='timeline-result'>
                    <h3 class='result-date'>". $lesInfo['dTijdstip'] ."</h3>
                    <h1 class='result-title'>". $lesInfo['sNaamSport'] ."</h1>
                    <h3 class='result-coach'>". $lesInfo['sVoornaam'] ." ". $lesInfo['sAchternaam'] ."</h3>
                    <p class='result-info'>". $lesInfo['sBeschrijving'] ."</p>";
                    if($_SESSION['rollen_idRol'] == 3){
                    echo "<a href='../model/planning/planningFunc.php?id=". $lesInfo['idLes'] ."'>inschrijven</a>";
                    }
                    else if($_SESSION['rollen_idRol'] == 1 || $_SESSION['rollen_idRol'] == 2){
                        // This button handles another function (getParticipants). In this file as well.
                        echo "<a href='participants.php?idlijst=". $lesInfo['idLes'] ."'>deelnemerslijst</a>";
                    }
                    echo "
                </div>
            </li>";
    }
    $pdo=null;
}

// Retrieve database value of participants from a specific lesson. 
function getParticipants(){
    require '../model/config/connect.php';

    // Assign the get id to $idLijst
    $idLijst = filter_input(INPUT_GET, 'idlijst');
    
    $selectParticipants = 'SELECT * FROM gebruikers_has_lessen
        -- Get specific data about members
        INNER JOIN gebruikers
        ON gebruikers_has_lessen.gebruikers_idUser = gebruikers.idUser
        WHERE lessen_idLes = :idLes
        -- Ordered alphabetical on first name
        ORDER BY gebruikers.sVoornaam ASC';

    $statement = $pdo->prepare($selectParticipants);
    $statement->execute([
        // Assign $idLijst to the database value :idLes.
        ':idLes' => $idLijst
    ]);

    $participants = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($participants as $participant) {
        // Create a new table row for each idUser. Displays their first- last name and phone number.
        echo "<tr>
                <td>". $participant['sVoornaam'] ."</td>
                <td>". $participant['sAchternaam'] ."</td>  
                <td>". $participant['sTelefoon'] ."</td>                              
             </tr>";
    }
    $pdo=null;
}

// When a member clicks on 'inschrijven', insert the user into the lesson.
if (isset($_GET['id'])) {
    session_start();
    require '../config/connect.php';

    // Assign the id from the get to $idLes
    $idLes = filter_input(INPUT_GET, 'id');
    $sql = 'INSERT INTO gebruikers_has_lessen(gebruikers_idUser, lessen_idLes) VALUES (:idUser, :idLes)';
    
    $statement = $pdo->prepare($sql);
    $statement->execute([
        // Assign $idLes to the database value :idLes.

        ':idUser' => $_SESSION['idUser'],
        ':idLes' => $idLes
    ]);

    header('Location: ../../template/planning.php');
}

?>