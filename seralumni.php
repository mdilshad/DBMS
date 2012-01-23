<?php
session_start();
	$name=isset($_POST['name'])?trim($_POST['name']):'';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-gb" xmlns="http://www.w3.org/1999/xhtml" lang="en-gb"><head>


  <title>Search Placed Student Details</title>
<style>
 .mod {
color:red;
font-weight:bold;
font-size:18px;
}
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

<meta http-equiv="content-type" content="text/html; charset=UTF-8"></head><body id="page_bg" class="b-medium p-red bd-beige">

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
<li class="parent item56"><a href="" class="topdaddy"><span>Student</span></a>
<ul>
<li class="item62"><a href="vwstu.php"><span>View all</span></a></li>
<li class="item63"><a href="serstu.php"><span>Search</span></a></li></ul></li>
<li class="parent active item56"><a href="" class="topdaddy"><span>Placed Student</span></a>
<ul>
<li class="item64"><a href="vwalumni.php"><span>View all</span></a></li>
<li id="current" class="active item65"><a href="seralumni.php"><span>Search</span></a></li></ul></li>
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
<a href="query.php" class="pathway">Home</a><img src="placement/arrow.png" alt=""> <a href="" class="pathway">Placed Student</a><img src="placement/arrow.png" alt=""> Search </span>
														
<table class="contentpaneopen"><tbody><tr>
<td class="contentheading" width="100%">Placed Student Search</td></tr>
</tbody></table>
<form action="seralumni.php" method="post">
<table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tbody>
        
        <tr>
          	<td><input type="text" name="name"  value="<?php echo $name; ?>"></td>
          	<td><select name="platform">
		<option selected="selected" value="name">By Student Name</option>
		<option value="cname">By Company Name</option>
		<option value="cgpa">By > CGPA</option>
		<option value="course">By Course</option>
		<option value="dname">By Department</option>
		<option value="package">By > Package</option>
		<option value="year">By Year</option>
		</select></td>
		<td><input type="submit" name="search" value="Search"></td>
        	</tr>
      	</tbody>
      	</table>
      	</form>		
<table class="contentpaneopen">
<tbody><tr>
<td colspan="2" valign="top">
<p><strong></strong></p><p>&nbsp;</p><p></p>

