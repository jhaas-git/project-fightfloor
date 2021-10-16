<?php
    include '../model/config/connect.php';
    session_start();
    // If the user is not logged in redirect to the sign in page...
    if (!isset($_SESSION['loggedin'])) {
        header('Location: signin.php');
        exit;
    }
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
                        <h3>wij zijn trots op jou. <br> inmiddels heb je al <span>13</span> <br> lessen afgerond... 👏🏽
                        </h3>
                    </div>
                </div>
                <div class="content-box right">
                    <div class="text-container">
                        <ul>
                            <li class="label">Volledige naam: <p>Joey Haas</p>
                            </li>
                            <li class="label">Telefoonnummer: <p>06 818 35 742</p>
                            </li>
                            <li class="label">e-Mailadres: <p>joeyhaas@gmail.com</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex-content" id="flex-direction">
                <div class="content-box motivation right">
                    <div class="text-container">
                        <h3><span>kickboks</span> is de sport die je <br> het afgelopen jaar het <br> meest hebt
                            beoefend.</h3>
                    </div>
                </div>
                <div class="content-box left">
                    <div class="text-container">
                        <ul>
                            <li class="label">Straatnaam/Huisnummer: <p>Flipje's Erf 34</p>
                            </li>
                            <li class="label">Woonplaats: <p>Tiel</p>
                            </li>
                            <li class="label">Postcode: <p>4005 GD</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include 'default/footer.php' ?>

    <script src="../javascript/script.js"></script>

</body>
</html>