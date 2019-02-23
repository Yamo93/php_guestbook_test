<?php 

    $page_title = "Startsidan";
    include('includes/config.php');
    include('includes/header.php');
    include('includes/sidebar.php');
?>

                <h1 class="title"><?= $page_title; ?></h1>
                <ol class="fragor">
                    <li>
                        <strong>Har du tidigare erfarenhet av utveckling med PHP?</strong>
                        Jag har gått igenom ett par onlinekurser om PHP samt gjort väldigt enkla projekt där jag har anslutit till en databas, använt MySQL och gjort enkla "CRUD-operationer" med SQL-språket. Men jag har ingen större erfarenhet av PHP. <br />Jag har faktiskt en idé om att skapa en viss webbapplikation med hjälp av PHP, och därför hoppas jag att jag kan utvidga mina kunskaper så att jag sedan kan implementera dem när jag väl bygger applikationen.
                    </li>
                    <li>
                        <strong>Beskriv kortfattat vad du upplever är fördelarna med att använda PHP för att skapa webbplatser.</strong>
                        Utifrån mitt perspektiv så tycker jag att de största fördelarna med PHP är:
                            <ul class="benefits">
                                <li>👉 Att man kan skapa dynamiska webbsidor, som bloggar, sociala medier likt Facebook och liknande.</li>
                                <li>👉 Faktumet att man kan ansluta till databaser innebär att man kan lagra information på servern som en användare skickar, vilket i sig gör att man kan skapa häftiga applikationer.</li>
                                <li>👉 PHP verkar till synes vara ett enkelt språk att lära sig, och syntaxen påminner om JavaScripts syntax till en stor del. Därför blir det enklare att kunna arbeta med PHP.</li>
                            </ul>
                    </li>
                    <li>
                        <strong>Hur har du valt att strukturera upp dina filer och kataloger?</strong>
                        Jag följde mer eller mindre strukturen som angavs i läsanvisningen. Jag skapade tre kataloger: en för CSS (css), en för JavaScript (js) och en för PHP-filerna (includes) som sedan inkluderas i sidorna. Undersidorna inkl. index.php lät jag sitta kvar i rotkatalogen.
                    </li>
                    <li>
                        <strong>Har du följt guiden, eller skapat på egen hand?</strong>
                        Jag följde guiden för det mesta, och byggde strukturen utifrån den, men försökte samtidigt experimentera litegrann med koden.
                    </li>
                    <li>
                        <strong>Har du gjort några förbättringar eller vidareutvecklingar av guiden (om du följt denna)?</strong>
                        Jag har dessvärre inte gjort några förbättringar sett till PHP-koden. Däremot har jag lagt till lite JavaScript-kod för att ändra länkfärgen i menyn beroende på vilken titel sidan har.
                    </li>
                    <li>
                        <strong>Vilken utvecklingsmiljö har du använt för uppgiften (Editor, webserver (XAMPP, LAMP, MAMP eller liknande) etcetera)?</strong>
                        Min utvecklingsmiljö ser ut som följande:
                        <ul class="environment">
                            <li><span>Operativsystem:</span> Windows 10</li>
                            <li><span>Editor:</span> Visual Studio Code</li>
                            <li><span>Webbserver:</span> XAMPP</li>
                            <li><span>Webbläsare:</span> Google Chrome</li>
                        </ul>
                    </li>
                    <li>
                        <strong>Har något varit svårt med denna uppgift?</strong>
                        Jag tyckte inte att uppgiften var särskilt svår. Jag stötte på lite problem med webbservern XAMPP i början, då mina CSS-ändringar inte verkade synas i webbläsaren, men efter lite sökande på <a href="https://stackoverflow.com/" target="_blank">Stack Overflow</a> så hittade jag en lösning till det.
                    </li>
                </ol>
            </section>
        </div>

<?php include('includes/footer.php');?>