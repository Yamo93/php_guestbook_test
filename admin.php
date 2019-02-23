<?php 

    $page_title = "Gästbok med databas";
    include('includes/config.php');
    include('includes/header.php');
    include('includes/sidebar.php');

    error_reporting(-1);
    ini_set("display_errors", 1);

    // Skicka användare till panel om hen är inloggad
    if(isset($_SESSION['username'])) {
        header("Location: secret.php");
    }

    spl_autoload_register(function ($class) {
        include 'classes/' . $class . '.class.php';
    });

    $gastbok = new DBGastbok();

    $message = "";
    global $message;

    if(isset($_POST['submit'])) {
        if(!empty($_POST['login_username']) && !empty($_POST['login_password'])) {
            if($gastbok->loginUser($_POST['login_username'], $_POST['login_password'])) {
                header("Location: secret.php");
            } else {
                $message = "Felaktigt användarnamn eller lösenord.";
            }

        } else {
            $message = "Var vänlig och fyll i fälten, tack!";
        }
    }


?>

            <h1 class="title"><?= $page_title; ?></h1>

            <ul class="gastbok_nav">
                <li><a href="dbgastbok.php">Startsida</a></li>
                <li><a href="#" class="menu-active">Administration</a></li>
                <li><a href="webservice.php">JSON</a></li>
                <li><a href="consume.php">Webbtjänst</a></li>
            </ul>

            <h1 class="alert"><?php echo $message; ?></h1>
            
            <form method="POST" class="login">
                <h1 class="title">Logga in till panelen</h1>
                <p class="info">Användarnamn är: 
                    <?php
                    $sql = "SELECT * FROM users WHERE id = 1";
                    $result = $gastbok->db->query($sql);
                    $userinfo = $result->fetch_assoc();
                    echo "<span>" . $userinfo['username'] . "</span>";
                    echo " och lösenord är: " . "<span>" . $userinfo['password'] . "</span>.";
                    ?>
                </p>
                <label class="login__namn" for="namn">Användarnamn:</label>
                <input type="text" name="login_username" id="namn" class="login__username" placeholder="Ange ditt användarnamn">
                <label class="login__namn" for="namn">Lösenord:</label>
                <input type="password" name="login_password" id="namn" class="login__password" placeholder="Ange ditt lösenord">
                <input type="submit" name="submit" class="loginbtn" value="Logga in">
            </form>

            <?php 
            $posts = $gastbok->getGastbok();
            if($posts) {
            foreach($posts as $key => $post) { ?>
                <div class="inlagg">
                    <p class="meddelande">Meddelande: <?= $post['post']; ?></p>
                <p class="skribent">Skrivet av <?= $post['username']; ?></p>
                <p class="datum">Publicerad <span><?= $post['postdate']; ?></span></p>
            </div>
        <?php } } ?>
        </section>
    </div>

<?php include('includes/footer.php');?>