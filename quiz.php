<?php 
  session_start();
  if (!isset ($_SESSION["attempt"])) {
    $attempt = 0;
    $_SESSION["attempt"] = $attempt;
  } else {
    $attempt = $_SESSION["attempt"];
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
 	<meta name="description" content="IPv4 &amp; IPv6 Introduction" />
  <meta name="keywords"    content="HTML, CSS, JavaScript" />
  <meta name="author"      content="Minh Nguyen" />
  <title>Quiz</title>
 	<link href="styles/style.css" rel="stylesheet"/>
  <link href="styles/responsive.css" rel="stylesheet"/>
  <!--<script  src="scripts/quiz.js"></script>
  <script src="scripts/enhancements.js"></script>-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
  <?php
    require_once('header.inc');
    require_once('settings.php');
  ?>

<div class="fieldset">
<form method="post" action="markquiz.php" id="quizform" novalidate="novalidate">
  <h2>QUIZ!</h2>
    <p>Here is a quick game to test your knowledge about IPv4 and IPv6.</p>
    <p>A special gift will be given to the person with the absolute score!</p>

  <fieldset>
    <legend class="darkred">Personal Information</legend>
      <p><label for="id">Student ID </label> 
      <input type="text" name= "id" id="id" required="required" pattern="[0-9]{7,10}" title="ID must contain between 7 and 10 digits"/>
    </p>
      <p><label for="givenname">Given Name</label>
      <input type="text" name="givenname" id="givenname" required="required" pattern="[A-Za-z\s_-]{1,25}" title="Maximum 25 characters and alphabet only" />

      <label for="familyname">Family Name</label>
      <input type="text" name="familyname" id="familyname" required="required" pattern="[A-Za-z\s_-]{1,25}" title="Maximum 25 characters and alphabet only" />
    </p>
    <p><label for="email">Please enter your email so we can send you the present later &#128521;</label></p>
      <input type="email" name="email" id="email" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="characters@characters.domain"/>
    </fieldset>
    <br/>
    <fieldset>
      <legend class="darkred">Quiz</legend>
        <fieldset>
        <p class="darkblue">Click "Start" before doing the quiz!!!</p>
        <p class="darkred">Time: <span id= "timer"> 02:00 </span> <button id="start">Start</button></p>
        <p class="darkblue">Part 1: Multiple choices - Choose the right answer(s).</p>
        <div id="q1">
          <p>1. What type(s) does IPv4 support?</p>
          <input type="checkbox" name="address[]" id="unicast" value="unicast" /><label for="unicast">Unicast address</label><br/>
          <input type="checkbox" name="address[]" id="multicast" value="multicast" /><label for="multicast">Multicast address</label><br/>
          <input type="checkbox" name="address[]" id="anycast" value="anycast" /><label for="anycast">Anycast address</label><br/>
          <input type="checkbox" name="address[]" id="broadcast" value="broadcast" /><label for="broadcast">Broadcast address</label>
        </div>
        
        <div id="q2">
          <p>2. The bytes of IPv6 are classified into 3 parts. What are they?</p>
          <input type="radio" name="parts" id="net-host-subnet" required="required" value="net-host-subnet" /><label for="net-host-subnet">network, host, subnet number</label><br/>
          <input type="radio" name="parts" id="site-host-inter" value="site-host-inter" /><label for="site-host-inter">site prefix, host, interface ID</label><br/>
          <input type="radio" name="parts" id="site-subnet-inter" value="site-subnet-inter" /><label for="site-subnet-inter">site prefix, subnet ID, interface ID</label>
        </div>
    
        <p><label for="q3">3. The default subnet mask for Class A IP address is</label></p>
            <select name="subnetmask" id="q3" required="required">
              <option value="">Please select</option>
              <option value="255.0.0.0">255.0.0.0</option>
              <option value="224.0.0.0">224.0.0.0</option>
              <option value="192.168.1.128">192.168.1.128</option>
              <option value="2001:db8::ff00:42:8329">2001:db8::ff00:42:8329</option>
            </select>
       
      </fieldset>
      <fieldset>
        <p class="darkblue">Part 2: Short answers - Fill in the blanks.</p>
         <p><label for="q4">4. An IPv6 address is 128 bits in length and consists of eight 16-bit blocks. Each block is then converted to </label><input type="text" name="numbersystem" id="q4" required="required"/>.</p>
         <p><label for="q5">5. IPv4 offers </label><input type="text" name="amount" id="q5" required="required"/> different classes of IP Address. Class A to E. </p>
      </fieldset>

      <fieldset>
        <p class="darkblue">Part 3: Long answers.</p>
          <p><label for="q6">6. What is the difference between broadcast and multicast?</label></p>
            <textarea id="q6" name="difference" rows="6" cols="60" placeholder="Type your answer here..." required="required"></textarea>
          <p><label for="q7">7. List 3 advantages of IPv6 over IPv4</label></p>
            <textarea id="q7" name="advantages" rows="6" cols="60" placeholder="Type your answer here..." required="required"></textarea>
      </fieldset>
</fieldset>
    <input type= "submit" value="Submit" name="submit"/>
    <input type= "reset" value="Reset answers"/>  
</form>
</div>

<?php
   require_once('footer.inc');
?>

</body>
</html>