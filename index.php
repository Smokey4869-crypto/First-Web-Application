<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="IPv4 &amp; IPv6 Introduction" />
  <meta name="keywords"    content="HTML, CSS, JavaScript" />
  <meta name="author"      content="Minh Nguyen" />
  <title>IPv4 &amp; IPv6 Introduction</title>
  <link href="styles/style.css" rel="stylesheet"/>
  <link href="styles/responsive.css" rel="stylesheet"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
</head>

<body>
  <?php
    require_once('header.inc');
  ?>
<!--IMAGE INTRO-->
  <img id="blur" src="images/IP-intro.jpg" alt="IP Introduction"/>
  <section id="image-text">
    <h2>About IP Address</h2>
      <p>IP (Internet Protocol) Address is an address of your network hardware. It helps in connecting your computer to other devices on your network and all over the world. An IP Address is made up of numbers or characters.</p>
      <p>All devices that are connected to an internet connection have a unique IP address which means there’s a need of billions of IP addresses.</p>
      <p>There are are two IP versions: IPv4 and IPv6. IPv4 is the older version which has an space of over 4 billion IP addresses. However, the new IPv6 version can provide up to trillions of IP addresses to fulfill the need of all internet users and devices.</p>
  </section>
  <?php
  require_once('footer.inc');
  ?>
</body>
</html>