<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-gb" xmlns="http://www.w3.org/1999/xhtml" lang="en-gb"><head>
  <title>View Student Details</title>
<style>
.mod1 {
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
<li class="item1"><a href="query.php"><span>Home</span></a></li>
<li class="parent active item56"><a href="" class="topdaddy"><span>Student</span></a>
<ul>
<li id="current" class="active item62"><a href="vwstu.php"><span>View all</span></a></li>
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
<span class="mod1"><center>Welcome
<?php
	if($_SESSION['logged']!=1)
		echo 'Guest';
	else
		echo $_SESSION['name'];
?></center></span>
<span class="breadcrumbs pathway">
<a href="query.php" class="pathway">Home</a><img src="placement/arrow.png" alt=""> <a href="" class="pathway">Student</a><img src="placement/arrow.png" alt="">View all</span>
														
<table class="contentpaneopen"><tbody><tr>
<td class="contentheading" width="100%">Students Details</td></tr>
</tbody></table>
<form action="vwstu.php" method="post">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tbody>
        
        <tr>
          	<td><strong>Order</strong></td>
          	<td><select name="platform">
		<option selected="selected" value="roll">By Roll Number</option>
		<option value="name">By Student Name</option>
		<option value="cgpa">By CGPA</option>
		<option value="cname">By Course</option>
		<option value="dname">By Department</option>
		<option value="year">By Passing Year</option>
		</select>
		<input type="submit" name="set" value="Set"></td>
        	</tr>
      	</tbody>
      	</table>
      	</form>	

<table class="contentpaneopen">
<tbody><tr>
<td colspan="2" valign="top">
<p><strong></strong></p><p>&nbsp;</p><p></p>
<table style=" height: 409px;" cellspacing="1" cellpading="1" border="1" bgcolor="white"><tbody>
	<tr><th>Roll Number</th><th> Name</th><th>Fathers name</th><th>Date of Birth</th><th>CGPA</th><th>Graduation %</th><th>10+2 %</th><th>10 %</th><th>Course</th><th>Department</th><th>Passing Year</th></tr>
<?php
	$sql=pg_query("SELECT * FROM student order by roll_no");
	if(isset($_POST['set']))
	{
		$mode=$_POST['platform'];
		if($mode=='name')
			$sql=pg_query("SELECT * FROM student order by name");
		elseif($mode=='cgpa')
			$sql=pg_query("SELECT * FROM student order by cgpa");
		elseif($mode=='cname')
			$sql=pg_query("SELECT * FROM student order by cname");
		elseif($mode=='year')
			$sql=pg_query("SELECT * FROM student order by pyear");
		else
			$sql=pg_query("SELECT * FROM student order by dname");
	}
	while($row=pg_fetch_row($sql))
	{
		echo '<tr><td><center>'.$row[0].'</td><td><center>'. $row[1].'</td><td><center>'. $row[2].'</td><td><center>'. $row[3].'</td><td><center>'. $row[4].'</td>';
		echo'<td><center>'. $row[5].'</td><td><center>'. $row[6].'</td><td><center>'. $row[7].'</td><td><center>'. $row[8].'</td><td><center>'. $row[9].'</td><td><center>'. $row[10].'</td></tr>';
	}
?>
	
	</tbody></table>
	<p>&nbsp;</p><br>

</td>
</tr>

</tbody></table>
<div id="footer">
<a href="">Copyright ©2008</a> National Institute of Technology,Calicut - 673601 | <a href="">Disclaimer</a>
</div></div></div>
</body></html>
