<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-gb" xmlns="http://www.w3.org/1999/xhtml" lang="en-gb"><head>
  
  <title>View and Search Details</title>
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
<li class="item75"><a href="Welcome.php" target="_blank"><span>TP Home</span></a></li>
<li id="current" class="active item1"><a href="query.php"><span>Home</span></a></li>
<li class="parent item56"><a href="" class="topdaddy"><span>Student</span></a>
<ul>
<li class="item62"><a href="vwstu.php"><span>View all</span></a></li>
<li class="item63"><a href="serstu.php"><span>Search</span></a></li></ul></li>
<li class="parent item56"><a href="" class="topdaddy"><span>Placed Student</span></a>
<ul>
<li class="item64"><a href="vwalumni.php"><span>View all</span></a></li>
<li class="item65"><a href="seralumni.php"><span>Search</span></a></li></ul></li>
<li class="parent item66"><a href="" class="topdaddy"><span>Course</span></a>
<ul>
<li class="item67"><a href="vwcors.php"><span>View all</span></a></li>
<li class="item68"><a href="sercors.php"><span>Search</span></a></li></ul></li>
<li class="parent item69"><a href="" class="topdaddy"><span>Department</span></a>
<ul>
<li class="item70"><a href="vwdept.php"><span>View all</span></a></li>
<li class="item71"><a href="serdept.php"><span>Search</span></a></li></ul></li>
<li class="parent item72"><a href="" class="topdaddy"><span>Company</span></a>
<ul>
<li class="item73"><a href="vwcom.php"><span>View all</span></a></li>
<li class="item74"><a href="sercom.php"><span>Search</span></a></li></ul></li>
<?php
	require("login.php");
	if($_SESSION['logged']!=1)
		echo '<li class="item58"><a href="adminlogin.php"><span>Admin Login</span></a></li></ul></div></div>';
	else
		echo '<li class="item58"><a href="logout.php"><span>Admin Logout</span></a></li></ul></div></div>';
?>
<table class="mainbg" cellpadding="0" cellspacing="0">
<tbody><tr valign="top">
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
														
<table class="contentpaneopen"><tbody><tr>
<td class="contentheading" width="100%">Placement Statics</td></tr>
</tbody></table>

<table class="contentpaneopen">
<tbody><tr>
<td colspan="2" valign="top">
<p><strong>The Cumulative Placement of the 2010 batch.</strong></p><p>&nbsp;</p><p></p>

<table style="width: 524px; height: 409px;" border="1"><tbody>
	<tr><td><strong>Branch</strong>&nbsp;</td><td>&nbsp;<strong>No  of Students</strong></td><td>&nbsp;<strong>No of offers</strong></td></tr>
	<tr><td>&nbsp;Ceramic</td><td>&nbsp;22</td><td>&nbsp;42</td></tr>
	<tr><td>&nbsp;Chemical</td><td>&nbsp;44</td><td>&nbsp;71</td></tr>
	<tr><td>&nbsp;Civil</td><td>&nbsp;30</td><td>&nbsp;67</td></tr>
	<tr><td>&nbsp;Computer</td><td>&nbsp;40</td><td>&nbsp;60</td></tr>
	<tr><td>&nbsp;Electrical</td><td>&nbsp;51</td><td>&nbsp;109</td></tr>
	<tr><td>&nbsp;Electronics</td><td>&nbsp;54</td><td>&nbsp;89</td></tr>
	<tr><td>&nbsp;Mechanical</td><td>&nbsp;49</td><td>&nbsp;113</td></tr>
	<tr><td>&nbsp;Metallurgy</td><td>&nbsp;32</td><td>&nbsp;60</td></tr>
	<tr><td>&nbsp;Mining</td><td>&nbsp;36</td><td>&nbsp;84</td></tr>
	<tr><td>&nbsp;Pharmacy</td><td>&nbsp;1</td><td>&nbsp;1</td></tr>
	<tr><td>&nbsp;<strong>TOTAL</strong></td><td>&nbsp;<strong>359</strong></td><td>&nbsp;<strong>696</strong></td></tr>
	<tr><td>&nbsp;M.Tech  &amp; M.Pharm<br></td><td>&nbsp;172</td><td>&nbsp;55<br></td></tr>
	<tr><td>&nbsp;MCA/M.Sc.</td><td>&nbsp;46</td><td>&nbsp;47</td></tr>
	<tr><td>&nbsp;<strong>GRAND  TOTAL</strong></td><td>&nbsp;<strong>531</strong></td><td>&nbsp;<strong>798</strong></td></tr>
	</tbody></table>
	<p>&nbsp;</p><strong>The Current Placement Statistics will be uploaded soon.. </strong><br>

</td>
</tr>

</tbody></table>
<span class="article_separator">&nbsp;</span></div></td><td class="side"><div class="block"><div class="moduletable">
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
</div></td></tr></tbody></table>
<div id="footer">
<a href="">Copyright ©2008</a> National Institute of Technology,Calicut - 673601 | <a href="">Disclaimer</a>
</div>							</div></div>
</body></html>
