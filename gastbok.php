<?php 

    $page_title = "Gästbok";
    include('includes/config.php');
    include('includes/header.php');
    include('includes/sidebar.php');

    error_reporting(-1);
    ini_set("display_errors", 1);

    spl_autoload_register(function ($class) {
        include 'classes/' . $class . '.class.php';
    });

    $gastbok = new Gastbok();

    if(isset($_POST['submit'])) {
        if(!empty($_POST['gastbok_namn']) && !empty($_POST['gastbok_msg'])) {
            $gastbok->addPost($_POST['gastbok_namn'], $_POST['gastbok_msg'], date('Y-m-d h:i:s'));
            unset($_POST['submit']);
            header("Location: gastbok.php");
            exit();
        } else {
            echo "<h1 style='color: rgb(199, 21, 21); margin-bottom: 2rem;'>Fyll i fälten, tack!</h2>";
        }
    }

    if(isset($_GET['radera'])) {
        $gastbok->removePost($_GET['radera']);
        unset($_GET['radera']);
        header("Location: gastbok.php");
        exit();
    }


?>

            <h1 class="title"><?= $page_title; ?></h1>
            
            <form method="POST" class="gastbok">
                <label class="gastbok__namn" for="namn">Namn:</label>
                <input type="text" name="gastbok_namn" id="namn" class="gastbok__inputnamn" placeholder="Ange ditt namn tack.">
                <label for="msg" class="gastbok__msg">Meddelande:</label>
                <textarea class="msgfalt" name="gastbok_msg" id="msg" cols="20" rows="10" placeholder="Skriv ditt inlägg här."></textarea>
                <input type="submit" name="submit" class="skapa" value="Skapa inlägg">
            </form>

            <a href="./data/data.txt" target="_blank" class="datafil">Visa datafil</a>
            <?php 
            $posts = $gastbok->getGastbok();
            if($posts) {
            foreach($posts as $key => $post) { ?>
                <div class="inlagg">
                    <p class="meddelande">Meddelande: <?= $post['msg']; ?></p>
                <p class="skribent">Skrivet av <?= $post['name']; ?></p>
                <p class="datum">Publicerad <span><?= $post['date']; ?></span></p>
                <a href="./gastbok.php?radera=<?= $key; ?>" class="radera">Radera inlägg</a>
            </div>
        <?php } } ?>
        </section>
    </div>

<?php include('includes/footer.php');?>