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

    if(isset($_POST['submit'])) {
        if(!empty($_POST['gastbok_namn']) && !empty($_POST['gastbok_msg'])) {
            if ($gastbok->updatePost($_GET['post'], $_POST['gastbok_namn'], $_POST['gastbok_msg'])) {
                unset($_POST['submit']);
                header("Location: secret.php?success=3");
                exit();
            }
        } else {
            $message = "Fyll i fälten, tack!";
        }
    }

    if(isset($_GET['post'])) {
        $editedpost = $gastbok->getPost($_GET['post']);
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
            
            <form method="POST" class="admin">
                <p class="info">Du är inloggad som <?= "<span>" . $_SESSION['username'] . "</span>"; ?>.</p>

                <input type="submit" name="logout" class="logoutbtn" value="Logga ut">

                <h1>Redigera inlägget:</h1>
                <label class="gastbok__namn" for="namn">Namn:</label>
                <input type="text" name="gastbok_namn" id="namn" class="gastbok__inputnamn" placeholder="Redigera ditt namn." value="<?= $editedpost['username']; ?>">
                <label for="msg" class="gastbok__msg">Meddelande:</label>
                <textarea class="msgfalt" name="gastbok_msg" id="msg" cols="20" rows="10" placeholder="Skriv ditt inlägg här."><?= $editedpost['post']; ?></textarea>
                <input type="submit" name="submit" class="skapa redigera" value="Redigera inlägg">
            </form>
        </section>
    </div>

<?php include('includes/footer.php');?>