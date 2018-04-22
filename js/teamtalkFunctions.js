
const clubID = document.getElementById("clubID");
const messageDiv = document.getElementById("messageDiv");
const id = clubID.value;
function getMessages(){
    
    const xhr2 = new XMLHttpRequest();
    xhr2.addEventListener ("load", res);
    xhr2.open("GET", "/~vermaj/LocalLeague/php/teamtalkScript.php?clubID=" + id)
    xhr2.send();

    function res(e){
        const data = JSON.parse(e.target.responseText);

        for(var i=0; i<data.length; i++){

            const mes = document.createElement("p");
            const player = document.createElement("p");

            player.innerHTML = data[i].playerID;
            mes.innerHTML = data[i].message;
            
            messageDiv.appendChild(player);
            messageDiv.appendChild(mes);
        }
    }

console.log(id);

}