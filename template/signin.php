<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../design/default/header.css">
    <link rel="stylesheet" href="../design/pages/signin.css">
    <link rel="stylesheet" href="../design/default/footer.css">
    <title>Aanmelden | Fight Floor</title>
</head>
<body>

    <?php include 'default/header.php' ?>

    <main>
        <div class="split-container">
            <div class="left-container">
                <div class="left-content">
                <div class="form-container">
                    <h3 class="title">aanmelden</h3>
                    <p>Nog geen account? <a href="#">Registreer hier</a>!</p>

                    <form action="../model/authenticate.php">
                        <input type="text" name="username" placeholder="E-mailadres" required>
                        <input type="password" name="wachtwoord" placeholder="wachtwoord" required>
                        <p class="remember"><input type="checkbox" name="remember" id=""> Gegevens onthouden</p>
                        <button type="submit">aanmelden</button>
                    </form>
                </div>
                </div>
            </div>
            <div class="right-container">
            </div>
        </div>
    </main>

    <?php include 'default/footer.php' ?>

    <script src="../javascript/script.js"></script>

</body>
</html>