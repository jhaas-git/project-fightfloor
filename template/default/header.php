<header>
    <div class="header-container">
        <div class="header-left">
            <h3>Fight Floor</h3>
        </div>
        <!-- Animated burger-menu only displayed when viewport-
             is less than 600px wide.  -->
        <div class="header-mobile" id="burger-menu">
            <span></span>
        </div>
        <div class="header-right">
            <ul class="desktop">
                <li><a href="planning.php">rooster</a></li>
                <li><a href="#">huisregels</a></li>
                <?php 
                // Only display the link to admin panel when the logged in user has the
                // correct roles. 1 = eigenaar, 2 = coach.
                if ($_SESSION['rollen_idRol'] == 1 || $_SESSION['rollen_idRol'] == 2) {
                    echo "<li><a href='adminpanel.php'>admin paneel</a></li>";
                }
                // Display the 'aanmelden' button only when no session is set.
                // Session running? It will link to the profile with a greeting.
                if(!isset($_SESSION['loggedin'])) {
                    echo "<li><a href='../template/signin.php' class='loginBtn'>inloggen</a></li>";
                } else {
                    // Display the logged in users' name and link to their profile. 
                    echo "<li><a href='../template/profile.php'>Hallo, <span>". $_SESSION["sVoornaam"] ."</span></a></li>";
                    // Display the option to logout when logged in.
                    echo "<li><a href='../model/signout.php' class='loginBtn'>uitloggen</span></a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</header>