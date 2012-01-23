<?php
session_start();
	require("login.php");
	if($_SESSION['logged']!=1)
	{
		header ('Refresh: 1; URL=adminlogin.php');
		die("Please First log in");
	}
	$count=0;$resul='';
	$isgra=$_POST['isgra'];
	$name=isset($_POST['name'])?trim($_POST['name']):'';$warn1='';
	$fname=isset($_POST['fname'])?trim($_POST['fname']):'';$warn2='';
	$roll_no=isset($_POST['roll_no'])?trim($_POST['roll_no']):'';$warn3='';
	$dob=isset($_POST['dob'])?trim($_POST['dob']):'';$warn4='';
	$cgpa=isset($_POST['cgpa'])?trim($_POST['cgpa']):'';$warn5='';
	$per10=isset($_POST['per10'])?trim($_POST['per10']):'';$warn6='';
	$per12=isset($_POST['per12'])?trim($_POST['per12']):'';$warn7='';
	$pergr=isset($_POST['pergr'])?trim($_POST['pergr']):'';$warn8='';
	$cname=isset($_POST['cname'])?trim($_POST['cname']):'';$warn9='';
	$dname=isset($_POST['dname'])?trim($_POST['dname']):'';$warn10='';
	$year=isset($_POST['year'])?trim($_POST['year']):'';$warn='';
if (isset($_POST['submit'])) 
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
		if($roll_no==$row[0])
		{
			$warn3="Roll Number Already Exist";
			$count=1;
		}	
	}
	if($name=='')
	{
		$warn1="Enter name";
		$count=1;
	}
	if($fname=='')
	{
		$warn2="Enter father name";
		$count=1;
	}
	if($dob=='')
	{
		$warn4="Select date of Birth";
		$count=1;
	}
	if($cgpa==''||$cgpa < 4||$cgpa > 10)
	{
		$warn5="Enter CGPA between 4 an 10 ";
		$count=1;
	}	
	if($per10==''||$per10 < 55||$per10 > 100)
	{
		$warn6="Enter 10th percentage between 55 and 100 ";
		$count=1;
	}	
	if($per12==''||$per12<55||$per12>100)
	{
		$warn7="Enter 12th percentage between 55 an 100";
		$count=1;
	}	
	if($isgra=='yes'&&($pergr<55||$pergr>100))
	{
		$warn8="Enter Graduation percentage between 55 and 100";
		$count=1;
	}
	if($isgra=='yes'&&$count!=1)
	{
		$result=pg_query("insert into student values('$roll_no','$name','$fname','$dob',$cgpa,$pergr,$per12,$per10,'$cname','$dname','$year')");
	}
	elseif($count!=1)
	{
		$result=pg_query("insert into student (roll_no,name,fname,dob,CGPA,c12_per,c10_per,cname,dname,pyear) values('$roll_no','$name','$fname','$dob',$cgpa,$per12,$per10,'$cname','$dname','$year')");
	}
	if($result)
	{	
		$resul="Submit Successfull..";
	}
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-gb" xmlns="http://www.w3.org/1999/xhtml" lang="en-gb"><head>
  <title>Insert Student Details</title>
  <script language="javascript">
