<?php
	$logid=isset($_POST['logid'])?trim($_POST['logid']):'';$warn1='';
	$password=isset($_POST['password'])?$_POST['password']:'';$warn2='';
	$t=0;
	$con = pg_connect("host=localhost dbname=dilshad user=dilshad") or die("could not cannect");
if (isset($_POST['submit'])) 
{
		if($logid=='')
		{
			$warn1="Enter User Name ";
			$warn2="Enter password";
			$t=1;
		}
		if($password=='')
		{
			$warn2="Enter password";
			$t=1;
		}
		if($t!=1)
		{
			$result=pg_query("SELECT password,username FROM admin where username='$logid'");
			$row=pg_fetch_row($result);
			if($row[0]=='')
				$warn1="Invalid Username ";
			elseif($row[0]==$password)
			{
				header ('Refresh: 0; URL=bus.php');
			}
			else
				$warn2="invalid  password";
		}
	
}
if (isset($_POST['register'])) 
{
	header("location:register.php");
}
if (isset($_POST['reset'])) 
{
	$logid='';
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-gb" xmlns="http://www.w3.org/1999/xhtml" lang="en-gb"><head>

<style>
.box4 {
width:170px;
font:12px Arial, Helvetica, sans-serif !important;
}
legend {
color:red;
font-weight:bold;
font-size:14px;
}
.star {
color:#FF0000  !important;
}
.mod {
color:#FF0000;
font-weight:bold;
font-size:16px;
}
.mod1 {
color:red;
font-weight:bold;
font-size:20px;
}
</style>  
  <title>Admin Login</title>

														
<form action="adminlogin.php" method="post">							
<table width="60%" align="center" border="0" cellspacing="3" cellpadding="2">
<tbody><tr>
<td colspan="2" valign="top">
	<fieldset>
     	<legend>Users Login</legend>
     	
      	<table width="100%" border="0" cellspacing="2" cellpadding="2"><tbody>
	<tr>
          	<td class="text_b2">Login ID  <span class="star">*</span></td>
          	<td><input type="text" name="logid" class="box4" value="<?php echo $logid;?>"></td>
          	<td><span class="star"><?php echo $warn1;?></span></td>
        	</tr>
       	<tr>
          	<td class="text_b2">Password <span class="star">*</span></td>
          	<td><input type="password" name="password"  class="box4" value=""></td>
      		<td><span class="star"><?php echo $warn2;?></span></td></tr>
      	</tbody></table></fieldset>
</td>
<tr><td colspan="2" align="center"><input type="submit" name="submit" value="Login"><input type="reset" name="reset" value="Clear"><input type="submit" name="register" value="Register">
</tr>

</tbody></table></form>

</body></html>
