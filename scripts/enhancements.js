/**
* Author: Minh Nguyen
* Target: quiz.html, result.html
* Purpose: Include enhancements for assignment 2
*/

"use strict";

//ENHANCEMENT 1
//QUIZ COUNTDOWN TIMER
function timer() {
	var id = document.getElementById("id").value;
	var givenname = document.getElementById("givenname").value;
	var familyname = document.getElementById("familyname").value;
	var email = document.getElementById("email").value;

	//Personal Info must be complete to do the test
	if (id != "" && givenname != "" && familyname !="" && email != ""){
		var counter = 10;
		var timer = counter;

		var interval = setInterval(timeIt, 1000);

		function timeIt() {
			timer--;
			if (timer>=0) {
				document.getElementById("timer").innerHTML = converseSeconds(timer);
			} else {
			
				document.getElementById("quizform").submit();
			}
		}	
		function converseSeconds(second) {
			var min = Math.floor(second/60);
			var sec = second % 60;
			//Another way to set min and sec as 2 digit numbers
			min = min < 10 ? "0" + min : min;
			sec = sec < 10 ? "0" + sec : sec;
			return min + ':' + sec;
		}
	}

}



//ENHANCEMENT 2
//CONGRATULATORY FIREWORK
let canvas, width, height, ctx;
let fireworks = [];
let particles = [];

function givePresent() {
	document.getElementById("canvas").style.display = "block";
	setTimeout(setup,1);
	setInterval(loop, 1/60);
}


function setup() {
	canvas = document.getElementById("canvas");
	setSize(canvas);
	ctx = canvas.getContext("2d");
	ctx.fillStyle = "#000000";
	ctx.fillRect(0, 0, width, height);
	fireworks.push(new Firework(Math.random()*(width-200)+100));
	//Make canvas always cover the page (for example after using Developer Tools,..)
	window.addEventListener("resize",windowResized);
	//Spam click on screen to get more firework
	document.addEventListener("click",onClick);
}


function loop(){
	ctx.globalAlpha = 0.1;
	ctx.fillStyle = "#000000";
	ctx.fillRect(0, 0, width, height);
	ctx.globalAlpha = 0.6;
	//Make text above firework
	ctx.globalCompositeOperation = "source-over";
	ctx.font = "50px Arial";
	ctx.textAlign = "center";
	ctx.fillStyle = "#F0FF00";
	ctx.fillText("CONGRATULATION!!!", width/2, height/2);
	ctx.globalAlpha = 1;

	for(let i=0; i<fireworks.length; i++){
		let done = fireworks[i].update();
		fireworks[i].draw();
		if(done) fireworks.splice(i, 1);
	}

	for(let i=0; i<particles.length; i++){
		particles[i].update();
		particles[i].draw();
		if(particles[i].lifetime>80) particles.splice(i,1);
	}

	if(Math.random()<1/60) fireworks.push(new Firework(Math.random()*(width-200)+100));
}

class Particle{
	//initialize a new Particle with x, y and col 
	constructor(x, y, col){
		this.x = x;
		this.y = y;
		this.col = col;
		this.vel = randomVec(2);
		this.lifetime = 0;
	}

	update(){
		this.x += this.vel.x;
		this.y += this.vel.y;
		this.vel.y += 0.02; //0.02 is acc, can be changed
		this.vel.x *= 0.99;
		this.vel.y *= 0.99;
		this.lifetime++;
	}

	draw(){
		ctx.globalAlpha = Math.max(1-this.lifetime/80, 0);
		ctx.fillStyle = this.col;
		ctx.fillRect(this.x, this.y, 3, 3);
	}
}

class Firework{
	//initialize a new Firework with x
	constructor(x){
		this.x = x;
		this.y = height;
		this.isFired = false;
		this.col = randomCol();
	}

	update() {
		this.y -= 5; //Fire up speed 
		if(this.y < 400-Math.sqrt(Math.random()*500)*30){ // ~ y < viewport's height 
			this.isFired = true;
			for(let i=0; i<60; i++){
				particles.push(new Particle(this.x, this.y, this.col))
			}
		}
		return this.isFired;
	}

	draw(){
		ctx.globalAlpha = 1;
		ctx.fillStyle = this.col;
		ctx.fillRect(this.x, this.y, 4, 4);
	}
}

//CHOOSE COLOR FOR FIREWORK (GENERATE SHORTHAND HEX COLOR CODE)
function randomCol(){
	var letter = '0123456789ABCDEF';
	var nums = [];

	for(var i=0; i<3; i++){
		nums[i] = Math.floor(Math.random()*256);
	}

	let brightest = 0;
	for(var i=0; i<3; i++){
		if(brightest<nums[i]) brightest = nums[i];
	}

	brightest /=255;
	for(var i=0; i<3; i++){
		nums[i] /= brightest;
	}

	let color = "#";
	for(var i=0; i<3; i++){
		color += letter[Math.floor(nums[i]/16)]; 
		color += letter[Math.floor(nums[i]%16)]; 
	}
	return color; //Example: #fff
}

function randomVec(max){
	//direction and speed
	let dir = Math.random()*Math.PI*2;
	let spd = Math.random()*max;
	return{x: Math.cos(dir)*spd, y: Math.sin(dir)*spd};
}

function setSize(canv){
	canv.style.width = (innerWidth) + "px";
	canv.style.height = (innerHeight) + "px";
	width = innerWidth;
	height = innerHeight;

	//physical pixels to CSS pixels
	canv.width = innerWidth*window.devicePixelRatio; 
	canv.height = innerHeight*window.devicePixelRatio;
	canvas.getContext("2d").scale(window.devicePixelRatio, window.devicePixelRatio);
}

function onClick(e){
	fireworks.push(new Firework(e.clientX));
}

function windowResized(){
	setSize(canvas);
	ctx.fillStyle = "#000000";
	ctx.fillRect(0, 0, width, height);
}