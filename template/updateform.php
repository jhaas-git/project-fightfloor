<?php 
include '../model/accounts/AccountFunc.php';

// Assign $gebruikers to the updateForm function. Now these database results are echo'able.
$gebruikers = updateForm();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action='admin.php?AccountFunc=8' method='post'>
        <input type='text' name='voornaam' value='<?php echo $gebruikers['sVoornaam'] ?>'>
        <input type='text' name='achternaam' value='<?php echo $gebruikers['sAchternaam'] ?>'>
        <input type='text' name='woonplaats' value='<?php echo $gebruikers['sWoonplaats'] ?>'>
        <input type='text' name='adres' value='<?php echo $gebruikers['sAdres'] ?>'>
        <input type='text' name='postcode' value='<?php echo $gebruikers['sPostcode'] ?>'>
        <input type='text' name='telefoon' value='<?php echo $gebruikers['sTelefoon'] ?>'>
        <input type='text' name='mail' value='<?php echo $gebruikers['sMail'] ?>'>
        <input type='password' name='wachtwoord' placeholder='********'>
        <button type='submit'>updaten</button>
    </form>

</body>
</html>