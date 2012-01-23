<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-gb" xmlns="http://www.w3.org/1999/xhtml" lang="en-gb"><head>

  <title>View Placed Student Details</title>
<style>
.mod1 {
color:#1B5D89;
font-weight:bold;
font-size:14px;
}
</style>
<script type="text/javascript">
 
function toggle1()
{
	toggle4();
	toggle6();
	toggle8();
	var ele = document.getElementById("course");
    		ele.style.display = "block";	
} 
function toggle2() 
{
	var ele = document.getElementById("course");
    		ele.style.display = "none";		
} 
function toggle3()
{
	toggle2();
	toggle6();
	toggle8();
	var ele1 = document.getElementById("dept");
    	ele1.style.display = "block";
}
function toggle4()
{
	var ele1 = document.getElementById("dept");
    		ele1.style.display = "none";
}
function toggle5() 
{
	toggle4();
	toggle2();
	toggle8();
	var ele = document.getElementById("com");
	ele.style.display = "block";		
} 
function toggle6() 
{
	var ele1 = document.getElementById("com");
	ele1.style.display = "none";
}
function toggle7() 
{
	toggle4();
	toggle2();
	toggle6();
	var ele = document.getElementById("year");
	ele.style.display = "block";		
} 
function toggle8() 
{
	var ele1 = document.getElementById("year");
	ele1.style.display = "none";
}
</script>
<link rel="stylesheet" href="placement/system.css" type="text/css">
<link rel="stylesheet" href="placement/general.css" type="text/css">
<link rel="stylesheet" href="placement/test.css" type="text/css">
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
<li class="parent item56"><a href="" class="topdaddy"><span>Student</span></a>
<ul>
<li class="item62"><a href="vwstu.php"><span>View all</span></a></li>
<li class="item63"><a href="serstu.php"><span>Search</span></a></li></ul></li>
<li class="parent active item56"><a href="" class="topdaddy"><span>Placed Student</span></a>
<ul>
<li id="current" class="active item64"><a href="vwalumni.php"><span>View all</span></a></li>
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
<a href="query.php" class="pathway">Home</a><img src="placement/arrow.png" alt=""> <a href="" class="pathway">Placed Student</a><img src="placement/arrow.png" alt="">View all</span>
														
<table class="contentpaneopen"><tbody><tr>
<td class="contentheading" width="100%">Placed Student Details</td></tr>
</tbody></table>
<form action="vwalumni.php" method="post">
<table width="40%" border="0" cellspacing="2" cellpadding="2">
        <tbody>
        
        <tr>
          	<td><strong>Order</strong></td>
          	<td><select name="platform">
		<option <?php if($_POST['platform']=='name')echo 'selected="selected"';?> value="name">By Student Name</a></option>
		<option value="cname"<?php if($_POST['platform']=='cname')echo 'selected="selected"';?> onclick="toggle5();" >By Company Name</option>
		<option value="cgpa"<?php if($_POST['platform']=='cgpa')echo 'selected="selected"';?>>By CGPA</option>
		<option value="course"<?php if($_POST['platform']=='course')echo 'selected="selected"';?> onclick="toggle1();" >By Course</option>
		<option value="dname"<?php if($_POST['platform']=='dname')echo 'selected="selected"';?> onclick="toggle3();" >By Department</option>
		<option value="package"<?php if($_POST['platform']=='package')echo 'selected="selected"';?>>By Package</option>
		<option value="year"<?php if($_POST['platform']=='year')echo 'selected="selected"';?> onclick="toggle7();" >By Year</option>
		</select>
		<div id="course" style="display : none">
		<select name="cname">
		<?php
		$sql=pg_query("select cname from course order by cname");	
		while($row=pg_fetch_row($sql))
			echo '<option value="'.$row[0].'">'.$row[0].'</option>';
		?>
		</select>
		</div>
		<div id="dept" style="display : none">
		<select name="dname">
		<?php
		$sql=pg_query("select dname from dept order by dname");	
		while($row=pg_fetch_row($sql))
			echo '<option value="'.$row[0].'">'.$row[0].'</option>';
		?>
		</select>
		</div>
		<div id="com" style="display : none">
		<select name="name">
		<?php
		$sql=pg_query("select distinct name from company order by name");	
		while($row=pg_fetch_row($sql))
			echo '<option value="'.$row[0].'">'.$row[0].'</option>';
		?>
		</select>
		</div>
		<div id="year" style="display : none">
		<select name="year">
		<?php
		$sql=pg_query("select distinct pyear from student order by pyear");	
		while($row=pg_fetch_row($sql))
			echo '<option value="'.$row[0].'">'.$row[0].'</option>';
		?>
		</select>
		</div>
		</td>
		<td><input type="submit" name="set" value="Set"></td>
        	</tr>
      	</tbody>
      	</table>
      	</form>		
