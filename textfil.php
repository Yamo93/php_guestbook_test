<?php 

    $page_title = "Läsa in extern textfil";
    include('includes/config.php');
    include('includes/header.php');
    include('includes/sidebar.php');
?>

        <h1 class="title"><?= $page_title; ?></h1>

        <div class="read_output">
            <ul>
                <?php 
                if ($myfile = fopen("courses.txt", "r")) {
                    $text = fread($myfile, filesize("courses.txt"));
                    $lines = explode("\n", $text); // delar upp strängen med radbrytningarna och gör den till en array
                    
                    foreach ($lines as $course) {
                        echo "<li>$course</li>";
                    }
                    
                    fclose($myfile);
                } else {
                    echo '<p class="get_output">Filen kunde inte hittas! 😣</p>';
                }
                ?>
            </ul>
        </div>
    </section>
</div>

<?php include('includes/footer.php');?>