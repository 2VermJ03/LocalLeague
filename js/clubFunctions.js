// Scripts for LocalLeague
// Jay Verma | Q12027103

// Global vars
const loginBtn = document.getElementById("loginBtn");
const email = document.getElementById("email");
const password = document.getElementById("password");
const logoutBtn = document.getElementById("logoutBtn");
const loginModal = document.getElementById("loginModal");
const session = document.getElementById("session");
const loginForm = document.getElementById("loginForm");
const userID = document.getElementById("userID");
const clubName = document.getElementById("clubName");
const clubBio = document.getElementById("clubBio");
const clubLocation = document.getElementById("clubLocation");
const clubWon = document.getElementById("clubWon");
const clubDrawn = document.getElementById("clubDrawn");
const clubLost = document.getElementById("clubLost");
const clubDiff = document.getElementById("clubDiff");
const messageDiv = document.getElementById("messageDiv");
const message = document.getElementById("message");
const sendMessageBtn = document.getElementById("sendMessageBtn");
const linkToTalk = document.getElementById("linkToTalk");
const clubID = document.getElementById("clubID");
const playerID = document.getElementById("playerID");
const playerList = document.getElementById("playerList");
const playerTable = document.getElementById("playerTable");

$(document).ready(function() {
    $(loginForm).submit(function(e) {
      e.preventDefault();
      $.ajax({
         type: "POST",
         url: '/~vermaj/LocalLeague/php/loginScript.php',
         data: $(this).serialize(),
         success: function(data)
         {
            if (data === 'SUCCESS') {
                location.reload(true);
            }
            else if(data == 'USERNAME_OR_PASSWORD_INCORRECT'){
              alert('Invalid Credentials');
            }
         }
     });
   });
});

function getClubDetails(){
    const xhr2 = new XMLHttpRequest();
    xhr2.addEventListener ("load", res);
    xhr2.open("GET", "/~vermaj/LocalLeague/php/clubDetails.php?userID=" + userID.value);
    xhr2.send();

    function res(e){
        
        const data = JSON.parse(e.target.responseText);

        for(var i=0; i<data.length; i++){
            const cid = data[i].clubID;
            clubID.value = cid;
            clubName.innerHTML = data[i].clubName;
            clubBio.innerHTML = data[i].clubBio;
            clubLocation.innerHTML = data[i].city + ", " + data[i].county;
            clubWon.innerHTML = data[i].won;
            clubDrawn.innerHTML = data[i].drawn;
            clubLost.innerHTML = data[i].lost;
            clubDiff.innerHTML = data[i].gd;
            
            getClubPlayers(playerID);

            function getClubPlayers(playerID){
                const xhr3 = new XMLHttpRequest();
                xhr3.addEventListener ("load", res);
                xhr3.open("GET", "/~vermaj/LocalLeague/php/getClubPlayers.php?clubID=" + clubID.value);
                xhr3.send();
            
                function res(e){
                    const data1 = JSON.parse(e.target.responseText);
            
                    for(var i=0; i<data1.length; i++){
                        const pid = data1[i].playerID;
                        playerID.value = pid;

                        // populate player list
                        const firstName = data1[i].firstName;
                        const lastName = data1[i].lastName;
                        const dob = data1[i].dob;
                        const bio = data1[i].bio;
                        const pos = data1[i].position;
                        const kit = data1[i].kit;
                        const goals = data1[i].goals;
                        const assists = data1[i].assists;
                        const yellows = data1[i].yellow;
                        const reds = data1[i].red;
            
                        const players = document.createElement("option");
                        const fullName = firstName + " " + lastName;
                        players.value = fullName;
                        players.innerHTML = fullName;
                        playerList.appendChild(players);

                        // player table
                        const tr = document.createElement("tr");

                        const td_number = document.createElement("td");
                        const td_name = document.createElement("td");
                        const td_pos = document.createElement("td");
                        const td_goals = document.createElement("td");
                        const td_assists = document.createElement("td");
                        const td_yellows = document.createElement("td");
                        const td_reds = document.createElement("td");
                        td_number.innerHTML = kit;
                        td_name.innerHTML = fullName;
                        td_pos.innerHTML = pos;
                        td_goals.innerHTML = goals;
                        td_assists.innerHTML = assists;
                        td_yellows.innerHTML = yellows;
                        td_reds.innerHTML = reds;
                        tr.appendChild(td_number);
                        tr.appendChild(td_name);
                        tr.appendChild(td_pos);
                        tr.appendChild(td_goals);
                        tr.appendChild(td_assists);
                        tr.appendChild(td_yellows);
                        tr.appendChild(td_reds);
                        playerTable.appendChild(tr);

                        

                        linkToTalk.setAttribute("href", "/~vermaj/LocalLeague/teamtalk.php?clubID=" + clubID.value + "&playerID=" + playerID.value);
                    }
                }
            }
        }
    }
}




