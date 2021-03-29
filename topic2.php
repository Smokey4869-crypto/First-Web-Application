<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
 	<meta name="description" content="IPv4 &amp; IPv6 Introduction" />
  <meta name="keywords"    content="HTML, CSS, JavaScript" />
  <meta name="author"      content="Minh Nguyen" />
  <title>IPv6 Address</title>
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
  <!--IPv6 Intro-->
    <h2 class="title">Internet Protocol version 6 (IPv6)</h2>
  <section id="WhatisIPv6">
    <h2>What is IPv6?</h2>
      <p>Internet Protocol version 6 (IPv6) is the most recent version of the Internet Protocol (IP), the communications protocol that provides an identification and location system for computers on networks and routes traffic across the Internet. IPv6 was developed by the Internet Engineering Task Force(IETF) to deal with the long-anticipated problem of IPv4 address exhaustion. IPv6 is intended to replace IPv4. In December 1998, IPv6 became a Draft Standard for the IETF, who subsequently ratified it as an Internet Standard on 14 July 2017.</p>
  </section>

  <!--IPv6 Add Structure-->
  <section id="ipv6_add_str">
    <h2>Address Structure</h2>
      <p>An IPv6 address is made of 128 bits divided into eight 16-bits blocks. Each block is then converted into 4-digit Hexadecimal numbers separated by colon symbols. The IPv4 version used to configure IP addresses in numerical value (numbers) which may conflict with other IP addresses. That’s why IPv6 adopted the hexadecimal method to provide unique IP addresses to billions of users in the world.</p>
      <!--Shorten Add Rules-->
      <p>IPv6 provides 2 rules to shorten the address:</p>
        <ul class="disc">
          <li>The leading 0s can be omitted.</li>
          <li>If any single or contiguous string of two or more blocks contain only 0s, they can be represented by double colon.</li>
        </ul>
        <img src="images/ipv6_add_parts.gif" alt="IPv6 address structure" class="resize" />

      <!--IPv6 Parts Classification-->
      <p>The bytes of the IPv6 address are classified into three parts: <span class="orange">site prefix</span>, <span class="orange">subnet ID and interface ID</span>.</p>
      <img src="images/basic-IPv6-address.png" alt="IPv6 address parts" class="resize" />

      <ul class="disc">
        <li><span class="orange">Site Prefix</span> is the number assigned to the website by an ISP. Accordingly, all computers in the same location will be sharing the same site prefix. The site prefix is intended to be shared when it recognizes your network and allows the network to be accessible from the Internet.</li>

        <li><span class="orange">Subnet ID</span> is an internal web page element used to describe the site's page structure. An IPv6 subnet is similar in structure to a single network branch like an IPv4 subnet.</li>

        <li><span class="orange">Interface ID</span> has a structure similar to ID in IPv4. This number uniquely identifies a single host on the network. Interface ID (which is sometimes referred to as a tag) is typically configured automatically based on the MAC address of the network interface. The interface ID can be configured in EUI-64 format.</li>
      </ul>
  </section>
     
  <!--Ipv6 Add Types-->
  <section id="ipv6_add_type">
    <h2>Address Types</h2>
      <p>The three types of IPv6 addresses are: <span class="orange">Unicast</span>, <span class="orange">Multicast</span>, <span class="orange">Anycast</span>.</p>

      <h3><span class="darkred">Unicast Address</span></h3>
        <p>Like IPv4, IPv6 supports unicast transmission. A unicast address identifies a single interface. When a network device sends a packet to a unicast address, the packet goes only to the specific interface identified by that address. Unicast addresses support a global address scope and two types of local address scopes.</p>
        <p>A unicast address consists of n bits for the prefix, and 128 – n bits for the interface ID.</p>
        <p>In the IPv6 implementation for a subscriber access network, the following types of unicast addresses can be used:</p>
          <ul class="disc">  
            <li>Global unicast address</li>
            <li>Link-local IPv6 address</li>
            <li>Loopback IPv6 address</li>
            <li>Unspecified address</li>
          </ul>
      <h3><span class="darkred">Multicast Address</span></h3>
        <p>IPv6 also support multicast transmission. IPv6 does not support broadcast addresses, but instead uses multicast addresses in this role.</p>
        <p>A multicast address identifies a set of interfaces that typically belong to different nodes. When a network device sends a packet to a multicast address, the device broadcasts the packet to all interfaces identified by that address.</p>
        <p>Multicast addresses support 16 different types of address scope, including node, link, site, organization, and global scope. A 4-bit field in the prefix identifies the address scope.</p>
        <p>Multicast addresses use the prefix FF00::/8.</p>
        <p>The following types of multicast addresses can be used in an IPv6 subscriber access network:</p>
          <ul class="disc">
            <li>Solicited-node multicast address</li>
            <li>All-nodes multicast address</li>
            <li>All-routers multicast address</li>
          </ul>
      <h3><span class="darkred">Anycast Address</span></h3>
        <p>An anycast address identifies a set of interfaces that typically belong to different nodes. Anycast addresses are similar to multicast addresses, except that packets are sent only to one interface, not to all interfaces. The routing protocol used in the network usually determines which interface is physically closest within the set of anycast addresses and routes the packet along the shortest path to its destination.</p>
        <p>There is no difference between anycast addresses and unicast addresses except for the subnet-router address. For an anycast subnet-router address, the low-order bits, typically 64 or more, are zero. Anycast addresses are taken from the unicast address space.</p>
  </section>
</article>
</div>
<?php
  require_once('footer.inc');
?>
</body>
</html>