<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8" />
 	<meta name="description" content="IPv4 &amp; IPv6 Introduction"/>
  <meta name="keywords"    content="HTML, CSS, JavaScript" />
  <meta name="author"      content="Minh Nguyen" />
  <title>Enhancements</title>
 	<link href="styles/style.css" rel="stylesheet"/>
  <link href="styles/responsive.css" rel="stylesheet"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
  <?php
    require_once('header.inc');
  ?>

<div class="fieldset">

  <section id="enhance">
  <h2>Enhancements</h2>
    <p>For this assignment, I make some enhancements beyond the basic PHP in the Tutorials. Here is a list of them: </p>
      <ul class="disc">
        <li><p><a class="source" href="manage.php"><strong>Sorting Function: </strong></a>The sorting function allows users to sort data by score, name, and ID; in ascending or descending order.</p></li>
        <li><p><a class="source" href="manage.php"><strong>Login to the supervisor's webpage: </strong></a>Supervisors have their own usernames and passwords to access the database. The supervisor’s webpage cannot be entered directly using a URL after logging out. A time duration for the session of each login. After successful logging in, time starts to count down. When time runs out, users have to log in again. Also, if users have failed login 3 times in a row, they cannot sign in for a period of time.</p></li>
      </ul>
  </section>
</div>
<?php
  require_once('footer.inc');
?>
</body>
</html>
