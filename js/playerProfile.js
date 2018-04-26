// Global vars
const userID = document.getElementById("userID");
const firstName = document.getElementById("firstName");
const lastName = document.getElementById("lastName");
const dob = document.getElementById("dob");
const bio = document.getElementById("bio");
const pos = document.getElementById("pos");
const kit = document.getElementById("kit");
const goals = document.getElementById("goals");
const assists = document.getElementById("assists");
const yellows = document.getElementById("yellows");
const reds = document.getElementById("reds");

// Get player details
function getPlayerDetails(){
    const xhr2 = new XMLHttpRequest();
    xhr2.addEventListener ("load", res);
    xhr2.open("GET", "/~vermaj/LocalLeague/php/playerDetails.php?userID=" + userID.value)
    xhr2.send();

    function res(e){
        
        const data = JSON.parse(e.target.responseText);

        for(var i=0; i<data.length; i++){
            firstName.innerHTML = data[i].firstName;
            lastName.innerHTML = data[i].lastName;
            dob.innerHTML = data[i].dob;
            bio.innerHTML = data[i].bio;
            pos.innerHTML = data[i].position;
            kit.innerHTML = data[i].kit;
            goals.innerHTML = data[i].goals;
            assists.innerHTML = data[i].assists;
            yellows.innerHTML = data[i].yellow;
            reds.innerHTML = data[i].red;
            

        }
    }
}