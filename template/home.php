<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../design/default/header.css">
    <link rel="stylesheet" href="../design/pages/home.css">
    <link rel="stylesheet" href="../design/default/footer.css">
    <title>Home | Fight Floor</title>
</head>
<body>
    <?php include 'default/header.php' ?>

    <main>
        <div class="hero-video">
            <video src="../media/home/training.mp4" autoplay loop></video>
            <div class="hero-cta">
                <h3>zet <span>jezelf</span> <br> eens op het <br> prioriteitenlijstje.</h3>
                <button id="registerBtn">registreren</button>
            </div>
        </div>

        <div class="flex-container">
            <div class="flex-content" id="change-direction">
                <div class="flex-content-left">
                    <div class="text-container">
                        <h3 class="text-right" id="content-title">fight floor</h3>
                        <h3 class="text-right" id="outline">hier staan <br> wij voor</h3>
                        <p class="text-right" id="content-text">
                            Lorem ipsum dolor sit, amet consectetur adipisicing
                            elit. Delectus, iusto. Vel reprehenderit iste dicta est accusamus iure illum possimus, porro
                            rem officia ducimus doloremque eaque tempore, quas nisi impedit deleniti sapiente sit,
                            temporibus quod ipsam velit odit totam blanditiis! Mollitia?
                        </p>
                    </div>
                </div>
                <div class="flex-content-right">
                    <div class="image-container">
                        <img src="../media/home/our_club.jpg">
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="registerModal">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-header-content">
                        <h3>Registratie</h3>
                        <span class="close bi bi-x"></span>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body-content">
                            <form action="../model/register.php" method="post" class="form-wizard js-form-wizard"
                                novalidate>
                                <div class="progress-bar js-progress-bar"></div>
                                <div class="step js-step">
                                    <div class="input-group js-input-group">
                                        <label for="voornaam">Voornaam</label>
                                        <input type="text" name="voornaam" class="form-control js-form-control"
                                            placeholder="Joey" required>
                                    </div>
                                    <div class="input-group js-input-group">
                                        <label for="achternaam">Achternaam</label>
                                        <input type="text" name="achternaam" class="form-control js-form-control"
                                            placeholder="Haas" required>
                                    </div>
                                </div>

                                <div class="step js-step">
                                    <div class="input-group js-input-group">
                                        <label for="woonplaats">woonplaats</label>
                                        <input type="text" name="woonplaats" class="form-control js-form-control"
                                            placeholder="Amsterdam" required>
                                    </div>
                                    <div class="input-group js-input-group">
                                        <label for="adres">adres</label>
                                        <input type="text" name="adres" class="form-control js-form-control"
                                            placeholder="Bachstraat 1" required>
                                    </div>
                                    <div class="input-group js-input-group">
                                        <label for="postcode">postcode</label>
                                        <input type="text" name="postcode" class="form-control js-form-control"
                                            placeholder="1234 AB" required>
                                    </div>
                                </div>

                                <div class="step js-step">
                                    <div class="input-group js-input-group">
                                        <label for="Telefoonnummer">Telefoonnummer</label>
                                        <input type="text" name="telefoonnummer" class="form-control js-form-control"
                                            placeholder="06 123 45 678" required>
                                    </div>
                                    <div class="input-group js-input-group">
                                        <label for="e-mailadres">e-mailadres</label>
                                        <input type="text" name="mail" class="form-control js-form-control"
                                            placeholder="support@fight-floor.com" required>
                                    </div>
                                    <div class="input-group js-input-group">
                                        <label for="wachtwoord">wachtwoord</label>
                                        <input type="password" name="wachtwoord" class="form-control js-form-control"
                                            placeholder="*********" required>
                                    </div>
                                </div>

                                <div class="input-group button-group">
                                    <button type="button" class="btn-prev js-btn-prev" id="previous"><i
                                            class="bi bi-arrow-left"></i></button>
                                    <button type="button" class="js-btn-next" id="next" data-step-text="volgende"
                                        data-final-step-text="voltooien">volgende</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-container">
            <div class="flex-content">
                <div class="flex-content-left">
                    <div class="text-container">
                        <h3 id="content-title">onze</h3>
                        <h3 id="outline">lessen & <br> services</h3>
                        <p id="content-text">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus, iusto.
                            Vel reprehenderit iste dicta est accusamus iure illum possimus, porro rem officia ducimus
                            doloremque eaque tempore, quas nisi impedit deleniti sapiente sit, temporibus quod ipsam
                            velit odit totam blanditiis! Mollitia?
                        </p>
                    </div>
                </div>
                <div class="flex-content-right">
                    <div class="image-container">
                        <img src="../media/home/girl_boxing.jpg">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex-container" id="bottom-container">
            <div class="flex-content" id="change-direction">
                <div class="flex-content-left">
                    <div class="text-container">
                        <h3 class="text-right" id="bottom-container-title">over</h3>
                        <h3 class="text-right" id="outline">ons</h3>
                        <p class="text-right" id="content-text">
                            Lorem ipsum dolor sit, amet consectetur adipisicing
                            elit. Delectus, iusto. Vel reprehenderit iste dicta est accusamus iure illum possimus, porro
                            rem officia ducimus doloremque eaque tempore, quas nisi impedit deleniti sapiente sit,
                            temporibus quod ipsam velit odit totam blanditiis! Mollitia?
                        </p>
                    </div>
                </div>
                <div class="flex-content-right">
                    <div class="image-container">
                        <img src="../media/home/our_coach.jpg">
                    </div>
                </div>
            </div>
        </div>

        <div class="socials">
            <div class="socials-content">
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
    </main>

    <?php include 'default/footer.php' ?>

    <script src="../javascript/script.js"></script>
    <script src="../javascript/register.js"></script>

</body>
</html>