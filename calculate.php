<?php 

    $page_title = "Resultat av area";
    include('includes/config.php');
    include('includes/header.php');
    include('includes/sidebar.php');
    
    session_start();

?>

    <h1 class="title"><?= $page_title; ?></h1>

    <p class="content-para">
        <?php 
        if (empty($_POST['length']) || empty($_POST['width'])) {
            $_SESSION['error'] = true;
            // header('Location:http://localhost/moment1/formular.php');
            header('Location:http://studenter.miun.se/~yage1800/dt093g/moment1/formular.php');
        } else {
            session_unset();
            $length = intval($_POST['length']);
            $width = intval($_POST['width']);
            $area = $length * $width;
            echo "Längden $length meter och bredden $width meter ger en area på $area kvadratmeter.";
        }
        ?>
    </p>

    <a href="formular.php" class="returnbtn">Gå tillbaka</a>
</section>
</div>

<?php include('includes/footer.php');?>