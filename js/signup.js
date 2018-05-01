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
            
            const cid = data[i].clubID;
            const clubName = data[i].clubName;

            // clubs table
            const tr = document.createElement("tr");

            const td_cid = document.createElement("td");
            const td_radio = document.createElement("input");
            td_radio.setAttribute("type", "radio");
            td_radio.setAttribute("value", cid);
            //td_radio.setAttribute("class", "form-control");
            td_radio.setAttribute("name", "clubID");
            td_cid.appendChild(td_radio);
            const td_clubName = document.createElement("td");
            td_clubName.innerHTML = clubName;
            tr.appendChild(td_cid);
            tr.appendChild(td_clubName);
            clubList.appendChild(tr);
            
            
        }
    }
}




manager.addEventListener("click", e => {
    createClubDiv.style.display = "block";
    joinClubDiv.style.display = "none";
});

player.addEventListener("click", e => {
    joinClubDiv.style.display = "block";
    createClubDiv.style.display = "none";
});



$(document).ready(function() {
    $(signUpForm).submit(function(e) {
      e.preventDefault();
      $.ajax({
         type: "POST",
         url: '/~vermaj/LocalLeague/php/signup.php',
         data: $(this).serialize(),
         success: function(data)
         {
            if (data === 'PLAYER_CREATE_CLUB_JOINED'){
                window.location.replace("index.php");
                alert("Login successful!");
            }
            else if(data === 'PLAYER_AND_CLUB_CREATED'){
                window.location.replace("index.php");
                alert("Login successful!");
              }
            else if(data === 'ENTER_EMAIL'){
                alert('Please enter your email');
            }
            else if(data === 'ENTER_PASSWORD'){
                alert('Please enter a password');
            }
            else if(data === 'ENTER_CONFIRM_PASSWORD'){
                alert('Please enter a confirmation password');
            }
            else if(data === 'PASSWORDS_DO_NOT_MATCH'){
                alert('The passwords you entered do not match');
            }
            else if(data === 'ENTER_FIRST_NAME'){
                alert('Please enter your first name');
            }
            else if(data === 'ENTER_LAST_NAME'){
                alert('Please enter your last name');
            }
            else if(data === 'ENTER_BIO'){
                alert('Please enter a bio');
            }
            else if(data === 'ENTER_DOB'){
                alert('Please enter a date of birth');
            }
            else if(data === 'ENTER_POS'){
                alert('Please enter a position');
            }
            else if(data === 'ENTER_KIT'){
                alert('Please enter your kit number');
            }
            else if(data === 'ENTER_CLUB_NAME'){
                alert('Please enter a club name');
            }
            else if(data === 'ENTER_CITY'){
                alert('Please enter your city');
            }
            else if(data === 'ENTER_COUNTY'){
                alert('Please enter your county');
            }
            else if(data === 'ENTER_CLUB_BIO'){
                alert('Please enter your clubs bio');
            }
            else if(data === 'ENTER_TYPE'){
                alert('Please select player or manager');
            }
         }
     });
   });
});