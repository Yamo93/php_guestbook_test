window.addEventListener('DOMContentLoaded', loadPosts);

function loadPosts() {
    
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.status === 200 && this.readyState === 4) {
        let json = JSON.parse(this.response);
        
        json.forEach(obj => {
            console.log(obj);
            let markup = `<div class="rest__content-post">
            <p class="rest__content-post--msg">${obj.post}</p>
            <p class="rest__content-post--username"><span>Skrivet av:</span> ${obj.username}</p>
            <p class="rest__content-post--date"><span>Publicerat:</span> ${obj.postdate}</p>
            </div>`;

            document.querySelector('.rest__content').insertAdjacentHTML('afterbegin', markup);
        })
        }
    }
    xhttp.open('GET', 'webservice.php', true);
    inProgress = true;
    xhttp.send();
}