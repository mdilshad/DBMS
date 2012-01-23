<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-gb" xmlns="http://www.w3.org/1999/xhtml" lang="en-gb"><head>
  <title>Message from the Director</title>
<style>
.mod {
color:#1B5D89;
font-weight:bold;
font-size:14px;
}
</style> 
<link rel="stylesheet" href="placement/system.css" type="text/css">
<link rel="stylesheet" href="placement/general.css" type="text/css">
<link href="placement/template.css" rel="stylesheet" type="text/css">
<link href="placement/suckerfish.css" rel="stylesheet" type="text/css">
<link href="placement/body_beige.css" rel="stylesheet" type="text/css">
<link href="placement/primary_red.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="http://www.itbhu.ac.in/tpo/images/favicon.html">
<link href="placement/rokzoom.css" rel="stylesheet" type="text/css">
</head><body id="page_bg" class="b-medium p-red bd-beige">

<div class="wrapper">
<div class="mainbg">
<div id="header"><a href="" class="nounder"><img src="placement/logo.jpg" alt="image not availevel" border="2" height="100" width="800"></a>
<div id="scroller"></div>
<div id="header_spotlight">
<div id="topbox"></div>
<div id="searchbox"></div></div></div>
<div id="safari">
<div id="nav_suckerfish">
<ul class="menu">
<li class="item75"><a href="" target="_blank"><span>NITC Home</span></a></li>
<li class="item1"><a href="Welcome.php"><span>Home</span></a></li>
<li class="item55"><a href="procedure.php"><span>Procedure</span></a></li>
<li class="parent item56"><a href="recruit.php" class="topdaddy"><span>Why Recruit @ NITC</span></a>
<ul>
<li class="item65"><a href="alumni.php"><span>Alumni</span></a></li>
<li class="item66"><a href="facilities.php"><span>Facilities</span></a></li></ul></li>
<li class="parent item57"><a href="" class="topdaddy"><span>Academics</span></a>
<ul>
<li class="item67"><a href="disciplines.php"><span>Disciplines</span></a></li>
<li class="item68"><a href="students-profile.php"><span>Students profile</span></a></li>
<li class="item69"><a href="beyond.php"><span>Beyond academics</span></a></li></ul></li>
<li class="parent item60"><a href="" class="topdaddy"><span>Placements</span></a>
<ul>
<li class="item70"><a href="past-recruiters.php"><span>Past recruiters</span></a></li>
<li class="item71"><a href=""><span>Placement statistics</span></a></li></ul></li>
<li class="item58"><a href="contact.php"><span>Contact Us</span></a></li>
<?php
	require("login.php");
	if($_SESSION['logged']!=1)
		echo '<li class="item58"><a href="adminlogin.php"><span>Admin Login</span></a></li></ul></div></div>';
	else
		echo '<li class="item58"><a href="logout.php"><span>Admin Logout</span></a></li></ul></div></div>';
?>
<table class="mainbg" cellpadding="0" cellspacing="0">
<tbody><tr valign="top">
<td class="main"><div class="mainbody">
<span class="mod"><center>Welcome
<?php
	if($_SESSION['logged']!=1)
		echo 'Guest';
	else
		echo $_SESSION['name'];
?></center></span>
<span class="breadcrumbs pathway">
<a href="Welcome.php" class="pathway">Home</a> <img src="placement/arrow.png" alt=""> Message from the Director</span>
<table class="contentpaneopen">
<tbody><tr>
<td class="contentheading" width="100%">Message from the Director</td>
</tr>
</tbody></table>

<table class="contentpaneopen">
<tbody>
</tbody></table>
<span class="article_separator">&nbsp;</span>
</div></td>
<td class="side"><div class="block"><div class="moduletable">
<h3>Important</h3>
<ul id="mainlevel-nav">
<li><a href="tpo.php" class="mainlevel-nav">Invitation from TPO</a></li>
<li><a href="director.php" class="mainlevel-nav">Message from the Director</a></li>
</ul>		</div>
<div class="moduletable">
<h3>Latest News</h3>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tbody>
<tr>
<td><a href="students.php" class="mainlevel">For students</a></td></tr>
<tr>
<td><a href="current-placement.php" class="mainlevel">Current Placement</a></td></tr>
</tbody></table>		</div>
<div class="moduletable">
<h3>Downloads</h3>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tbody>
<tr>
<td><a href="" target="_blank" class="mainlevel">Brochure</a></td></tr>
<tr>
<td><a href="" class="mainlevel">Student proforma</a></td></tr>
</tbody></table>		</div>
<div class="moduletable">
<h3>Search</h3>
<form action="query.php" method="post">
<div class="search"><input type="submit" name="submit" value="Search">	</div></form>		</div></div></td></tr></tbody></table>
<div id="footer">
<a href="">Copyright ©2008</a> National Institute of Technology,Calicut - 673601 | <a href="">Disclaimer</a>
</div>							</div></div>
</body></html>
