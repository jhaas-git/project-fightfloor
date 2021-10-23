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
                    echo "<a href='#'>inschrijven</a>";
                    }
                    else if($_SESSION['rollen_idRol'] == 1 || $_SESSION['rollen_idRol'] == 2){
                        echo "<a href='#'>deelnemerslijst</a>";
                    }
                    echo "
                </div>
            </li>";
    }
    $pdo=null;
}
?>