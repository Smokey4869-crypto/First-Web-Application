/**
* Author: Minh Nguyen
* Target: quiz.html
* Purpose: Validate quiz's answers and mark score
*/
"use strict";
function validate() {
	var score = 0;
	var result = false;

	var id = document.getElementById("id").value;
	var givenname = document.getElementById("givenname").value;
	var familyname = document.getElementById("familyname").value;
	var email = document.getElementById("email").value;
	var isStart = document.getElementById("start").clicked;

	var attempt = 0;
	var total_attempt = 3;
	sessionStorage.total_attempt = total_attempt;
	if (sessionStorage.attempt == null) {
		attempt = total_attempt;
	} else {
		attempt = sessionStorage.attempt;
	}
	//validate multiple choices
	//question1
	if (attempt > 0) {
		var ans1 = getMultipleChoice("q1");

		var isUnicast = document.getElementById("unicast").checked;
		var isMulticast = document.getElementById("multicast").checked;
		var isBroadcast = document.getElementById("broadcast").checked;
		var isAnycast = document.getElementById("anycast").checked;

		if (isUnicast && isMulticast && isBroadcast && !isAnycast) score +=1;
		if (!(isUnicast || isMulticast || isBroadcast || isAnycast)) {
			alert("You have to answer all question.\n")
			result = false;
		} else result = true;
		//question2
		if (document.getElementById("site-subnet-inter").checked) 
			score +=1;

		//question3 - select tag
		var q3 = document.getElementById("q3");
		var ans3 = q3.options[q3.selectedIndex].value;
		if (ans3 == "255.0.0.0") score +=1;

		//validate short answers
		//question4 
		var ans4 = document.getElementById("q4").value;
		if (ans4 == "hexadecimal" || q4 == "hex") score +=1;

		//question5
		var ans5 = document.getElementById("q5").value;
		if (ans5 == 5) score +=1;

		//question6
		var ans6 = document.getElementById("q6").value;
		/*if (ans6 !== null) {
			score +=1;
			result = true;
		}
		if (ans7 !== null) {
			score +=1;
			result = true;
		}*/
    	var ans7 = document.getElementById("q7").value;

		if (score <= 0) {
			alert("Your score is 0. Please do it again.\n");
			result = false;
		}
		else {
			storePersonalInfo(id, givenname, familyname, email);
			storeAnswers(ans1, ans3, ans4, ans5, ans6, ans7, score, email);
		}
		sessionStorage.attempt = attempt;
	} else {
		alert("You have no more attempt!\n");
		result = false;
	}
	return result;
}

//get multiple choice answer, works better for several multiple choice questions
function getMultipleChoice(quizId) {
	var answer = [];
	var answerArray = document.getElementById(quizId).getElementsByTagName("input");
 	
 	for (var i = 0; i < answerArray.length; i++) {
 		if (answerArray[i].checked)
 			answer.push(answerArray[i].value);
 	}
 	return answer;
}

function storePersonalInfo(id, givenname, familyname, email) {
	sessionStorage.id = id;
	sessionStorage.givenname = givenname;
	sessionStorage.familyname = familyname;
	sessionStorage.email = email;
} 

//for Multiple Choice session
function storeAnswers(ans1, ans3, ans4, ans5, ans6, ans7, score, email) {
	var ans2 = "";
	var ans2Array = document.getElementById("q2").getElementsByTagName("input");

	for (var i = 0; i < ans2Array.length; i++) {
		if (ans2Array[i].checked)
			ans2 = ans2Array[i].value;
	}
	sessionStorage.ans2 = ans2;
	sessionStorage.ans1 = ans1;
	sessionStorage.ans3 = ans3;
	sessionStorage.ans4 = ans4;
	sessionStorage.ans5 = ans5;
	sessionStorage.ans6 = ans6;
	sessionStorage.ans7 = ans7;
	sessionStorage.email = email;
	sessionStorage.score = score;
}

//for prefill the form 
function prefill_form(){
	if (sessionStorage.id != undefined) {
		document.getElementById("id").value = sessionStorage.id;
		document.getElementById("givenname").value = sessionStorage.givenname;
		document.getElementById("familyname").value = sessionStorage.familyname;
		document.getElementById("email").value = sessionStorage.email;
		document.getElementById("q3").value = sessionStorage.ans3;
		document.getElementById("q4").value = sessionStorage.ans4;	
		document.getElementById("q5").value = sessionStorage.ans5;
		document.getElementById("q6").value = sessionStorage.ans6;
		document.getElementById("q7").value = sessionStorage.ans7;

	localStorage.ans2 = sessionStorage.ans2;
	switch(localStorage.ans2) {
		case "net-host-subnet":
			document.getElementById("net-host-subnet").checked = true;
			break;
		case "site-host-inter":
			document.getElementById("site-host-inter").checked = true;
			break;
		case "site-subnet-inter":
			document.getElementById("site-subnet-inter").checked = true;
			break;
		}
	localStorage.ans1 = sessionStorage.ans1;
	if (localStorage.ans1.includes("unicast"))
		document.getElementById("unicast").checked = true;

	if (localStorage.ans1.includes("multicast"))
		document.getElementById("multicast").checked = true;

	if (localStorage.ans1.includes("broadcast"))
		document.getElementById("broadcast").checked = true;

	if (localStorage.ans1.includes("anycast"))
		document.getElementById("anycast").checked = true;
	}
}


function init() {
	var quizForm = document.getElementById("quizform");
	quizForm.onsubmit = validate;
	prefill_form();
	var start = document.getElementById("start");
	start.onclick = timer;
}
window.onload = init