<table class="contentpaneopen">
<tbody><tr>
<td colspan="2" valign="top">
<p><strong></strong></p><p>&nbsp;</p><p></p>

<table  style="width: 820px;" cellspacing="1" cellpading="1" border="1"><tbody>
<tr><th>Student Name</th><th>Date of Birth</th><th>CGPA</th><th>Course Name</th><th>Department</th><th>Company name</th><th>Specification</th><th>Package</th><th>Year</th></tr>
<?php
	
			$sql=pg_query("SELECT student.name, student.dob, student.cgpa, student.cname, student.dname, company.name, company.speci, alumni.package, student.pyear FROM student, company, alumni where student.roll_no=alumni.roll_no and company.reg_no=alumni.reg_no");
	if(isset($_POST['set']))
	{
		$mode=$_POST['platform'];
		if($mode=='name')
		{	
			$sql=pg_query("SELECT student.name, student.dob, student.cgpa, student.cname, student.dname, company.name, company.speci, alumni.package, student.pyear FROM student, company, alumni where student.roll_no=alumni.roll_no and company.reg_no=alumni.reg_no order by student.name");
		}
		if($mode=='cname')
		{	
			$name=$_POST['name'];
			echo '<marquee class="contentheading" width="100%">Placement for Company '.$name.'</marquee>';
			$sql=pg_query("SELECT student.name, student.dob, student.cgpa, student.cname, student.dname, company.name, company.speci, alumni.package, student.pyear FROM student, company, alumni where student.roll_no=alumni.roll_no and company.reg_no=alumni.reg_no and company.name='$name' order by company.name");
		}
		if($mode=='cgpa')
		{	
			$sql=pg_query("SELECT student.name, student.dob, student.cgpa, student.cname, student.dname, company.name, company.speci, alumni.package, student.pyear FROM student, company, alumni where student.roll_no=alumni.roll_no and company.reg_no=alumni.reg_no order by student.cgpa");
		}
		if($mode=='course')
		{	
			$name=$_POST['cname'];
			echo '<marquee class="contentheading" width="100%">Placement for Course '.$name.'</marquee>';
			$sql=pg_query("SELECT student.name, student.dob, student.cgpa, student.cname, student.dname, company.name, company.speci, alumni.package, student.pyear FROM student, company, alumni where student.roll_no=alumni.roll_no and company.reg_no=alumni.reg_no and student.cname='$name' order by student.cname");
		}
		if($mode=='dname')
		{	
			$name=$_POST['dname'];
			echo '<marquee class="contentheading" width="100%">Placement for Department '.$name.'</marquee>';
			$sql=pg_query("SELECT student.name, student.dob, student.cgpa, student.cname, student.dname, company.name, company.speci, alumni.package, student.pyear FROM student, company, alumni where student.roll_no=alumni.roll_no and company.reg_no=alumni.reg_no and student.dname='$name' order by student.dname");
		}
		if($mode=='package')
		{	
			$sql=pg_query("SELECT student.name, student.dob, student.cgpa, student.cname, student.dname, company.name, company.speci, alumni.package, student.pyear FROM student, company, alumni where student.roll_no=alumni.roll_no and company.reg_no=alumni.reg_no order by alumni.package");
		}
		if($mode=='year')
		{	
			$name=$_POST['year'];
			echo '<marquee class="contentheading" width="100%">Placement for Year'.$name.'</marquee>';
			$sql=pg_query("SELECT student.name, student.dob, student.cgpa, student.cname, student.dname, company.name, company.speci, alumni.package, student.pyear FROM student, company, alumni where student.roll_no=alumni.roll_no and company.reg_no=alumni.reg_no and student.pyear='$name' order by student.pyear");
		}
	}
	while($row=pg_fetch_row($sql))
	{
		echo '<tr><td><center>'. $row[0].'</td><td><center>'. $row[1].'</td><td><center>'. $row[2].'</td><td><center>'. $row[3].'</td><td><center>'. $row[4].'</td><td><center>'. $row[5].'</td>';
		echo'<td><center>'. $row[6].'</td><td><center>'. $row[7].'</td><td><center>'. $row[8].'</td></tr>';
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
