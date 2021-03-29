<?php
	session_start();
	require_once('settings.php');
	$conn = @mysqli_connect($host,
 		$user,
 		$pwd,
 		$sql_db
 	);

 	$_SESSION["logged_in"] = false;
  	$sql_table = "loginform";
 	mysqli_select_db($conn, $sql_db);
 	if (!isset ($_SESSION["false_login"])) {
 		$_SESSION["false_login"] = 1;
 	}
 	$false_login = $_SESSION["false_login"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
 	<meta name="description" content="IPv4 &amp; IPv6 Introduction" />
 	<meta name="keywords"    content="HTML, CSS, PHP, JavaScript" />
  	<meta name="author"      content="Minh Nguyen" />
  	<title>Login</title>
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
	<h2>LOGIN</h2>
	<form method="post" action="#">
		<p class="darkblue">Username: <input type="text" name="username" placeholder="Enter your username..."/></p>
		<p class="darkblue">Passowrd: <input type="text" name="password" placeholder="Enter your password..."/></p>
		<input type="submit" name="submit" value="Login"/>
	</form>
	<?php
	if ($false_login <= 3) {
		if (isset ($_POST["username"])) {
 			$username = $_POST["username"];
 			$password = $_POST["password"];

 			$query = "select * from $sql_table where User = '$username' and Pass = '$password' limit 1";

 			$result = @mysqli_query($conn, $query);
 			if (mysqli_num_rows($result) == 1) {
 				echo "You have successfully logged in";
 				$_SESSION["logged_in"] = true;
 				$_SESSION["last_activity"] = time();
 				header("location:manage.php");
 				$_SESSION["false_login"] = 1;
 				exit();
 			} else {
 				echo "<p class=\"darkred\">You have entered incorrect password or username</p>";
 				$false_login += 1;
 				$_SESSION["false_login"] = $false_login;
 			}
 		}
	} else {
		$penalty_time = 0;
		if (!isset ($_SESSION["penalty_start"])) {
			$_SESSION["penalty_start"] = time();
		}
		$penalty_start = $_SESSION["penalty_start"];
		echo "<p class=\"darkred\">You have failed to login more than 3 times. You won't be able to sign in again for another ".floor($penalty_time/60). " minutes.</p>";
		if (time() - $penalty_start > $penalty_time) {
			$_SESSION["false_login"] = 1;
		}
	}

 		//Temporarily lock the supervisor's webpage
	?>
</div>
	<?php
		require_once('footer.inc');
	?>
</body>
</html>