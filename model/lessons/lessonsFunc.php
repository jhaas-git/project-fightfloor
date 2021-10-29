<?php

function lessonsForm() {
    session_start();
    require '../model/config/connect.php';

    echo "
        <form action='admin.php?LessonFunc=2' method='post'> 
            <h3 class='small'>Coach</h3>
            <select name='coach'>";
            // Function makes a select option foreach fetched row.
                getCoach();
                echo "
            </select>
            <h3 class='small'>Sport</h3>
            <select name='sport'>";
            // Function makes a select option foreach fetched row.
                getSport();
                echo "
            </select>
            <h3 class='small'>Les beschrijving</h3>
            <input type='text' name='sub'>
            <h3 class='small'>Tijdstip</h3>
            <input type='datetime-local' name='date'>
            <button type='submit'>voltooien</button>
        </form>
    ";
}

// Fetch all coaches from the database. These will result in select options.
function getCoach() {
    require '../model/config/connect.php';

    $selectCoach = $pdo->query('SELECT * FROM gebruikers WHERE rollen_idRol = 2');

    foreach ($selectCoach as $coach)
    {
        // Value has to be the id of the user. Without passing the id it won't be inserted.
        echo "<option value='". $coach['idUser'] ."'>". $coach['sVoornaam'] ."</option>";
    }
    $pdo=null;
}

// Fetch all sports from the database. These will result in select options.
function getSport() {
    require '../model/config/connect.php';

    $selectSport = $pdo->query('SELECT * FROM sport');

    foreach ($selectSport as $sport)
    {
        // Value has to be the id of the user. Without passing the id it won't be inserted.
        echo "<option value='". $sport['idSport'] ."'>". $sport['sNaamSport'] ."</option>";
    }
    $pdo=null;
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

    header('Location: profile.php');
}

function fetchLessons() {
    require '../model/config/connect.php';

    // Fetching all lessons
    $selectLessons = $pdo->query('SELECT * FROM lessen');

    // Echo the title and table to display data in.
    echo "<h3 class='small'>Lijst met lessen</h3>
    <table class='participants-table'>
    <tr>
        <th>les ID</th>
        <th>Tijdstip</th>
        <th>Deelnemerslijst</th>
    <tr>";

    // Foreach result a table row is made which displays information about lessons.
    foreach ($selectLessons as $lesInfo)
    {
      echo "
        <tr>
            <td>". $lesInfo['idLes'] ."</td>
            <td>". $lesInfo['dTijdstip'] ."</td>  
            <td><a href='participants.php?idlijst=". $lesInfo['idLes'] ."'>deelnemerslijst</a></td>                              
        </tr>";
    } echo "</table>";

    $pdo=null;
}

function sportForm() {
    session_start();
    require '../model/config/connect.php';

    // Display the form
    echo "
        <form action='admin.php?LessonFunc=5' method='post'> 
            <h3 class='small'>Sportnaam</h3>
            <input type='text' placeholder='Kickboks' name='sport'></input>
            <button type='submit'>voltooien</button>
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