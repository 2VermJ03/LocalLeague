
const clubID = document.getElementById("clubID");
const messageDiv = document.getElementById("messageDiv");
const outputTable = document.getElementById("outputTable");
const id = clubID.value;

function getMessages(){
    
    const xhr2 = new XMLHttpRequest();
    xhr2.addEventListener ("load", res);
    xhr2.open("GET", "/~vermaj/LocalLeague/php/teamtalkScript.php?clubID=" + id)
    xhr2.send();

    function res(e){
        const data = JSON.parse(e.target.responseText);
        var playerName ="";

        for(var i=0; i<data.length; i++){

            const playerID = data[i].playerID;

            // function to get player name
            getPlayerDetails(playerID);

            function getPlayerDetails(playerID){
                console.log(playerID);
                const xhr3 = new XMLHttpRequest();
                xhr3.addEventListener ("load", response);
                xhr3.open("GET", "/~vermaj/LocalLeague/php/playerDetails.php?playerID=" + playerID);
                xhr3.send();
                function response(e){
                    const data1 = JSON.parse(e.target.responseText);
            
                    for(var i=0; i<data1.length; i++){
                      playerName = data1[i].firstName;
                      console.log(playerName);

                      const th = document.createElement("th");
                      th.innerHTML = playerName;
                      tr.appendChild(th);

                    }
                }
            }
            
            const tr = document.createElement("tr");
            outputTable.appendChild(tr);
            const td = document.createElement("td");
            td.innerHTML = data[i].message;
            tr.appendChild(td);





            
            // const tr = document.createElement("tr");
            //const th = document.createElement("th");
            //const td = document.createElement("td");

            //th.innerHTML = playerName;
            //td.innerHTML = data[i].message;
            
            // outputTable.appendChild(tr); 
            //tr.appendChild(th);
            //tr.appendChild(td);
            
            
        }
    }
}
