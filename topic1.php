<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
 	<meta name="description" content="IPv4 &amp; IPv6 Introduction" />
  	<meta name="keywords"    content="HTML, CSS, JavaScript" />
  	<meta name="author"      content="Minh Nguyen" />
  	<title>IPv4 Address</title>
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
  <!--IPv4 Intro-->
    <h2 class="title">Internet Protocol version 4 (IPv4)</h2>
    <section id="WhatisIPv4">
		  <h2>What is IPv4?</h2>
      <aside>
       <p>IETF or The Internet Engineering Task Force is an open standards organization, which develops and promotes voluntary Internet standards, in particular the standards that comprise the Internet protocol suite.</p>
      </aside>
			   <p>Internet Protocol version 4 (IPv4) is the fourth version of the Internet Protocol (IP). It is one of the core protocols of standards-based internetworking methods in the Internet and other packet-switched networks. IPv4 was the first version deployed for production on SATNET in 1982 and on the ARPANET in January 1983. It still routes most Internet traffic today, despite the ongoing deployment of a successor protocol, IPv6. IPv4 is described in <span class="orange">Internet Engineering Task Force(IETF)</span> publication RFC 791 (September 1981), replacing an earlier definition (RFC 760, January 1980).<br/>
          The IPv4 address is a 32-bit number that uniquely identifies a network interface on a machine. An IPv4 address is typically written in decimal digits, formatted as four 8-bit fields separated by periods. Each 8-bit field represents a byte of the IPv4 address. This form of representing the bytes of an IPv4 address is often referred to as the dotted-decimal format.</p>
       
    </section>
    <!--IPv4 Structure-->
    <section id="ipv4_add_str">
    <h2>Adress Structure</h2>
      <p>The bytes of the IPv4 address are classified into two parts: the <span class="orange">network part</span> and the <span class="orange">host part</span>. IP address has 32 binary bits and is divided into octets (4 clusters, 8 bits)</p>
      <img src="../assign1/images/ipv4_add_parts.gif" alt="ipv4_add_parts" title="Parts of an IPv4 Address"/>
      <ul class="disc">
        <li><span class="orange">Network Part:</span> specifies the unique number assigned to a network. It also identifies the class of network assigned. In Figure 7-3, the network part takes up two bytes of the IPv4 address.</li>

        <li><span class="orange">Host Part:</span> is the part of the IPv4 address that is assgined to each host. It uniquely identifies this machine on a network. Note that for each host on a network, the network part of the address will be the same, but the host part must be different.</li>

        <li><span class="orange">Subnet Number (Optional):</span> Local networks with large numbers of hosts are sometimes divided into subnets. If you choose to divide your network into subnets, you need to assign a subnet number for the subnet. The efficiency of the IPv4 address space can be maximized by using some of the bits from the host number part of the IPv4 address as a network identifier. When used as a network identifier, the specified part of the address becomes the subnet number. You create a subnet number by using a netmask, which is a bit mask that selects the network and subnet parts of an IPv4 address.</li>
      </ul>
  </section>

  <!--IPv4 Add Class-->
  <section id="ipv4_add_class">
    <h2>Address Classes</h2>
      <p>The first octet referred here is the left most of all. The octets numbered as follows depicting dotted decimal notation of IP Address.</p>
      <p>The number of networks and the number of hosts per class can be derived by this formula: <span class="orange">2<sup>n</sup>-2 (where n is the number of bits in the host part)</span>.</p>
      <h3><span class="darkred">Class A Address</span></h3>
        <p>The first bit of the first octet is always set to 0 (zero). Thus the first octet ranges from 1 – 127, i.e.</p>
        <img src="images/class_a_addresses.jpg" alt="class A address"/>
        <p>Class A addresses only include IP starting from 1.x.x.x to 126.x.x.x only. The IP range 127.x.x.x is reserved for loopback IP addresses.</p>
        <p>The default subnet mask for Class A IP address is 255.0.0.0 which implies that Class A addressing can have 126 networks (2<sup>7</sup>-2) and 16777214 hosts (2<sup>24</sup>-2). Class A IP address format is thus: <span class="orange">0</span><span class="darkblue">NNNNNNN</span><span class="darkred">.HHHHHHHH.HHHHHHHH.HHHHHHHH</span></p>

      <h3><span class="darkred">Class B Address</span></h3>
        <p>An IP address which belongs to class B has the first two bits in the first octet set to 10, i.e.</p>
        <img src="images/class_b_addresses.jpg" alt="class B address"/>
        <p>Class B IP Addresses range from 128.0.x.x to 191.255.x.x. The default subnet mask for Class B is 255.255.x.x.</p>
        <p>Class B has 16384 (2<sup>14</sup>) Network addresses and 65534 (2<sup>16</sup>-2) Host addresses.Class B IP address format is:<br/> <span class="orange">10</span><span class="darkblue">NNNNNN.NNNNNNNN</span>.<span class="darkred">HHHHHHHH.HHHHHHHH</span></p>

      <h3><span class="darkred">Class C Address</span></h3>
        <p>The first octet of Class C IP address has its first 3 bits set to 110, i.e</p>
        <img src="images/class_c_addresses.jpg" alt="class C address"/>
        <p>Class C IP addresses range from 192.0.0.x to 223.255.255.x. The default subnet mask for Class C is 255.255.255.x.</p>
        <p>Class C gives 2097152 (2<sup>21</sup>) Network addresses and 254 (2<sup>8</sup>-2) Host addresses. Class C IP address format is:<br/> <span class="orange">110</span><span class="darkblue">NNNNN.NNNNNNNN.NNNNNNNN.</span><span class="darkred">HHHHHHHH</span></p>

      <h3><span class="darkred">Class D Address</span></h3>
        <p>The first four bits of the first octet in Class D IP addresses are set to 1110. Class D has IP address range from 224.0.0.0 to 239.255.255.255.</p> 
        <p>Class D is reserved for Multicasting. In multicasting data is not destined for a particular host, that is why there is no need to extract host address from the IP address, and Class D does not have any subnet mask.</p>

      <h3><span class="darkred">Class E Address</span></h3>
        <p>This IP Class is reserved for experimental purposes only for R&amp;D or Study. IP addresses in this class ranges from 240.0.0.0 to 255.255.255.254. Like Class D, this class too is not equipped with any subnet mask.</p>
  </section>

  <!--IPv4 Add Types-->
  <section id="ipv4_add_type">
    <h2>Address Types</h2>
      <p>The three types of IPv4 addresses are: <span class="orange">Unicast</span>, <span class="orange">Multicast</span>, <span class="orange">Broadcast</span>.</p>

      <h3><span class="darkred">Unicast Address</span></h3>
        <p>Unicast communication is used for normal host-to-host communication in both a client/server and a peer-to-peer network. Unicast packets use the addresses of the destination device as the destination address and can be routed through an internetwork.</p>
        <p>In an IPv4 network, the unicast addresses applied to an end device is referred to as the host address. For unicast communication, the addresses assigned to the two end devices are used as the source and destination IPv4 addresses.</p>
        <img src="images/ipv4-unicast.jpg" alt="IPv4 Unicast Transmission" class="resize" />
      <h3><span class="darkred">Multicast Address</span></h3>
        <p>A multicast address identifies a group of hosts that are available to send a single packet to many destination hosts. The internetwork’s responsibility is to replicate the multicast flows in an efficient manner so that they reach only their intended recipients.</p>
        <p>IPv4 has a block of addresses reserved for addressing multicast groups. This address range is 224.0.0.0 to 239.255.255.255</p>
        <img src="images/ipv4-multicast.jpg" alt="IPv4 Multicast Transmission" class="resize" />
      <h3><span class="darkred">Broadcast Address</span></h3>
        <p>A broadcast address identifies a single host that is available to send a single packet to all hosts in the network. The key difference between broadcast and multicast is that in the broadcast the packet is delivered to all the host connected to the network whereas, in multicast packet is delivered to intended recipients only.</p>
        <img src="images/ipv4-broadcast.jpg" alt="Ipv4 Broadcast Transmission" class="resize" />
  </section>
</article>
</div>
<?php
  require_once('footer.inc');
?>
</body>
</html>