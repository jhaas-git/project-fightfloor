 <?php 
    include '../model/config/connect.php';

    session_start();
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
    <link rel="stylesheet" href="../design/pages/participants.css">
    <link rel="stylesheet" href="../design/pages/admin.css">
    <link rel="stylesheet" href="../design/default/footer.css">
    <title>Admin | Fight Floor</title>
</head>
<body>

    <?php include 'default/header.php' ?>

    <main>
        <div class="container">
            <?php 
                if (isset($_GET['LessonFunc'])) {
                    include '../model/lessons/lessonsFunc.php';

                    switch($_GET['LessonFunc']) {
                        case 1:lessonsForm();
                        break;
                        case 2:insertLesson();
                        break;
                        case 3:fetchLessons();
                        break;
                        case 4:sportForm();
                        break;
                        case 5:insertSport();
                        break;
                    }
                } else if(isset($_GET['SessionFunc'])) {
                    include '../model/session/register.php';

                    switch($_GET['SessionFunc']) {
                        case 6:insertEmployee();
                        break;
                    }
                } else if(isset($_GET['AccountFunc'])) {
                    include '../model/accounts/accountFunc.php';

                    switch($_GET['AccountFunc']) {
                        case 7:updateForm();
                        break;
                        case 8: updateUser();
                        break;
                        case 9: updatePass();
                        break;
                    }
                }
            ?>
        </div>
    </main>

    <?php include 'default/footer.php' ?>

    <script src="../javascript/script.js"></script>

</body>
</html>