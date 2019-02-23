<?php 
    $page_title = "Formulär";
    include('includes/config.php');
    include('includes/header.php');
    include('includes/sidebar.php');
    session_start();
?>

    <h1 class="title"><?= $page_title; ?></h1>

    <form method="GET" class="form">
        <label for="firstname">Förnamn</label>
        <input type="text" name="firstname" id="firstname" placeholder="Vänligen ange förnamn">

        <label for="surname">Efternamn</label>
        <input type="text" name="surname" id="surname" placeholder="Vänligen ange efternamn">

        <input type="submit" name="namesubmit" value="Skicka">

        <p class="get_output">
        <?php 
            if (isset($_GET['firstname'])) {
                if (empty($_GET['firstname']) || empty($_GET['surname'])) {
                    echo 'Både förnamn och efternamn måste fyllas i.';
                } else {
                    $firstname = $_GET['firstname'];
                    $surname = $_GET['surname'];
                    echo "Hej $firstname $surname!";
                }
            }
        ?>
        </p>
    </form>

    <form action="calculate.php" method="POST" class="form">
        <label for="length">Längd</label>
        <input type="text" name="length" id="length" placeholder="Vänligen ange längd">

        <label for="width">Bredd</label>
        <input type="text" name="width" id="width" placeholder="Vänligen ange bredd">

        <input type="submit" name="calculatesubmit" value="Skicka">
        <p class="get_output">
        <?php 
            if(isset($_SESSION['error'])) {
                echo "Bredd och längd måste anges!";
            }
        ?>
        </p>
    </form>

</section>
</div>

<?php include('includes/footer.php');?>