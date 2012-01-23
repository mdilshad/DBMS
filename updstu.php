<?php
session_start();
	require("login.php");
	if($_SESSION['logged']!=1)
	{
		header ('Refresh: 1; URL=adminlogin.php');
		die("Please First log in");
	}
	$count=0;$resul='';
	$name=isset($_POST['name'])?trim($_POST['name']):'';$warn1='';
	$fname=isset($_POST['fname'])?trim($_POST['fname']):'';$warn2='';
	$roll_no=isset($_POST['roll_no'])?trim($_POST['roll_no']):'';$warn3='';
	$dob=isset($_POST['dob'])?trim($_POST['dob']):'';$warn11='';
	$cgpa=isset($_POST['cgpa'])?trim($_POST['cgpa']):'';$warn5='';$warn12='';
	$per10=isset($_POST['per10'])?trim($_POST['per10']):'';$warn6='';$warn13='';
	$per12=isset($_POST['per12'])?trim($_POST['per12']):'';$warn7='';$warn14='';
	$pergr=isset($_POST['pergr'])?trim($_POST['pergr']):'';$warn8='';$warn15='';
	$year=isset($_POST['year'])?trim($_POST['year']):'';$warn16='';$warn17='';
	$cname=isset($_POST['cname'])?trim($_POST['cname']):'';$warn9='';
	$dname=isset($_POST['dname'])?trim($_POST['dname']):'';$warn10='';
