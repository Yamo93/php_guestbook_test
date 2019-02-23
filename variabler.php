<?php 

    $page_title = "Variabler";
    include('includes/config.php');
    include('includes/header.php');
    include('includes/sidebar.php');

    $name = "Yamo Gebrewold";
    $age = 25;
    $email = "yamo.gebrewold@gmail.com";
?>

        <h1 class="title"><?= $page_title; ?></h1>

        <p class="content-para variableoutput">
            <?= "Hej! Jag heter $name, är $age år gammal och nås på följande e-post: <a href='mailto:$email'>$email</a>" ?>
        </p>
    </section>
</div>

<?php include('includes/footer.php');?>