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
const clubID = document.getElementById("clubID");
const messageDiv = document.getElementById("messageDiv");
const message = document.getElementById("message");
const sendMessageBtn = document.getElementById("sendMessageBtn");


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


function init(){
    const xhr2 = new XMLHttpRequest();
    xhr2.addEventListener ("load", res);
    xhr2.open("GET", "/~vermaj/LocalLeague/php/clubDetails.php?userID=" + userID.value)
    xhr2.send();

    function res(e){
        
        const data = JSON.parse(e.target.responseText);

        for(var i=0; i<data.length; i++){
            clubID.innerHTML = data[i].clubID;
            clubName.innerHTML = data[i].clubName;
            clubBio.innerHTML = data[i].clubBio;
            clubLocation.innerHTML = data[i].city + ", " + data[i].county;
            clubWon.innerHTML = data[i].won;
            clubDrawn.innerHTML = data[i].drawn;
            clubLost.innerHTML = data[i].lost;
            clubDiff.innerHTML = data[i].diff;
            
            const idtest = clubID.value;
            console.log(idtest);
            const linkToTalkBtn = document.createElement("a");
            linkToTalkBtn.setAttribute("href", "/~vermaj/LocalLeague/teamtalk.php?clubID=" + data[i].clubID);
            const t = document.createTextNode("Link to team talk");
            linkToTalkBtn.appendChild(t);
            document.getElementById("test1").appendChild(linkToTalkBtn);

        }
    }
}