<table  style="width: 820px;" cellspacing="12" cellpading="10" border="1"><tbody>
	<?php
		$con=pg_connect("host=localhost port=5432 dbname=placement user=dilshad password=a") or die("could not connect");
	if(isset($_POST['search']))
	{
		$mode=$_POST['platform'];
		if($mode=='name')
		{	
			$len=strlen($name);
			$sql=pg_query("SELECT student.name FROM student, alumni where student.roll_no=alumni.roll_no ");
			while($row=pg_fetch_row($sql))
				if(!strncasecmp($name,$row[0],$len))
					$flag=1;
			if($flag==1)		
			{
				$sql=pg_query("SELECT student.name, student.dob, student.cgpa, student.cname, student.dname, company.name, company.speci, alumni.package, student.pyear FROM student, company, alumni where student.roll_no=alumni.roll_no and company.reg_no=alumni.reg_no");
				echo'<tr><th>Student Name</th><th>Date of Birth</th><th>CGPA</th><th>Course Name</th><th>Department</th><th>Company name</th><th>Specification</th><th>Package</th><th>Year</th></tr>';
				while($row=pg_fetch_row($sql))
				if(!strncasecmp($name,$row[0],$len))
				{	
					echo '<tr><td>'.$row[0].'</td><td>'. $row[1].'</td><td>'. $row[2].'</td><td>'. $row[3].'</td><td>'. $row[4].'</td>';
					echo'<td>'. $row[5].'</td><td>'. $row[6].'</td><td>'. $row[7].'</td><td>'. $row[8].'</td></tr>';
				}
			}
			else
		    	echo '<div class="mod">No result Found</div>';
		}
		if($mode=='cname')
		{
			$len=strlen($name);
			$sql=pg_query("SELECT company.name FROM company, alumni where company.reg_no=alumni.reg_no");
			while($row=pg_fetch_row($sql))
				if(!strncasecmp($name,$row[0],$len))
					$flag=1;
			if($flag==1)		
			{
				$sql=pg_query("SELECT student.name, student.dob, student.cgpa, student.cname, student.dname, company.name, company.speci, alumni.package, student.pyear FROM student, company, alumni where student.roll_no=alumni.roll_no and company.reg_no=alumni.reg_no");
				echo'<tr><th>Student Name</th><th>Date of Birth</th><th>CGPA</th><th>Course Name</th><th>Department</th><th>Company name</th><th>Specification</th><th>Package</th><th>Year</th></tr>';
				while($row=pg_fetch_row($sql))
				if(!strncasecmp($name,$row[5],$len))
				{	
					echo '<tr><td>'.$row[0].'</td><td>'. $row[1].'</td><td>'. $row[2].'</td><td>'. $row[3].'</td><td>'. $row[4].'</td>';
					echo'<td>'. $row[5].'</td><td>'. $row[6].'</td><td>'. $row[7].'</td><td>'. $row[8].'</td></tr>';
				}
			}
			else
		    	echo '<div class="mod">No result Found</div>';
		}
		if($mode=='cgpa')
		{
			$sql=pg_query("SELECT student.name, student.dob, student.cgpa, student.cname, student.dname, company.name, company.speci, alumni.package, student.pyear FROM student, company, alumni where student.roll_no=alumni.roll_no and company.reg_no=alumni.reg_no and student.cgpa>=$name");
			$row=pg_fetch_array($sql);
			if($row[0])		
			{
				echo'<tr><th>Student Name</th><th>Date of Birth</th><th>CGPA</th><th>Course Name</th><th>Department</th><th>Company name</th><th>Specification</th><th>Package</th><th>Year</th></tr>';
				do
				{	
					echo '<tr><td>'.$row[0].'</td><td>'. $row[1].'</td><td>'. $row[2].'</td><td>'. $row[3].'</td><td>'. $row[4].'</td>';
					echo'<td>'. $row[5].'</td><td>'. $row[6].'</td><td>'. $row[7].'</td><td>'. $row[8].'</td></tr>';
				}while($row=pg_fetch_row($sql));
			}
			else
		    	echo '<div class="mod">No result Found</div>';
		}
		if($mode=='course')
		{
			$len=strlen($name);
			$sql=pg_query("SELECT student.cname FROM student, alumni where student.roll_no=alumni.roll_no ");
			while($row=pg_fetch_row($sql))
				if(!strncasecmp($name,$row[0],$len))
					$flag=1;
			if($flag==1)		
			{
				$sql=pg_query("SELECT student.name, student.dob, student.cgpa, student.cname, student.dname, company.name, company.speci, alumni.package, student.pyear FROM student, company, alumni where student.roll_no=alumni.roll_no and company.reg_no=alumni.reg_no");
				echo'<tr><th>Student Name</th><th>Date of Birth</th><th>CGPA</th><th>Course Name</th><th>Department</th><th>Company name</th><th>Specification</th><th>Package</th><th>Year</th></tr>';
				while($row=pg_fetch_row($sql))
				if(!strncasecmp($name,$row[3],$len))
				{	
					echo '<tr><td>'.$row[0].'</td><td>'. $row[1].'</td><td>'. $row[2].'</td><td>'. $row[3].'</td><td>'. $row[4].'</td>';
					echo'<td>'. $row[5].'</td><td>'. $row[6].'</td><td>'. $row[7].'</td><td>'. $row[8].'</td></tr>';
				}
			}
			else
		    	echo '<div class="mod">No result Found</div>';
		}
		if($mode=='dname')
		{
			$len=strlen($name);
			$sql=pg_query("SELECT student.dname FROM student, alumni where student.roll_no=alumni.roll_no ");
			while($row=pg_fetch_row($sql))
				if(!strncasecmp($name,$row[0],$len))
					$flag=1;
			if($flag==1)		
			{
				$sql=pg_query("SELECT student.name, student.dob, student.cgpa, student.cname, student.dname, company.name, company.speci, alumni.package, student.pyear FROM student, company, alumni where student.roll_no=alumni.roll_no and company.reg_no=alumni.reg_no");
				echo'<tr><th>Student Name</th><th>Date of Birth</th><th>CGPA</th><th>Course Name</th><th>Department</th><th>Company name</th><th>Specification</th><th>Package</th><th>Year</th></tr>';
				while($row=pg_fetch_row($sql))
				if(!strncasecmp($name,$row[4],$len))
				{	
					echo '<tr><td>'.$row[0].'</td><td>'. $row[1].'</td><td>'. $row[2].'</td><td>'. $row[3].'</td><td>'. $row[4].'</td>';
					echo'<td>'. $row[5].'</td><td>'. $row[6].'</td><td>'. $row[7].'</td><td>'. $row[8].'</td></tr>';
				}
			}
			else
		    	echo '<div class="mod">No result Found</div>';
		}
		if($mode=='package')
		{
			$sql=pg_query("SELECT student.name, student.dob, student.cgpa, student.cname, student.dname, company.name, company.speci, alumni.package, student.pyear FROM student, company, alumni where student.roll_no=alumni.roll_no and company.reg_no=alumni.reg_no and alumni.package>=$name");
			$row=pg_fetch_array($sql);
			if($row[0])		
			{
				echo'<tr><th>Student Name</th><th>Date of Birth</th><th>CGPA</th><th>Course Name</th><th>Department</th><th>Company name</th><th>Specification</th><th>Package</th><th>Year</th></tr>';
				do
				{	
					echo '<tr><td>'.$row[0].'</td><td>'. $row[1].'</td><td>'. $row[2].'</td><td>'. $row[3].'</td><td>'. $row[4].'</td>';
					echo'<td>'. $row[5].'</td><td>'. $row[6].'</td><td>'. $row[7].'</td><td>'. $row[8].'</td></tr>';
				}while($row=pg_fetch_row($sql));
			}
			else
		    	echo '<div class="mod">No result Found</div>';
		}
		if($mode=='year')
		{
			$sql=pg_query("SELECT student.name, student.dob, student.cgpa, student.cname, student.dname, company.name, company.speci, alumni.package, student.pyear FROM student, company, alumni where student.roll_no=alumni.roll_no and company.reg_no=alumni.reg_no and student.pyear='$name'");
			$row=pg_fetch_array($sql);
			if($row[0])		
			{
				echo'<tr><th>Student Name</th><th>Date of Birth</th><th>CGPA</th><th>Course Name</th><th>Department</th><th>Company name</th><th>Specification</th><th>Package</th><th>Year</th></tr>';
				do
				{	
					echo '<tr><td>'.$row[0].'</td><td>'. $row[1].'</td><td>'. $row[2].'</td><td>'. $row[3].'</td><td>'. $row[4].'</td>';
					echo'<td>'. $row[5].'</td><td>'. $row[6].'</td><td>'. $row[7].'</td><td>'. $row[8].'</td></tr>';
				}while($row=pg_fetch_row($sql));
			}
			else
		    	echo '<div class="mod">No result Found</div>';
		}
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
