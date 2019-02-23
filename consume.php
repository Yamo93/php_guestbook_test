<?php 

    $page_title = "Gästbok med databas";
    include('includes/config.php');
    include('includes/header.php');
    include('includes/sidebar.php');

    error_reporting(-1);
    ini_set("display_errors", 1);

    spl_autoload_register(function ($class) {
        include 'classes/' . $class . '.class.php';
    });

    $gastbok = new DBGastbok();

?>

            <h1 class="title"><?= $page_title; ?></h1>

            <ul class="gastbok_nav">
                <li><a href="dbgastbok.php">Startsida</a></li>
                <li><a href="admin.php">Administration</a></li>
                <li><a href="webservice.php">JSON</a></li>
                <li><a href="#"  class="menu-active">Webbtjänst</a></li>
            </ul>

            <div class="rest">
                <div class="rest__top">
                    De senaste inläggen 💭
                </div>

                <div class="rest__content">
                    <!-- <div class="rest__content-post">
                        <p class="rest__content-post--msg">Hello!</p>
                        <p class="rest__content-post--username"><span>Skrivet av:</span> Geek11337</p>
                        <p class="rest__content-post--date"><span>Publicerat:</span> 1990-01-01</p>
                    </div> -->
                </div>
            </div>
        </section>
    </div>

    <script src="js/ajax.js"></script>

<?php include('includes/footer.php');?>