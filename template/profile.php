<?php
    include '../model/config/connect.php';
    include '../model/profile/profileFunc.php';

    session_start();
    // If the user is not logged in redirect to the sign in page...
    if (!isset($_SESSION['loggedin'])) {
        header('Location: signin.php');
        exit;
    }

    $profileDetails = getProfileDetails();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../design/default/header.css">
    <link rel="stylesheet" href="../design/pages/profile.css">
    <link rel="stylesheet" href="../design/default/footer.css">
    <title><?php echo $_SESSION['sVoornaam'];?> | Fight Floor</title>
</head>

<body>

    <?php include 'default/header.php' ?>

    <main>
        <div class="blank-container"></div>

        <div class="welcome-container">
            <div class="welcome-content">
                <div class="img-container"><img src="../media/profile.svg" alt=""></div>
                <div class="text-container">
                    <h3>hey <span><?php echo $_SESSION['sVoornaam'];?></span>, hier is jouw profiel.</h3>
                </div>
            </div>
        </div>

        <div class="flex-container">
            <div class="flex-content">
                <div class="content-box motivation left">
                    <div class="text-container">
                        <?php
                        if($_SESSION['rollen_idRol'] == 2){
                        echo "  
                        <ul>
                            <li><a href='admin.php?LessonFunc=1'>toevoegen lessen</a></li>
                            <li><a href='admin.php?LessonFunc=3'>bekijken lessen</a></li>
                        </ul>";
                        } elseif ($_SESSION['rollen_idRol'] == 1) {
                            echo "  
                            <ul>
                                <li><a href='admin.php?LessonFunc=4'>Toevoegen sporten</a></li>
                                <li><a href='admin.php?LessonFunc=3'>bekijken lessen</a></li>
                            </ul>";    
                        }
                        else {
                            echo "<h3>wij zijn trots op jou. <br> inmiddels heb je al <span>13</span> <br> lessen afgerond... 👏🏽</h3>";
                        }
                        ?>
                    </div>
                </div>
                <div class="content-box right">
                    <div class="text-container">
                        <ul>
                            <li class="label">Volledige naam: <p>
                                    <? echo $profileDetails['sVoornaam']; ?>
                                    <? echo $profileDetails['sAchternaam']; ?>
                                </p>
                            </li>
                            <li class="label">Telefoonnummer: <p>
                                    <? echo $profileDetails['sTelefoon']; ?>
                                </p>
                            </li>
                            <li class="label">e-Mailadres: <p>
                                    <? echo $profileDetails['sMail']; ?>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex-content" id="flex-direction">
                <div class="content-box motivation right">
                    <div class="text-container">
                        <?php
                        if($_SESSION['rollen_idRol'] == 2){
                            echo "  
                            <ul>
                                <li><a href='updateform.php?id=". $_SESSION['idUser'] ."'>Profiel bewerken</a></li>
                            </ul>";
                            } elseif ($_SESSION['rollen_idRol'] == 1) {
                                echo "  
                                <ul>
                                    <li><button id='registerBtn'>Medewerker registreren</button>
                                    </li>
                                    <li><a href='updateform.php?id=". $_SESSION['idUser'] ."'>Profiel bewerken</a></li>
                                </ul>
                                <div class='modal' id='registerModal'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <div class='modal-header-content'>
                                            <h3>Registratie</h3>
                                            <span class='close bi bi-x'></span>
                                        </div>
                                        <div class='modal-body'>
                                            <div class='modal-body-content'>
                                                <form action='admin.php?SessionFunc=6' method='post' class='form-wizard js-form-wizard'
                                                    novalidate>
                                                    <div class='progress-bar js-progress-bar'></div>
                                                    <div class='step js-step'>
                                                        <div class='input-group js-input-group'>
                                                            <label for='voornaam'>Voornaam</label>
                                                            <input type='text' name='voornaam' class='form-control js-form-control'
                                                                placeholder='Joey' required>
                                                        </div>
                                                        <div class='input-group js-input-group'>
                                                            <label for='achternaam'>Achternaam</label>
                                                            <input type='text' name='achternaam' class='form-control js-form-control'
                                                                placeholder='Haas' required>
                                                        </div>
                                                    </div>
                    
                                                    <div class='step js-step'>
                                                        <div class='input-group js-input-group'>
                                                            <label for='woonplaats'>woonplaats</label>
                                                            <input type='text' name='woonplaats' class='form-control js-form-control'
                                                                placeholder='Amsterdam' required>
                                                        </div>
                                                        <div class='input-group js-input-group'>
                                                            <label for='adres'>adres</label>
                                                            <input type='text' name='adres' class='form-control js-form-control'
                                                                placeholder='Bachstraat 1' required>
                                                        </div>
                                                        <div class='input-group js-input-group'>
                                                            <label for='postcode'>postcode</label>
                                                            <input type='text' name='postcode' class='form-control js-form-control'
                                                                placeholder='1234 AB' required>
                                                        </div>
                                                    </div>
                    
                                                    <div class='step js-step'>
                                                        <div class='input-group js-input-group'>
                                                            <label for='Telefoonnummer'>Telefoonnummer</label>
                                                            <input type='text' name='telefoonnummer' class='form-control js-form-control'
                                                                placeholder='06 123 45 678' required>
                                                        </div>
                                                        <div class='input-group js-input-group'>
                                                            <label for='e-mailadres'>e-mailadres</label>
                                                            <input type='text' name='mail' class='form-control js-form-control'
                                                                placeholder='support@fight-floor.com' required>
                                                        </div>
                                                        <div class='input-group js-input-group'>
                                                            <label for='wachtwoord'>wachtwoord</label>
                                                            <input type='password' name='wachtwoord' class='form-control js-form-control'
                                                                placeholder='*********' required>
                                                        </div>
                                                    </div>
                    
                                                    <div class='input-group button-group'>
                                                        <button type='button' class='btn-prev js-btn-prev' id='previous'><i
                                                                class='bi bi-arrow-left'></i></button>
                                                        <button type='button' class='js-btn-next' id='next' data-step-text='volgende'
                                                            data-final-step-text='voltooien'>volgende</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";    
                            }
                            else {
                            echo "<h3><span>kickboks</span> is de sport die je <br> het afgelopen jaar het <br> meest hebt beoefend.</h3>";
                        }
                        ?>
                    </div>
                </div>
                <div class="content-box left">
                    <div class="text-container">
                        <ul>
                            <li class="label">Straatnaam/Huisnummer: <p>
                                    <? echo $profileDetails['sAdres']; ?>
                                </p>
                            </li>
                            <li class="label">Woonplaats: <p>
                                    <? echo $profileDetails['sWoonplaats']; ?>
                                </p>
                            </li>
                            <li class="label">Postcode: <p>
                                    <? echo $profileDetails['sPostcode']; ?>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'default/footer.php' ?>

    <script src="../javascript/script.js"></script>
    <script src="../javascript/register.js"></script>

</body>

</html>