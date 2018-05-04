// Global vars
const clubID = document.getElementById("clubID");
const messageDiv = document.getElementById("messageDiv");
const outputTable = document.getElementById("outputTable");
const msgForm = document.getElementById("msgForm");
const msg = document.getElementById("msg");
const sendMsgBtn = document.getElementById("sendMsgBtn");
const playerID = document.getElementById("playerID");
const updateMsgBtn = document.getElementById("updateMsgBtn");
const userID = document.getElementById("userID");

const uid = userID.value;
const cid = clubID.value;

function getMessages(){
    const xhr2 = new XMLHttpRequest();
    xhr2.addEventListener ("load", res);
    xhr2.open("GET", "/~vermaj/LocalLeague/php/teamtalkScript.php?clubID=" + cid);
    xhr2.send();

    function res(e){
        const data2 = JSON.parse(e.target.responseText);

        for(var i=0; i<data2.length; i++){
            const message = data2[i].msg;
            const firstName = data2[i].firstName;
            /*
            const lastName = data2[i].lastName;

            const fullName = "<b>" + firstName + " " + lastName + "</b>";
            */
            const tr = document.createElement("tr");

            const td_msg = document.createElement("td");
            const td_name = document.createElement("td");

            td_msg.innerHTML = message;
            td_name.innerHTML = firstName;

            tr.appendChild(td_msg);
            tr.appendChild(td_name);
            outputTable.appendChild(tr);

        }
    }
}
getPlayer();
function getPlayer(){
    const xhr2 = new XMLHttpRequest();
    xhr2.addEventListener ("load", res);
    xhr2.open("GET", "/~vermaj/LocalLeague/php/getPlayer.php?userID=" + uid);
    xhr2.send();

    function res(e){
        const data2 = JSON.parse(e.target.responseText);

        for(var i=0; i<data2.length; i++){
            const pid = data2[i].playerID;
            playerID.value = pid;
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