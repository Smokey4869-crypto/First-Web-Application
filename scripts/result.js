/*	
* Author: Minh Nguyen
* Target: result.html
* Purpose: retrieve data stored in session storage
*/
"use strict";
function getScore() {
	if(sessionStorage.id != undefined){//if sessionStorage for username is not empty
		//confirmation text
		document.getElementById("submit_name").textContent = sessionStorage.givenname + " " + sessionStorage.familyname;
		document.getElementById("submit_id").textContent =sessionStorage.id;
		document.getElementById("final_score").textContent = sessionStorage.score;
		
		document.getElementById("submit_id").value = sessionStorage.id;
		document.getElementById("givenname").value = sessionStorage.givenname;
		document.getElementById("familyname").value = sessionStorage.familyname;
		document.getElementById("final_score").value = sessionStorage.score;	
	}
}


function checkAttempt() {
	var attempt = sessionStorage.attempt;
	if (attempt > 0) {
		attempt--;
		sessionStorage.attempt = attempt;
		document.getElementById("final_attempt").textContent = sessionStorage.total_attempt - sessionStorage.attempt;
		document.getElementById("total_attempt").textContent = sessionStorage.total_attempt;
	} else {
		alert("You have no more attempt\n");
		document.getElementById("final_attempt").textContent = sessionStorage.total_attempt;
		document.getElementById("total_attempt").textContent = sessionStorage.total_attempt;
		document.getElementById("retake").innerHTML = "Back";
	}
}


function init() {
	getScore();
	checkAttempt();
	document.getElementById("canvas").style.display = "none";
	if (sessionStorage.score == 7){
	document.getElementById("present").style.display = "block";
	var present = document.getElementById("present");
	present.onclick = givePresent;
	} else {
		document.getElementById("present").style.display = "none";
	}

	document.getElementById("hidden1").style.display = "none";
	if (document.getElementById("query_name").clicked)
		document.getElementById("hidden1").style.display = "block";
}

window.onload = init