function hidegr(answer)
{
	if(answer=='yes')
		document.getElementById('pergra').style.display 	=	"none"
	else
		document.getElementById('pergra').style.display 	=	"block"
}
</script>
<style>
fieldset {
-moz-border-radius:4px 4px 4px 4px;
border:1px solid #DDDDDD;
margin:0 0 12px;
padding:6px 8px 5px;
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
.text_b2 {
font:bold 14px Arial, Helvetica, sans-serif !important;
}

.texts_b2 {
font:bold 11px Arial, Helvetica, sans-serif !important;
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
<li class="item1"><a href="web.php"><span>Home</span></a></li>
<li class="parent active item56"><a href="" class="topdaddy"><span>Student</span></a>
<ul>
<li id="current" class="active item62"><a href="stusub.php"><span>insert</span></a></li>
<li class="item63"><a href="updstu.php"><span>Update</span></a></li></ul></li>
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
</ul></li></li></ul></div></div>

<table class="mainbg" cellpadding="0" cellspacing="0">
<tbody><tr valign="top">
<td class="main">
<div class="mainbody">
<span class="mod1"><center>Welcome
<?php
		echo $_SESSION['name'];
?></center></span>
<span class="breadcrumbs pathway">
<a href="web.php" class="pathway">Home</a><img src="placement/arrow.png" alt=""> <a href="" class="pathway">Student</a><img src="placement/arrow.png" alt=""> Insert</span>
<table class="contentpaneopen"><tbody><tr>
<td class="contentheading" width="100%">Insert Students Details</td></tr>
<tr>
<td class="mod" width="100%"><?php echo $resul; ?></td></tr>
</tbody></table>
<form action="stusub.php" method="post">
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
          		<td><input type="text" name="roll_no" class="box4" title="Enter name" value="<?php echo $roll_no;?>"></td>
          		<td><span class="mandatory-star"><?php echo $warn3; ?></span></td>
        		</tr>
		
			<tr>
			<td class="text_b2">Name <span class="mandatory-star">*</span></td>
			<td><input type="text" name="name" class="box4" value="<?php echo $name;?>"></td>
			<td><span class="mandatory-star"><?php echo $warn1; ?></span></td>
			</tr>
			
			<tr>
          		<td class="text_b2">Father name <span class="mandatory-star">*</span></td>
          		<td><input type="text" name="fname" class="box4" value="<?php echo $fname;?>">
          		<td><span class="mandatory-star"><?php echo $warn2; ?></span></td>
        		</tr>
      
        		
       			<tr>
          		<td class="text_b2">Date of Birth <br/>(mm-dd-yyyy)<span class="mandatory-star">*</span></td>
          		<td><input type="text" name="dob" id="date" class="box4" value="<?php echo $dob;?>" readonly onclick="showCalendar('date')"></td>
          		<td><span class="mandatory-star"><?php echo $warn4; ?></span></td>
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
          	<td class="text_b2">Course name <span class="mandatory-star">*</span></td>
          	<td><select name="cname">
		<?php
		$sql=pg_query("select distinct cname from course order by cname");	
		while($row=pg_fetch_row($sql))
		if($row[0]==$cname)
			echo '<option value="'.$row[0].'" selected="selected">'.$row[0].'</option>';
		else
			echo '<option value="'.$row[0].'">'.$row[0].'</option>';
		?>
		</select></td>
          	<td><span class="mandatory-star"><?php echo $warn9; ?></span></td>
        </tr>
        
      
        <tr>
        	<td class="text_b2">Department name <span class="mandatory-star">*</span></td>
          	<td><select name="dname">
		<?php
		$sql=pg_query("select dname from dept order by dname");	
		while($row=pg_fetch_row($sql))
		if($row[0]==$dname)
			echo '<option value="'.$row[0].'" selected="selected">'.$row[0].'</option>';
		else
			echo '<option value="'.$row[0].'">'.$row[0].'</option>';
		?>
		?>
		</select></td>
          	<td><span class="mandatory-star"><?php echo $warn10; ?></span></td>
        </tr>
        
          <tr>
        	<td class="text_b2">Passing Year(yyyy) <span class="mandatory-star">*</span></td>
          	<td><select name="year">
		<?php
		for($i=1990;$i<=2013;$i++)
		if($i==$year)
			echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
		else
			echo '<option value="'.$i.'">'.$i.'</option>';
		?>
		?>
		</select></td>
        	</tr>	
        
       	<tr>
          	<td class="text_b2">CGPA <span class="mandatory-star">*</span></td>
          	<td><input type="text" name="cgpa"  class="box4" value="<?php echo $cgpa;?>"></td>
          	<td><span class="mandatory-star"><?php echo $warn5; ?></span></td>
        </tr>
        
        <tr>
          	<td class="text_b2">10 percentage <span class="mandatory-star">*</span></td>
          	<td><input type="text" name="per10" class="box4" value="<?php echo $per10;?>"></td>
          	<td><span class="mandatory-star"><?php echo $warn6; ?></span></td>
        </tr>
        
        <tr>
          	<td class="text_b2">12 percentage <span class="mandatory-star">*</span></td>
          	<td><input type="text" name="per12" class="box4" value="<?php echo $per12;?>"></td>
          	<td><span class="mandatory-star"><?php echo $warn7; ?></span></td>
        </tr>
       <tr>
          	<td colspan="2" class="text_b2">Are you in master degree?&nbsp;
            	<input type="radio" name="isgra"  checked="checked" onclick="hidegr(&#39;no&#39;)" value="yes">Yes &nbsp; 
            	<input type="radio" name="isgra" value="no" <?php if($isgra='no') echo 'checked="checked"';?> onclick="hidegr(&#39;yes&#39;)"> No </td>
      	</tr>
		  
	<tr><td colspan="2"><div id="pergra"><table><tbody>
			 
		<tr>
		<td class="text_b2">Graduation Percentage <span class="mandatory-star">*</span></td>
       		<td><input type="text" name="pergr" class="box4" value="<?php echo $pergr;?>"></td><td><span class="mandatory-star"><?php echo $warn8; ?></span></td>
        	</tr>
	 
	</tbody></table></div></td></tr>
	
	
      
      	</tbody>
      	</table>
      
      </fieldset><td width="10%"></td></tr></tbody></table>
	
	<table width="100%" border="0" cellspacing="3" cellpadding="2"><tbody>
	<tr>
  		<td colspan="3" align="center"><input type="submit" name="submit" value="Submit" ></td>
  	</tr>
	</tbody></table>
	
	</form>	
<table class="contentpaneopen">
<tbody><tr>
<td colspan="2" valign="top">
<p><strong></strong></p><p>&nbsp;</p><p></p>

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