if (isset($_POST['update'])) 
{
	if($roll_no=='')
	{
		$warn3="Enter roll number";
		$count=1;
	}
	else
	{
		$query=pg_query("SELECT roll_no FROM student where roll_no='$roll_no'");
		$row=pg_fetch_array($query);
		if($roll_no!=$row[0])
		{
			$warn3="Roll Number not Exist";
			$count=1;
		}
	}
	if($name!=''&&$count==0)
	{
		$query=pg_query("SELECT name FROM student where roll_no='$roll_no'");
		$row=pg_fetch_array($query);
		if($row[0]!=$name)
		{
			$result=pg_query("update student set name='$name' where roll_no='$roll_no'");
			if($result)
			{	
				$warn1="Update Successfull..";$name='';
			}
		}	
	}	
	if($fname!=''&&$count==0)
	{
		$query=pg_query("SELECT fname FROM student where roll_no='$roll_no'");
		$row=pg_fetch_array($query);
		if($row[0]!=$fname)
		{
			$result=pg_query("update student set fname='$fname' where roll_no='$roll_no'");
			if($result)
			{	
				$warn2="Update Successfull..";$fname='';
			}
		}
	}
	if($dob!=''&&$count==0)
	{
			$result=pg_query("update student set dob='$dob' where roll_no='$roll_no'");
			if($result)
			{	
				$warn11="Update Successfull..";$dob='';
			}
	}	
	if($cgpa!=''&&$count==0)
	{
		if($cgpa < 4||$cgpa > 10)
			$warn5="Enter CGPA between 4 and 10 ";
		else
		{
			$result=pg_query("update student set cgpa=$cgpa where roll_no='$roll_no'");
			if($result)
			{	
				$warn12="Update Successfull..";$cgpa='';
			}
		}
	}	
	if($per10!=''&&$count==0)
	{
		if($per10 < 55||$per10 > 100)
			$warn6="Enter 10th percentage between 55 and 100  ";
		else
		{
			$result=pg_query("update student set c10_per=$per10 where roll_no='$roll_no'");
			if($result)
			{	
				$warn13="Update Successfull..";$per10='';
			}
		}
	}	
	if($per12!=''&&$count==0)
	{
		if($per12 < 55||$per12 > 100)
			$warn7="Enter 12th percentage between 55 and 100  ";
		else
		{
			$result=pg_query("update student set c12_per=$per12 where roll_no='$roll_no'");
			if($result)
			{	
				$warn14="Update Successfull..";$per12='';
			}
		}
	}	
	if($pergr!=''&&$count==0)
	{
		if($pergr < 55||$pergr > 100)
			$warn8="Enter Graduation percentage between 55 and 100";
		else
		{
			$result=pg_query("update student set grdn_per=$pergr where roll_no='$roll_no'");
			if($result)
			{	
				$warn15="Update Successfull..";$pergr='';
			}
		}
	}	
	if($year!=''&&$count==0)
	{
		if(strlen($year)<4)
			$warn16="Enter year Numeric (yyyy)";
		else
		{
			$result=pg_query("update student set pyear='$year' where roll_no='$roll_no'");
			if($result)
			{	
				$warn17="Update Successfull..";$cname='';
			}	
		}
	}
	if($cname!=''&&$count==0)
	{
			$result=pg_query("update student set cname='$cname' where roll_no='$roll_no'");
			if($result)
			{	
				$warn9="Update Successfull..";$cname='';
			}	
	}	
	if($dname!=''&&$count==0)
	{
			$result=pg_query("update student set dname='$dname' where roll_no='$roll_no'");
			if($result)
			{	
				$warn10="Update Successfull..";$dname='';
			}
	}
}
if (isset($_POST['delete'])) 
{
	if($roll_no=='')
	{
		$warn3="Enter Roll number";
		$count=1;
	}
	if($roll_no!='')
	{
		$query=pg_query("SELECT roll_no FROM student where roll_no='$roll_no'");
		$row=pg_fetch_array($query);
		if($roll_no!=$row[0])
		{
			$warn3="Roll Number not Exist";
			$count=1;
		}
		$query=pg_query("SELECT roll_no FROM alumni where roll_no='$roll_no'");
		$row=pg_fetch_array($query);
		if($roll_no==$row[0])
		{
			$warn3="Roll Number is Associated with Alumni";
			$count=1;
		}
	}		
	if($count==0)
		$result=pg_query("delete from student where roll_no='$roll_no'");
	if($result)
	{	
		$resul="Delete Successfull..";
	}
}
if (isset($_POST['check'])) 
{
	if($roll_no=='')
	{
		$warn3="Enter Roll number";
		$count=1;
	}
	else
	{
		$query=pg_query("SELECT * FROM student where roll_no='$roll_no'");
		$row=pg_fetch_array($query);
		if($roll_no!=$row[0])
		{
			$warn3="Roll Number not Exist";
			$name='';
			$fname='';
		}
		else
		{
			$name=$row[1];
			$fname=$row[2];
			$dob=$row[3];
		}
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-gb" xmlns="http://www.w3.org/1999/xhtml" lang="en-gb"><head>
  <title>Update Student Details</title>
 
<style>
fieldset {
-moz-border-radius:4px 4px 4px 4px;
border:1px solid #DDDDDD;
margin:0 0 12px;
padding:6px 8px 5px;
}
legend {
color:red;
font-weight:bold;
font-size:14px;
}
.mod {
color:green;
font-weight:bold;
font-size:14px;
}
.mod1 {
color:#1B5D89;
font-weight:bold;
font-size:14px;
}
.mandatory-star {
color:#FF0000  !important;
}
.star {
color:green  !important;
}
.text_b2 {
font:bold 14px Arial, Helvetica, sans-serif !important;
}

.texts_b2 {
font:bold 11px Arial, Helvetica, sans-serif !important;
}

.box2 {
width:110px;
font:12px Arial, Helvetica, sans-serif !important;
}
.box4 {
width:170px;
font:12px Arial, Helvetica, sans-serif !important;
}
</style>  

<link rel="stylesheet" href="placement/system.css" type="text/css">
<link rel="stylesheet" href="placement/general.css" type="text/css">
<link href="placement/template.css" rel="stylesheet" type="text/css">
<link href="placement/suckerfish.css" rel="stylesheet" type="text/css">
<link href="placement/body_beige.css" rel="stylesheet" type="text/css">
<link href="placement/primary_red.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="placement/ezcalendar.js"></script>
<link rel="stylesheet" type="text/css" href="placement/ezcalendar.css" />
<link href="placement/rokzoom.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="placement/rokzoom.js"></script>

<script type="text/javascript" src="placement/rt_sameheight.js"></script>
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
<li class="item75"><a href="Welcome.php"><span>TP Home</span></a></li>
<li class="item1"><a href="web.php"><span>Home</span></a></li>
<li class="parent active item56"><a href="" class="topdaddy"><span>Student</span></a>
<ul>
<li class="item62"><a href="stusub.php"><span>insert</span></a></li>
<li id="curent" class="active item63"><a href="updstu.php"><span>Update</span></a></li></ul></li>
<li class="parent item56"><a href="" class="topdaddy"><span>Placed Student</span></a>
<ul>
<li class="item64"><a href="subalumni.php"><span>insert</span></a></li>
<li class="item65"><a href="updalumni.php"><span>Update</span></a></li></ul></li>
<li class="parent item66"><a href="" class="topdaddy"><span>Course</span></a>
<ul>
<li class="item67"><a href="subcors.php"><span>insert</span></a></li>
<li class="item68"><a href="updcors.php"><span>Update</span></a></li></ul></li>
<li class="parent item69"><a href="" class="topdaddy"><span>Department</span></a>
<ul>
<li class="item70"><a href="subdept.php"><span>insert</span></a></li>
<li class="item71"><a href="upddept.php"><span>Update</span></a></li></ul></li>
<li class="parent item72"><a href="" class="topdaddy"><span>Company</span></a>
<ul>
<li class="item73"><a href="subcom.php"><span>insert</span></a></li>
<li class="item74"><a href="updcom.php"><span>Update</span></a></li></ul></li>
<li class="parent item21"><a href="" class="topdaddy"><span><?php echo $_SESSION['name'];?></span></a>
<ul>
<li class="item22"><a href="changepass.php"><span>Change Password</span></a></li>
<li class="item22"><a href="upddetail.php"><span>Update detail</span></a></li>
<?php
	if($_SESSION['log']=='admin')
	{
		echo '<li class="item23"><a href="createuser.php"><span>Create User</span></a></li>';
		echo '<li class="item23"><a href="upduser.php"><span>Update User</span></a></li>';
	}
?>
<li class="item75"><a href="logout.php"><span>Admin Logout</span></a></li>
</ul></li></ul></div></div>

<table class="mainbg" cellpadding="0" cellspacing="0">
<tbody><tr valign="top">
<td class="main">
<div class="mainbody">
<span class="mod1"><center>Welcome
<?php
	echo $_SESSION['name'];
?></center></span>
<span class="breadcrumbs pathway">
<a href="web.php" class="pathway">Home</a><img src="placement/arrow.png" alt=""> <a href="" class="pathway">Student</a><img src="placement/arrow.png" alt=""> Update</span>
<table class="contentpaneopen"><tbody><tr>
<td class="contentheading" width="100%">Update Students Details</td></tr>
<tr>
<td class="mod" width="100%"><?php echo $resul; ?></td></tr>
</tbody></table>
<form action="updstu.php" method="post">
	<table width="100%" border="0" cellspacing="3" cellpadding="2">
		<tbody>
			<tr><td colspan="3"><div class="mandatory-star" style="padding:0 0 0 10px;"></div></td></tr>
 
			<tr valign="top"><tr><td width="10%"></td>
			<td width="80%">
	<fieldset>
	
		<legend>Personal Details</legend>
      
	<table width="100%" border="0" cellspacing="3" cellpadding="2">
		<tbody>
			<tr>
          		<td class="text_b2">Roll number <span class="mandatory-star">*</span></td>
          		<td><input type="text" name="roll_no" class="box4" value="<?php echo $roll_no?>"></td>
          		<td><span class="mandatory-star"><?php echo $warn3; ?></span></td>
        		</tr>
        		
        		<tr>
  			<td colspan="3" align="center"><input type="submit" name="check" value="Check" ></td>
  			</tr>
  			
			<tr>
			<td class="text_b2">Name </td>
			<td><input type="text" name="name" class="box4" value="<?php echo $name?>"></td>
			<td><span class="star"><?php echo $warn1; ?></span></td>
			</tr>
			
			<tr>
          		<td class="text_b2">Father name </td>
          		<td><input type="text" name="fname" class="box4" value="<?php echo $fname?>">
          		<td><span class="star"><?php echo $warn2; ?></span></td>
        		</tr>
        		
       
       			<tr>
          		<td class="text_b2">Date of Birth </td>
          		<td><input type="text" name="dob" id="date" class="box4" value="<?php echo $dob?>" readonly onclick="showCalendar('date')"></td>
          		<td><span class="star"><?php echo $warn11; ?></span></td>
        		</tr>
		
		</tbody>
	</table>
      </fieldset><td width="10%"></td></tr></tbody></table>
      <table width="100%" border="0" cellspacing="3" cellpadding="2">
		<tbody>
		<tr><td colspan="3"><div class="mandatory-star" style="padding:0 0 0 10px;"></div></td></tr>
 
			<tr valign="top"><tr><td width="10%"></td>
     
    	<td width="80%"><fieldset>
      
      	<legend>Education Details</legend>		
      	
      	<table width="100%" border="0" cellspacing="3" cellpadding="2">
        <tbody>
        
	
	
	<tr>
          	<td class="text_b2">Course name </td>
          	<td><select name="cname">
          	<option value="">Select</option>
		<?php
		$sql=pg_query("select distinct cname from course order by cname");	
		while($row=pg_fetch_row($sql))
		if($row[0]==$cname)
			echo '<option value="'.$row[0].'" selected="selected">'.$row[0].'</option>';
		else
			echo '<option value="'.$row[0].'">'.$row[0].'</option>';
		?>
		</select></td>
          	<td><span class="star"><?php echo $warn9; ?></span></td>
        </tr>
       
      
        <tr>
        	<td class="text_b2">Department name </td>
          	<td><select name="dname">
          	<option value="">Select</option>
		<?php
		$sql=pg_query("select dname from dept order by dname");	
		while($row=pg_fetch_row($sql))
		if($row[0]==$dname)
			echo '<option value="'.$row[0].'" selected="selected">'.$row[0].'</option>';
		else
			echo '<option value="'.$row[0].'">'.$row[0].'</option>';
		?>
		</select></td>
          	<td><span class="star"><?php echo $warn10; ?></span></td>
        </tr>
        
         
        <tr>
        	<td class="text_b2">Year </td>
          	<td><select name="year">
          	<option value="" selected="selected">Select</option>
		<?php
		for($i=1990;$i<=2013;$i++)
		if($i==$year)
			echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
		else
			echo '<option value="'.$i.'">'.$i.'</option>';
		?>
		?>
		</select></td>
          	<td><span class="star"><?php echo $warn17; ?></span><span class="mandatory-star"><?php echo $warn16; ?></span></td>
        	</tr>	

       	<tr>
        
      <tr>
          	<td class="text_b2">CGPA </td>
          	<td><input type="text" name="cgpa"  class="box2" value="<?php echo $cgpa?>"></td>
          	<td><span class="mandatory-star"><?php echo $warn5; ?></span><span class="star"><?php echo $warn12; ?></span></td>
        </tr>
        
        <tr>
          	<td class="text_b2">10 percentage </td>
          	<td><input type="text" name="per10" class="box2" value="<?php echo $per10?>"></td>
          	<td><span class="mandatory-star"><?php echo $warn6; ?></span><span class="star"><?php echo $warn13; ?></span></td>
        </tr>
        
        <tr>
          	<td class="text_b2">12 percentage </td>
          	<td><input type="text" name="per12" class="box2" value="<?php echo $per12?>"></td>
          	<td><span class="mandatory-star"><?php echo $warn7; ?></span><span class="star"><?php echo $warn14; ?></span></td>
        </tr>
       
	<tr>
		<td class="text_b2">Graduation Percentage </td>
       		<td><input type="text" name="pergr" class="box2" value="<?php echo $pergr?>"></td>
       		<td><span class="mandatory-star"><?php echo $warn8; ?></span><span class="star"><?php echo $warn15; ?></span></td>
        	</tr>
	 

      
      	</tbody>
      	</table>
      
      </fieldset><td width="10%"></td></tr></tbody></table>
	
	<table width="100%" border="0" cellspacing="3" cellpadding="2"><tbody>
	<tr>
  		<td colspan="3" align="center"><input type="submit" name="delete" value="Delete" ><input type="submit" name="update" value="Update" ></td>
  	</tr>
	</tbody></table>
	
	</form>	
<table class="contentpaneopen">
<tbody><tr>
<td colspan="2" valign="top">
<p>
<strong></strong></p>
<p>&nbsp;</p>

<p></p>

<table style="width: 820px;" cellspacing="12" cellpading="12" border="1"><tbody>
	
	</tbody></table>
	<p>&nbsp;</p><br>

</td>
</tr>

</tbody></table>
<div id="footer">
<a href="">Copyright ©2008</a> National Institute of Technology,Calicut - 673601 | <a href="">Disclaimer</a>
</div></div></div>
</body></html>
