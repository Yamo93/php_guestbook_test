<?php 

    $page_title = "Gästbok med databas";
    include('includes/config.php');
    include('includes/header.php');
    include('includes/sidebar.php');

    if(!isset($_SESSION['username'])) {
        header("Location: admin.php");
    }

    error_reporting(-1);
    ini_set("display_errors", 1);

    spl_autoload_register(function ($class) {
        include 'classes/' . $class . '.class.php';
    });

    $gastbok = new DBGastbok();
    $message = "";
    global $message;

    if(isset($_GET['success']) && $_GET['success'] == 1) {
        $message = "Meddelandet har skickats!";
        $class = "success";
    } else if (isset($_GET['success']) && $_GET['success'] == 2) {
        $message = "Meddelandet har raderats!";
        $class = "alert";
    } else if (isset($_GET['success']) && $_GET['success'] == 3) {
        $message = "Meddelandet har redigerats!";
        $class = "success";
        
    }

    if(isset($_POST['submit'])) {
        if(!empty($_POST['gastbok_namn']) && !empty($_POST['gastbok_msg'])) {
            $gastbok->addPost($_POST['gastbok_namn'], $_POST['gastbok_msg']);
            unset($_POST['submit']);
            header("Location: secret.php?success=1");
            exit();
        } else {
            $message = "Fyll i fälten, tack!";
        }
    }

    if(isset($_GET['radera'])) {
        if($gastbok->removePost($_GET['radera'])) {
            header("Location: secret.php?success=2");
            $message = "Inlägget har raderats!";
            unset($_GET['radera']);
        }
    }

    if(isset($_POST['logout'])) {
        session_destroy();
        header("Location: admin.php");
    }


?>

            <h1 class="title"><?= $page_title; ?></h1>

            <ul class="gastbok_nav">
                <li><a href="dbgastbok.php">Startsida</a></li>
                <li><a href="admin.php"  class="menu-active">Administration</a></li>
                <li><a href="webservice.php">JSON</a></li>
                <li><a href="consume.php">Webbtjänst</a></li>
            </ul>

            <h1 class="<?= $class; ?>"><?php echo $message; ?></h1>
            
            <form method="POST" class="admin">
                <p class="info">Du är inloggad som <?= "<span>" . $_SESSION['username'] . "</span>"; ?>.</p>

                <input type="submit" name="logout" class="logoutbtn" value="Logga ut">

                <label class="gastbok__namn" for="namn">Namn:</label>
                <input type="text" name="gastbok_namn" id="namn" class="gastbok__inputnamn" placeholder="Ange ditt namn tack.">
                <label for="msg" class="gastbok__msg">Meddelande:</label>
                <textarea class="msgfalt" name="gastbok_msg" id="msg" cols="20" rows="10" placeholder="Skriv ditt inlägg här."></textarea>
                <input type="submit" name="submit" class="skapa" value="Skapa inlägg">
            </form>

            <?php 
            $posts = $gastbok->getGastbok();
            if($posts) {
            foreach($posts as $key => $post) { ?>
                <div class="inlagg">
                    <p class="meddelande">Meddelande: <?= $post['post']; ?></p>
                <p class="skribent">Skrivet av <?= $post['username']; ?></p>
                <p class="datum">Publicerad <span><?= $post['postdate']; ?></span></p>
                <a href="./edit.php?post=<?= $post['id']; ?>" class="redigera">Redigera inlägg</a>
                <a href="./secret.php?radera=<?= $post['id']; ?>" class="radera">Radera inlägg</a>
            </div>
        <?php } } ?>
        </section>
    </div>

<?php include('includes/footer.php');?>