<html>
  <head>
    <title>placement cell</title>
  </head>
  <body>
  <form action="php" method="post">
  <fieldset>
  <legend>enter user name and password</legend>
  user name:<input type="text" name="name"><br>
  password:<input type="password" name="name"></fieldset></form>
  <?php
  $con=pg_connect("host=localhost dbname=dilshad user=dilshad");
  if(!$con)
 {
	echo "not connected";
}
	//pg_query("insert into dept values('jilani','machenical')");
	pg_query("drop table test");
  ?>
  </body>
</html>
