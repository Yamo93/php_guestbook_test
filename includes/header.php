<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $sitetitle . $divider . $page_title; ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css?v=<?php echo $timestamp;?>">
</head>

<body>
    <div class="container">
        <header class="header">
            <nav class="mainnav">
                <ul>
                    <li><a href="index.php">Hem</a></li>
                    <li><a href="omsidan.php">Om sidan</a></li>
                    <li><a href="kontakt.php">Kontakt</a></li>
                </ul>
            </nav>
            <i class="fas fa-bars hamburger"></i>
        </header>