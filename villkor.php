<?php 

    $page_title = "Villkor";
    $today = date("Y-m-d H:i:s");
    include('includes/config.php');
    include('includes/header.php');
    include('includes/sidebar.php');

?>

        <h1 class="title"><?= $page_title; ?></h1>

        <p class="content-para"><span>Datum/klockslag: </span><?= $today; ?></p>

        <p class="content-para">
        <?php 
            if (date('D') === 'Sun') {
                echo 'Idag är det söndag.';
            } else {
                echo 'Idag är inte söndag.';
            }
        ?>
        </p>

        <p class="content-para">
            <?php 
                if (date('H') >= '06' && date('H') < '09') {
                    echo 'Det är morgon.';
                } elseif (date('H') >= '09' && date('H') < '12') {
                    echo 'Det är förmiddag.';
                } elseif (date('H') >= '12' && date ('H') < '18') {
                    echo 'Det är eftermiddag.';
                } else {
                    echo 'Det är kväll/natt.';
                }
            ?>
        </p>

        <p class="content-para">
            <?php
                switch (date('D')) {
                    case 'Sun':
                        echo 'Idag är det söndag.';
                        break;
                    case 'Mon':
                        echo 'Idag är det måndag.';
                        break;
                    case 'Tue':
                        echo 'Idag är det tisdag.';
                        break;
                    case 'Wed':
                        echo 'Idag är det onsdag.';
                        break;
                    case 'Thu':
                        echo 'Idag är det torsdag.';
                        break;
                    case 'Fri':
                        echo 'Idag är det fredag.';
                        break;
                    case 'Sat':
                        echo 'Idag är det lördag.';
                        break;
                }
            ?>
        </p>
    </section>
</div>

<?php include('includes/footer.php');?>