<?php 

    $page_title = "Funktioner";
    include('includes/config.php');
    include('includes/header.php');
    include('includes/sidebar.php');
    $displayForm = true; // villkor för huruvida formuläret skall visas eller ej
    $alert = null; // variabel där olika meddelanden visas beroende på mejlutskicket


    function checkString($str) {
        if (strlen($str) > 4) {
            return true;
        } else {
            return false;
        }
    }

    function sendMail($str) {
        $to = 'yamo.gebrewold@gmail.com';
        $subject = 'Ett mejl';
        
        if(mail($to, $subject, $str)) {
            global $displayForm;
            $displayForm = false;
            return "Meddelande skickat! 😃";
        } else {
            return "Något gick fel vid leverans av meddelande 😐";
        }

    }

    if (isset($_POST['submit'])) {
        $message = $_POST['message'];

        if (checkString($message)) {
            $alert = sendMail($message);
        } else {
            $alert = "Meddelandet måste innehålla minst fem tecken! 😕";
        }
    }
?>

    <h1 class="title"><?= $page_title; ?></h1>

<?php 

if ($displayForm) { ?>
    <form method="POST" class="form">
        <label for="message">Meddelande</label>
        <textarea name="message" id="message" cols="30" rows="10"></textarea>
        <input type="submit" name="submit" value="Skicka">
    </form>
<?php } ?>
    <p class="get_output">
        <?php
            if (isset($_POST['submit'])) {
                echo $alert;
            }
        ?>
    </p>

    </section>
</div>

<?php include('includes/footer.php');?>