<?php

function lessonsForm() {
    session_start();
    require '../model/config/connect.php';

    // Fetch data from sport and gebruikers to display in the multi selects.
    $fetchLessonData = 'SELECT *
    FROM gebruikers
    LEFT OUTER JOIN sport
    ON gebruikers.idUser = sport.idSport
    WHERE gebruikers.rollen_idRol = :idEmployee;';

    $statement = $pdo->prepare($fetchLessonData);
    $statement->execute([
        ':idEmployee' => 2
    ]);

    $lessonData = $statement->fetch(PDO::FETCH_ASSOC);
    echo "
        <form action='admin.php?LessonFunc=2' method='post'> 
            <label>Coach</label>
            <select name='coach'>
                <option>". $lessonData['idUser'] ."</option>
            </select>
            <label>Sport</label>
            <select name='sport'>
                <option>". $lessonData['idSport'] ."</option>
            </select>
            <label>Les beschrijving</label>
            <input type='text' name='sub'>
            <label>Tijdstip</label>
            <input type='datetime-local' name='date'>
            <input type='submit' value='voltooien'> 
        </form>
    ";
}

function insertLesson() {
    require '../model/config/connect.php';

    $coach = $_POST['coach'];
    $sport = $_POST['sport'];
    $sub = $_POST['sub'];
    $date = $_POST['date'];
    
    $insertLesson = "INSERT INTO lessen (gebruikers_idUser, sport_idSport, sBeschrijving, dTijdstip) 
    VALUES (:NaamCoach, :NaamSport, :BeschrijvingLes, :Tijdstip)";
    
    $stmt = $pdo->prepare($insertLesson);
    $stmt->execute([
        ':NaamCoach' => $coach,
        ':NaamSport' => $sport,
        ':BeschrijvingLes' => $sub,
        ':Tijdstip' => $date
    ]);
}

function fetchLessons() {
    require '../model/config/connect.php';

    // Only scheduled lessons that are upcoming will be displayed. Anything greater than the current time won't be shown. 
    // Ascending from first to last. This way it doesn't matter when a lesson is added.
    $selectLessons = $pdo->query('SELECT * FROM lessen
        RIGHT JOIN gebruikers
        ON lessen.gebruikers_idUser = gebruikers.idUser
        RIGHT JOIN sport
        ON lessen.sport_idSport = sport.idSport
        ORDER BY lessen.dTijdstip ASC;'
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

function sportForm() {
    session_start();
    require '../model/config/connect.php';

    echo "
        <form action='admin.php?LessonFunc=5' method='post'> 
            <input type='text' name='sport'></input>
            <input type='submit' value='voltooien'> 
        </form>
    ";
}

function insertSport() {
    require '../model/config/connect.php';

    $sport = $_POST['sport'];

    $insertSport = 'INSERT INTO sport (sNaamSport) VALUES (:NaamSport)';

    $stmt = $pdo->prepare($insertSport);
    $stmt->execute([
        ':NaamSport' => $sport
    ]);

    header('Location: profile.php');
}
?>