
const clubID = document.getElementById("clubID");
const messageDiv = document.getElementById("messageDiv");
const outputTable = document.getElementById("outputTable");
const msgForm = document.getElementById("msgForm");
const msg = document.getElementById("msg");
const sendMsgBtn = document.getElementById("sendMsgBtn");
const pid = document.getElementById("playerID");
const updateMsgBtn = document.getElementById("updateMsgBtn");

const id = clubID.value;

function getMessages(){
    const xhr2 = new XMLHttpRequest();
    xhr2.addEventListener ("load", res);
    xhr2.open("GET", "/~vermaj/LocalLeague/php/teamtalkScript.php?clubID=" + id)
    xhr2.send();

    function res(e){
        const data2 = JSON.parse(e.target.responseText);
        var playerName ="";

        for(var i=0; i<data2.length; i++){

            const playerID = data2[i].playerID;
            pid.innerHTML = playerID;
            // function to get player name
            getPlayerDetails(playerID);

            function getPlayerDetails(playerID){
                const xhr3 = new XMLHttpRequest();
                xhr3.addEventListener ("load", response);
                xhr3.open("GET", "/~vermaj/LocalLeague/php/playerDetails.php?playerID=" + playerID);
                xhr3.send();
                function response(e){
                    const data1 = JSON.parse(e.target.responseText);
            
                    for(var i=0; i<data1.length; i++){
                      playerName = data1[i].firstName;

                      const th = document.createElement("th");
                      th.innerHTML = playerName;
                      tr.appendChild(th);

                      
                      

                    }
                }
            }
            
            
            const tr = document.createElement("tr");
            outputTable.appendChild(tr);
            const td = document.createElement("td");
            td.innerHTML = data2[i].msg;
            tr.appendChild(td);

        }
    } 
}


$(msgForm).submit(function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: '/~vermaj/LocalLeague/php/sendMessage.php',
        data: $(this).serialize(),
        success: function(data)
        {
            if (data === 'SUCCESS') {
                location.reload(true);
            }
            else if(data === 'Enter_MSG'){
                alert('Enter a message');
            }
        }
    });
});

updateMsgBtn.addEventListener("click", e=>{
    location.reload(true);
});