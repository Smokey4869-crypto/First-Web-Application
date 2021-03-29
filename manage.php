<?php
	session_start();
	

	require_once('settings.php');
	if ($_SESSION["logged_in"] == false) 
		header("location:login.php");
	 $session_duration = 3600;
 	 if (isset ($_SESSION["last_activity"])) {
 	 	if (time() - $_SESSION["last_activity"] > $session_duration) {
 	 		header("location:login.php");
 	 		session_unset();
 	 		session_destroy();
 	 	} 	 		
 	} 	
		$conn = @mysqli_connect($host,
 		$user,
 		$pwd,
 		$sql_db
 		);
 		$sql_table = "attempts";
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
 	<meta name="description" content="IPv4 &amp; IPv6 Introduction" />
 	<meta name="keywords"    content="HTML, CSS, JavaScript" />
  	<meta name="author"      content="Minh Nguyen" />
  	<title>Manage</title>
 	<link href="styles/style.css" rel="stylesheet"/>
  	<link href="styles/responsive.css" rel="stylesheet"/>
  	<!--<script  src="scripts/quiz.js"></script>
  	<script src="scripts/enhancements.js"></script>-->
</head>

<body>
	<?php
		require_once('header.inc');
	?>
<div class="fieldset">
	<h2>QUIZ RECORDS</h2>
	<form method="post" action="manage.php">
		<h3 class="darkred">Search:</h3>
		<p class="darkblue">List all attempts: <input type="submit" name="all" value="Search"/></p>
		<p class="darkblue">List attempts of name: <input type="text" name="name"/> or ID: <input type="text" name="id"> <input type="submit" name="id_name" value="Search"/></p>
		<p class="darkblue">List all students who got 100% on the first attempt: <input type="submit" name="firsttry" value="Search"/></p>
		<p class="darkblue">List all students who got less than 50% on their third attempts <input type="submit" name="thirdtry" value="Search"/></p>
	</form>
		<form action="manage.php" method="post">
			<p class="darkblue">Sort by: <select name="sort_option">
              	<option value="score">Score</option>
              	<option value="firstname">Firstname</option>
              	<option value="lastname">Lastname</option>
              	<option value="sort_id">ID</option>
            	</select>

            	<select name = "order">
            	<option value="ascending">Ascending</option>
            	<option value="descending">Descending</option>
            	</select>

            	<button type="submit" name="sort">Sort</button>
            </p>
		</form>
	

	<?php
		if (isset ($_POST["all"]))  {
			$query = "select * from $sql_table";
		}
		if (isset ($_POST["id_name"])) {
			if (isset ($_POST["name"]))
				$name = $_POST["name"];
			if (isset ($_POST["id"]))
				$id = $_POST["id"];
			if ($id != "" || $name != "") {
				$query = "select * from $sql_table where firstname like '$name%' or lastname like '$name%' or student_id like '$id%'";
			} else {
				echo "<p class= \"darkred\">Please enter an ID or name first.</p>";
			}
		}

		if (isset ($_POST["firsttry"])) {
			$query = "select * from $sql_table where score = 7 and num_of_attempt = 1";
		}

		if (isset ($_POST["thirdtry"])) {
			$query = "select * from $sql_table where score < 4 and num_of_attempt = 3";
		}

		//Sorting Function
		if (isset ($_POST["sort"])) {
			if (isset ($_POST["order"])) {
				if ($_POST["order"] == "ascending")
					$order = "asc";
				if ($_POST["order"] == "descending")
					$order = "desc";

				switch ($_POST["sort_option"]) {
				case "firstname":
					$query = "select * from $sql_table order by firstname $order";
					break;
				case "lastname":
					$query = "select * from $sql_table order by lastname $order";
					break;
				case "sort_id":
					$query = "select * from $sql_table order by student_id $order";
					break;
				default:
					$query = "select * from $sql_table order by score $order";
				}

			} // sort order set		
		} //if sort button pressed

		$result = @mysqli_query($conn, $query);

		if ($result) {
			if (mysqli_num_rows($result) == 0) {
				echo "<p class = \"darkred\">There is no records available</p>";
			} else {
  				create_table($result);
  			}//successful query
  		}
	?>
	<form action="manage.php" method="post">
		<h3 class="darkred">Other:</h3>
		<p class="darkblue">Delete records of ID: <input type="text" name="id_del"/> <input type="submit" name="delete" value="Delete"/></p>
	</form>
	<?php
		if (isset ($_POST["id_del"])) {
			$id_del = $_POST["id_del"];
			if (!preg_match('/[0-9]{7,10}/', $id_del)) {
				echo "<p class=\"darkred\">Please enter a valid ID</p>";
			} else {
				$query = "delete from $sql_table where student_id = '$id_del'";
				$result = @mysqli_query($conn, $query);
				if (!$result) {
					echo "<p>No attempts for ID $id_del</p>";
				} else {
					echo "<p>Records deleted</p>";
				}
			}
		} //delete button pressed
	?>

	<form action="manage.php" method="post">
		<p class="darkblue">Change score of ID: <input type="text" name="id_change"/> New score: <input type="text" name="score_change"/> <input type="submit" name="change" value="Change"/></p>
	</form>
	<?php
		if ((isset ($_POST["id_change"])) && isset ($_POST["score_change"])) {
			$valid = true;
			$id_change = $_POST["id_change"];
			$score_change = $_POST["score_change"];
			if (!preg_match('/[0-9]{7,10}/', $id_change)) {
				echo "<p class=\"darkred\">Please enter a valid ID</p>";
				$valid = false;
			} 
			if ($score_change > 7) {
				echo "<p class = \"darkerd\">Invalid score. Maximum score is 7</p>";
				$valid = false;
			}

			if ($valid) {
				$query = "update $sql_table set score = '$score_change' where student_id = '$id_change'";
				$result = @mysqli_query($conn, $query);
				if (!$result) {
					echo "<p>Something is wrong</p>";
				} else {
					echo "<p class=\"darkred\">Score updated!</p>";
				}
			}
		}
	?>
	<?php
		function create_table($result) {
			echo "<table>\n";
				echo "<tr>\n "
					."<th scope=\"col\">Attempt ID</th>\n"
					."<th scope=\"col\">Name</th>\n"
					."<th scope=\"col\">Student ID</th>\n"
					."<th scope=\"col\">Number of Attempts</th>\n"
					."<th scope=\"col\">Score</th>\n"
					."<th scope=\"col\">Date and time</th>\n"
					."</tr>\n";

				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr>\n";
					echo "<td>",$row["attempt_id"],"</td>\n";
					echo "<td>",$row["firstname"], " ", $row["lastname"],"</td>\n";
					echo "<td>",$row["student_id"],"</td>\n";
					echo "<td>",$row["num_of_attempt"],"</td>\n";
					echo "<td>",$row["score"],"</td>\n";
					echo "<td>",$row["date_and_time"],"</td>\n";
				}

				echo "</table>";
		}
	?>
</div>
<?php
 	 require_once('footer.inc');
 ?>
 </body>
 </html>