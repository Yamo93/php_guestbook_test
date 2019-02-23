<?php 

    $page_title = "Upprepningar";
    include('includes/config.php');
    include('includes/header.php');
    include('includes/sidebar.php');
?>

        <h1 class="title"><?= $page_title; ?></h1>

        <p class="content-para">
        <?php 
            for ($x = 10; $x >= 0; $x--) {
                echo "$x <br />";
            }
        ?>
        </p>
        <hr>

        <p class="content-para">
        <?php 
            $y = 0;

            while (rand(1, 100) !== 99) {
                $y++;
            }

            echo "Det tog $y upprepningar för att slumpa fram talet 99.";
        ?>
        </p>
        <hr>

        <ul>
        <?php 
            $courses = array('Webbutveckling I', 'Introduktion till programmering med JavaScript', 'Digital bildbehandling för webb', 'Typografi och form för webb', 'Databaser', 'Webbutveckling II', 'Webbanvändbarhet', 'Webbdesign för CMS');

            foreach ($courses as $course) {
                echo "<li>$course</li>";
            }
        ?>
        </ul>

        <hr>
        
        <ol class="content-para">
        <?php 
            $invertedcourses = $courses; // skapar kopia av arrayen så att originalet ej modifieras
            sort($invertedcourses);

            foreach($invertedcourses as $course) {
                echo "<li>$course</li>";
            }
        ?>
        </ol>
    </section>
</div>

<?php include('includes/footer.php');?>