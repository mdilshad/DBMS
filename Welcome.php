<?php require("login.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-gb" xmlns="http://www.w3.org/1999/xhtml" lang="en-gb"><head>
<title>Welcome to Training &amp; Placement Cell</title>
<style>
.mod {
color:#1B5D89;
font-weight:bold;
font-size:14px;
}
</style>
</head>
<body id="page_bg" class="b-medium p-red bd-beige">
<script type="text/javascript" src="placement/mootools.js"></script>
<script type="text/javascript" src="placement/caption.js"></script>
<link rel="stylesheet" href="placement/system.css" type="text/css">
<link rel="stylesheet" href="placement/general.css" type="text/css">
<link href="placement/template.css" rel="stylesheet" type="text/css">
<link href="placement/suckerfish.css" rel="stylesheet" type="text/css">
<link href="placement/body_beige.css" rel="stylesheet" type="text/css">
<link href="placement/primary_red.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="http://www.itbhu.ac.in/tpo/images/favicon.html">
<link href="placement/rokzoom.css" rel="stylesheet" type="text/css">

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
<li id="current" class="active item1"><a href="Welcome.php"><span>Home</span></a></li>
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
	if($_SESSION['logged']!=1)
		echo '<li class="item58"><a href="adminlogin.php"><span>Admin Login</span></a></li></ul></div></div>';
	else
		echo '<li class="item58"><a href="logout.php"><span>Admin Logout</span></a></li></ul></div></div>';
?>
<table class="mainbg" cellpadding="0" cellspacing="0">
<tbody>
<tr valign="top">
<td class="main">

<div class="mainbody">
<span class="mod"><center>Welcome
<?php
	if($_SESSION['logged']!=1)
		echo 'Guest';
	else
		echo $_SESSION['name'];
?></center></span>
<span class="breadcrumbs pathway">Home</span>
<table class="contentpaneopen">
<tbody>
<tr>
<td class="contentheading" width="100%"><a href="" class="contentpagetitle">Welcome to Training &amp; Placement Cell</a></td>
</tr></tbody></table>
<table class="contentpaneopen">
<tbody>
<tr>
<td colspan="2" valign="top">
<div align="justify">
<table height="506" width="541" border="0">
<tbody>
<tr>
<td>
<p><font color="#000000">The Training &amp; Placement Office, NIT Calicut 
facilitates the process of placement of students passing out from the 
Institute besides collaborating with leading organizations and 
institutes in setting up of internship and training program of students.</font></p>
<p><font color="#000000"> The office liaises with various industrial 
establishments, corporate houses etc which conduct campus interviews and
 select graduate and post-graduate students from all disciplines. The 
Training &amp; Placement Office provides the infra-structural facilities
 to conduct group discussions, tests and interviews besides catering to 
other logistics. The Office interacts with many industries in the 
country, of which nearly 200 companies visit the campus for holding 
campus interviews. The industries which approach the institute come 
under the purview of: </font></p>
<p><font color="#000000">&nbsp;&nbsp;&nbsp; * Core Engineering industries<br>
&nbsp;&nbsp;&nbsp; * IT &amp; IT enabled services<br>
&nbsp;&nbsp;&nbsp; * Manufacturing Industries<br>
&nbsp;&nbsp;&nbsp; * Consultancy Firms<br>
&nbsp;&nbsp;&nbsp; * Finance Companies<br>
&nbsp;&nbsp;&nbsp; * Management Organisations<br>
&nbsp;&nbsp;&nbsp; * R &amp; D laboratories etc</font></p>
<p><font color="#000000">The placement season runs through the course of
 the year commencing the last week of July through to March. 
Pre-Placement Talks are also conducted in this regard as per mutual 
convenience.&nbsp; Job offers, dates of interviews, selection of 
candidates etc. are announced through the Training &amp; Placement 
Office .<br>
The Placement Office is assisted by a committee comprising 
representatives of students from the under-graduate and post-graduate 
engineering streams. The committee evolves a broad policy framework 
every year besides a set of rules which are inviolable. Students members
 are closely co-opted in implementing these policy decisions.</font></p></td></tr></tbody></table></div></td></tr></tbody></table><span class="article_separator">&nbsp;</span></div></td>
<td class="side">
<div class="block">
<div class="moduletable">
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
<td><a href="nitc.pdf" target="_blank" class="mainlevel">Brochure</a></td></tr>
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
