// Global vars
const firstName = document.getElementById("playerFirstName");
const lastName = document.getElementById("playerLastName");
const dob = document.getElementById("dob");
const bio = document.getElementById("bio");
const pos = document.getElementById("position");
const kit = document.getElementById("kit");
const email = document.getElementById("email");
const password = document.getElementById("password");
const confirmPassword = document.getElementById("confirmPassword");
const manager = document.getElementById("manager");
const player = document.getElementById("player");
const joinClubDiv = document.getElementById("joinClubDiv");
const createClubDiv = document.getElementById("createClubDiv");
const clubList = document.getElementById("clubList");
const clubID = document.getElementById("clubID");

createClubDiv.style.display = "none";
joinClubDiv.style.display = "none";

// Get all clubs
function getClubs(){
    const xhr2 = new XMLHttpRequest();
    xhr2.addEventListener ("load", res);
    xhr2.open("GET", "/~vermaj/LocalLeague/php/getClubs.php")
    xhr2.send();

    function res(e){
        
        const data = JSON.parse(e.target.responseText);

        for(var i=0; i<data.length; i++){
            const option = document.createElement("option");
            option.innerHTML = data[i].clubName;
            clubList.appendChild(option);

            clubID.value = data[i].clubID;
            

        }
    }
}

getClubs();

manager.addEventListener("click", e => {
    createClubDiv.style.display = "block";
    joinClubDiv.style.display = "none";
});

player.addEventListener("click", e => {
    joinClubDiv.style.display = "block";
    createClubDiv.style.display = "none";
});

/*
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
*/