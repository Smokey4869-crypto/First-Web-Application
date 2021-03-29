<?php
	session_start();
	if (isset ($_SESSION["attempt"]))
		$attempt = $_SESSION["attempt"];	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
 	<meta name="description" content="IPv4 &amp; IPv6 Introduction" />
 	<meta name="keywords"    content="HTML, CSS, JavaScript" />
  	<meta name="author"      content="Minh Nguyen" />
  	<title>Result</title>
 	<link href="styles/style.css" rel="stylesheet"/>
  	<link href="styles/responsive.css" rel="stylesheet"/>
</head>

<body>
	<?php
		require_once('header.inc');
 		require_once('settings.php');
	?>
<div class="fieldset">
	<h2>QUIZ RESULT</h1>
 <?php

 	$conn = @mysqli_connect($host,
 		$user,
 		$pwd,
 		$sql_db
 	);

 	if (!$conn) {
 		echo "<p>Database connection failed</p>";
 	} else {

 		$sql_table = "attempts";
		$fieldDef = "attempt_id INT AUTO_INCREMENT PRIMARY KEY, firstname VARCHAR(40), lastname VARCHAR(40), student_id INT(10), num_of_attempt INT, score INT, date_and_time VARCHAR(40)";

			//check if table does not exist, create it
		$sqlString = "show tables like '$sql_table'";
		$result = @mysqli_query($conn, $sqlString);

		//create table if it does not exist 
		if (mysqli_num_rows($result)==0) {
			$sqlString = "create table ". $sql_table. "(". $fieldDef. ")";;
			$result2 = @mysqli_query($conn, $sqlString);

			if ($result2 == false) {
				echo "<p>Unable to create table $sql_table.". mysqli_errno($conn) . ":". mysqli_error($conn) ." </p>";
			}
		} else {

			//check if the user with the specific ID has exceeded 3 attempts
			$sqlString = "select * from $sql_table where student_id = ". $_POST["id"]." and num_of_attempt = 3";;
			$result3 = @mysqli_query($conn, $sqlString);

			if (mysqli_num_rows($result3) > 0) {
				//warning about exceeded attempt numbers
				echo "<p class=\"darkblue\">You have already submitted the quiz 3 times.</p>";
 				echo "<p class=\"darkblue\">You have no more attempts</p>";
 				echo "<button class=\"retry\"><a href=\"quiz.php\">Back</a></button>";
			} else {
				//If not exceed, let user continue with their most recent attempt
				$sqlString = "select max(num_of_attempt) from $sql_table where student_id = ". $_POST["id"];;
				$result3 = @mysqli_query($conn, $sqlString);
				if (mysqli_num_rows($result3) > 0) {
				 	$row = mysqli_fetch_assoc($result3);
				 	$attempt = $row["max(num_of_attempt)"];
				 } else $attempt = 0;
			}
		} //table_rows != 0
			//if successfully submitted, increment the attempt
			if ($_POST["submit"]) {
 			$attempt +=1;
 			}
			$valid = true;

			if ($attempt <= 3)  {
				if (isset ($_POST["id"])) {
					if (preg_match('/[0-9]{7,10}/', $_POST["id"]))
					$id = $_POST["id"];
				else $valid = false;
				}

			if (isset ($_POST["givenname"])) {
				if (preg_match("/[A-Za-z\s_-]{1,25}/", $_POST["givenname"]))  $firstname = $_POST["givenname"];
				else $valid = false;
			}

			if (isset ($_POST["familyname"])) {
				if (preg_match("/[A-Za-z\s_-]{1,25}/", $_POST["familyname"]))
					$lastname = $_POST["familyname"];
				else $valid = false;
			}

			/*if (isset ($_POST["email"])) 
				if (!preg_match("[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$", $_POST["email"])) $valid = false;*/

			
			//check if all questions are answered
			if (!isset ($_POST["address"])) $valid = false;
			if (!isset ($_POST["parts"])) $valid = false;
			if (!isset ($_POST["subnetmask"])) $valid = false;
			if (!isset ($_POST["numbersystem"])) $valid = false;
			if (!isset ($_POST["amount"])) $valid = false;
			if (!isset ($_POST["difference"])) $valid = false;
			if (!isset ($_POST["advantages"])) $valid = false;

			//check if answers are set in the previous attempts in session but not answered in later attempt
			if (isset ($_POST["address"]))
				if ($_POST["address"] == "") $valid = false;
			if (isset ($_POST["parts"]))
				if ($_POST["parts"] == "") $valid = false;
			if (isset ($_POST["subnetmask"]))
				if ($_POST["subnetmask"] == "") $valid = false;
			if (isset ($_POST["numbersystem"]))
				if ($_POST["numbersystem"] == "") $valid = false;
			if (isset ($_POST["amount"]))	
				if ($_POST["amount"] == "") $valid = false;
			if (isset ($_POST["difference"]))
				if ($_POST["difference"] == "") $valid = false;
			if (isset ($_POST["advantages"]))
				if ($_POST["advantages"] == "") $valid = false;

		if ($valid == false) {
			echo "<p class=\"darkred\">Your answers are invalid. Please check if you have answered all questions and enter your personal information in the right format.</p>";
		} else {
			//sanitise data input
			$id = sanitise_input($id);
			$firstname = sanitise_input($firstname);
			$lastname = sanitise_input($lastname);

			//Mark the quiz
			$score = 0;
			date_default_timezone_set("Australia/Melbourne");
			$date_and_time = date("Y/m/d"). " ". date("h:i:sa");
			echo "<p class=\"darkblue\">$date_and_time</p>";

			//question1
			if (isset ($_POST["address"])) {
				$is_unicast = in_array("unicast", $_POST["address"]);
				$is_multicast = in_array("multicast", $_POST["address"]);
				$is_broadcast = in_array("broadcast", $_POST["address"]);
				$is_anycast = in_array("anycast", $_POST["address"]);
				if ($is_unicast && $is_broadcast && $is_broadcast && !$is_anycast) $score +=1;
			}

			//always check isset to avoid error message
			//quesion2
			if (isset ($_POST["parts"]))
				if ($_POST["parts"] == "site-subnet-inter") $score += 1;

			//question3	
			if (isset ($_POST["subnetmask"]))
				if ($_POST["subnetmask"] == "255.0.0.0") $score += 1;
		
			//question4
			if (isset ($_POST["numbersystem"]))
				if ($_POST["numbersystem"] == "hexadecimal") $score += 1;
			
			//question5
			if (isset ($_POST["amount"]))
				if ($_POST["amount"] == 5) $score += 1;
			
			//question6
			if (isset ($_POST["difference"])) {
				$score += 0;
			}
			//question7 
			if (isset ($_POST["advantages"])) {
				$score += 0;
			}
			//check score
			echo "<p class=\"darkblue\">Your ID: $id</p>";
			echo "<p class=\"darkblue\">Your name: $firstname $lastname</p>";
			echo "<p class=\"darkblue\">Your score is $score</p>";

			if ($score == 0) {
			//Notify user that score 0 will not be recorded.
			echo "<p>Your score is 0.</p>";
			echo "<p>Cannot add your attempt record.</p>";
			} else {

			//Add new records if valid submission
			$query = "insert into $sql_table". "(firstname, lastname, student_id, num_of_attempt, score, date_and_time)". "values ". "('$firstname', '$lastname', '$id', '$attempt', '$score', '$date_and_time')";

			$result = mysqli_query($conn, $query);

			if (!$result) {
				echo "<p>Something is wrong with ", $query, "</p>";
			} else {
				echo "<p class=\"darkred\">Successfully added new attempt record</p>";
				echo "<p class=\"darkred\">Your attempt: $attempt/3</p>";
				$_SESSION["attempt"] = $attempt;
				echo "<button class=\"retry\"><a href=\"quiz.php\">Try again</a></button>";
			}
		}
 			//check the integrity of data 
			
	}//database connected successfully

		
	}//Valid data checked and attempts <= 3
	
 		mysqli_close($conn);	
	
 } //rows of table > 0 


 	//Direct to data management
 		function sanitise_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

 	?>
 </div>
 <?php
 	 require_once('footer.inc');
 	 //session_destroy();
 ?>
</body>
</html>