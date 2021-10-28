<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../design/default/header.css">
    <link rel="stylesheet" href="../design/pages/registerEmployee.css">
    <link rel="stylesheet" href="../design/default/footer.css">
    <title>Document</title>
</head>
<body>
    
<div class="modal-body-content">
                            <form action="../model/session/register.php" method="post" class="form-wizard js-form-wizard"
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

                        <script src="../javascript/register.js"></script>
</body>
</html>