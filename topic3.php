<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
 	<meta name="description" content="IPv4 &amp; IPv6 Comparison" />
  	<meta name="keywords"    content="HTML, CSS, JavaScript" />
  	<meta name="author"      content="Minh Nguyen" />
  	<title>Difference between IPv4 and IPv6</title>
 	<link href="styles/style.css" rel="stylesheet"/>
 	 <link href="styles/responsive.css" rel="stylesheet"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>
	<?php
    	require_once('header.inc');
 	?>

<div class="fieldset">
<article>
	<h2 class="title">IPv4 and IPv6</h2>
<section id="limitation">
	<!--Downsides of IPv4-->
	<h2>Limitations of IPv4</h2>
		<ol>
			<li><p>The lack of address space - the number of different devices connected to the Internet grows exponentially, and the size of the address space is quickly depleted. Since IPv4 only uses 32 bits for addressing, the IPv4 address space only has 2 ^ 32 addresses. With the strong development of the Internet today, the resource of IPv4 addresses has been nearly exhausted. Thus, today's IPv4 hardly meets the needs of the Internet. The two major problems facing IPv4 are the lack of addresses, especially the mid-range (class B) address spaces and the dangerous growth in the size of routing tables in the Internet.</p></li>
		 	<li><p>Weak protocol extensibility - the insufficient size of the IPv4 header, which does not accommodate the required number of additional parameters.</p></li>
			<li><p>The problem of security of communications - no means are provided to limit access to information hosted on the network. IPv4 has never been designed for security.</p>
				<ul id="square">
					<li>Originally designed as an isolated military network.</li>
					<li>Then adapted for public education and research network.</li>
				</ul></li>
			<li><p>Lack of quality of service support - placement of information about bandwidth, delays required for smooth operation of some network applications are not supported.</p></li>
			<li><p>Geographic limitations - since the Internet was created in the USA, this country is also involved in the distribution of IP addresses. Almost 50% of all addresses are reserved for the United States.</p></li>
		</ol>
</section>

<section id="advantage">
	<!--IPv6 advantages compared with IPv4-->
	<h2>Advantages of IPv6</h2>
		<p>Based on the shortcomings of the above IPv4, especially the address shortage in the near future. This has prompted designers to study a new generation of addresses to solve the shortcomings of IPv4, which is IPv6 or IPng (Next Generation: Next Generation). IPv6 was born to address the disadvantages of IPv4 and bring some of the following advantages:</p>
		<ol>
			<li><p>Large address space (128 bit address).</p></li>
			<li><p>Supports end to end and completely removes NAT technology.</p></li>
			<li><p>Built-in security component.</p></li>
			<li><p>Simple configuration, IPv6 is able to automatically configure without using a DHCP server.</p></li>
			<li><p>IPv6 allows network nodes to use mobile IP addresses (a concept did not exist at the time of the design of IPv4).</p></li>
			<li><p>Optimization of the header because the options are given later, making the expansion easier.</p></li>
		</ol>
		<p>With the above advantages of IPv6, that is the reason why IPv6 is widely deployed in the network in the future.</p>
		</section>

<!--Difference bwt 2 types shown in a table-->
<section id="difference">
	<h2>Differences between IPv4 and IPv6</h2>
	<table id="table">
		<thead>
			<tr>
				<th>Basis for differences</th>
				<th>IPv4</th>
				<th>IPv6</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Address size</td>
				<td>32-Bit IP Address</td>
				<td>128-Bit IP Address</td>
			</tr>
			<tr>
				<td>Addressing Method</td>
				<td>IPv4 is a numeric address, and its binary bits are separated by a dot (.)</td>
				<td>IPv6 is an alphanumeric address whose binary bits are separated by a colon (:). It also contains hexadecimal.</td>
			</tr>
			<tr>
				<td>Addresses Types</td>
				<td>Unicast, Broadcast and Multicast</td>
				<td>Unicast, Multicast and Anycast</td>
			</tr>
			<tr>
				<td>Classes</td>
				<td>IPv4 offers five different classes of IP Address. Class A to E.</td>
				<td>IPv6 allows storing an unlimited number of IP Address.</td>
			</tr>
			<tr>
				<td>Security</td>
				<td>Security is dependent. IPv4 was not originally designed with security.</td>
				<td>IPv6 provides interoperability and mobility capabilities which are embedded in network devices.</td>
			</tr>
			<tr>
				<td>Network Configuration</td>
				<td>Need to be configured either manually or with DHCP. IPv4 had several overlays to handle Internet growth, which require more maintenance efforts.</td>
				<td>Support autoconfiguration capabilities.</td>
			</tr>
			<tr>
				<td>Packet Size</td>
				<td>Packet size 576 bytes required, fragmentation optional.</td>
				<td>1208 bytes required without fragmentation.</td>
			</tr>
			<tr>
				<td>Checksum</td>
				<td>Has checksum fields.</td>
				<td>No checksum fields.</td>
			</tr>
			<tr>
				<td>Header fields</td>
				<td>Number: 12, Length: 20</td>
				<td>Number: 20, Length: 40</td>
			</tr>
			<tr>
				<td>Fragmentation</td>
				<td>Done by sending and forwarding routes.</td>
				<td>Done be the sender.</td>
			</tr>
		</tbody>
	</table>
</section>
</article>
</div>
<?php
  require_once('footer.inc');
?>
</body>
</html>