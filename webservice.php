<?php 

    $page_title = "Gästbok med databas";
    include('includes/config.php');

    error_reporting(-1);
    ini_set("display_errors", 1);

    spl_autoload_register(function ($class) {
        include 'classes/' . $class . '.class.php';
    });

    $gastbok = new DBGastbok();

    $numrows = 100; // Maxvärde
    if(isset($_GET['numrows'])) {
        $numrows = intval($_GET['numrows']);
    }

    $rows = $gastbok->loadDataJSON($numrows);

    $json = json_encode($rows, JSON_PRETTY_PRINT);

    /* Utskrift */
    header('content-type: application/json; charset=utf-8');
    header("access-control-allow-origin: *");

    echo $json;
?>