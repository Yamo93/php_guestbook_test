let listItems = document.querySelectorAll('.sidebar ul li');
listItems.forEach(item => {
    item.classList.remove('active');
});

// Lägger till klass beroende på sidans titel
switch (document.title) {
    case "Yamos webbplats | Startsidan":
    document.querySelector('.startsidan').classList.add('active');
    break;
    
    case "Yamos webbplats | Variabler":
    document.querySelector('.variabler').classList.add('active');
    break;
    
    case "Yamos webbplats | Villkor":
    document.querySelector('.villkor').classList.add('active');
    break;
    
    case "Yamos webbplats | Upprepningar":
    document.querySelector('.upprepningar').classList.add('active');
    break;
    
    case "Yamos webbplats | Formulär":
    document.querySelector('.formular').classList.add('active');
    break;
    
    case "Yamos webbplats | Funktioner":
    document.querySelector('.funktioner').classList.add('active');
    break;
    
    case "Yamos webbplats | Läsa in extern textfil":
    document.querySelector('.textfil').classList.add('active');
    break;

    case "Yamos webbplats | Gästbok":
    document.querySelector('.gastbok').classList.add('active');
    break;

    case "Yamos webbplats | Gästbok med databas":
    document.querySelector('.dbgastbok').classList.add('active');
    break;
}

document.querySelector('.hamburger').addEventListener('click', showMenu);

window.addEventListener('resize', bringBackMenu);

let menuShown = false;

function showMenu() {
    if (!menuShown) {
        document.querySelector('.sidebar').style.transform = 'translateY(0px)';
        
        menuShown = true;
    } else {
        document.querySelector('.sidebar').style.transform = 'translateY(-130%)';

        menuShown = false;
    }
}

function bringBackMenu() {
    // Behövde lägga till detta, för att menyn inte ska försvinna om användaren minskar webbläsarens bredd, öppnar&stänger menyn och sen väljer att förstora webbläsarens bredd
    
    if (window.matchMedia("(min-width: 850px)").matches) {
        /* the viewport is at least 400 pixels wide */
        document.querySelector('.sidebar').style.transform = 'translateY(0px)';
    } else {
        document.querySelector('.sidebar').style.transform = 'translateY(-130%)';
    }
}