<html>
<head><title> php </title></head>
<body bgcolor="">
<table border="0" cellspacing="12" cellpading="12">
<?php
$con=pg_connect("host=localhost dbname=dilshad user=dilshad ");
if(!$con)
{
echo "an error occured";
}
$sql=pg_query("SELECT * FROM student");
if(!$sql)
{
	echo "an error occured ok.\n";
	exit;
}
echo '<tr>';
echo '<th>'.' Roll Number'.'</th>';
echo '<th> '.'Name'.'</th>';
echo '<th>'. 'Fathers name'.'</th>';
echo '<th>'.'Date of Birth'.'</th>';
echo '<th>'.'CGPA'.'</th>';
echo '<th>'.'Graduation %'.'</th>';
echo '<th>'.'10+2 %'.'</th>';
echo '<th>'.'10 %'.'</th>';
echo '<th>'.'Course'.'</th>';
echo '<th>'.'Department'.'</th>';
echo '<th>'.'Alumni'.'</th>';
echo '</tr>';

while($row=pg_fetch_row($sql))
{
echo '<tr>';
echo'<td>'.$row[0].'</td>';
echo'<td>'. $row[1].'</td>';
echo'<td>'. $row[2].'</td>';
echo'<td>'. $row[3].'</td>';
echo'<td>'. $row[4].'</td>';
echo'<td>'. $row[5].'</td>';
echo'<td>'. $row[6].'</td>';
echo'<td>'. $row[7].'</td>';
echo'<td>'. $row[8].'</td>';
echo'<td>'. $row[9].'</td>';
echo'<td>'. $row[10].'</td>';
//echo "<br/>";
echo'</tr>';
	
}
?>
</table>
</body>
</html>
