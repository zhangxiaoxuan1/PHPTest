<html>
    <head>
        <title>My first PHP Website</title>
    </head>
    <body>
        <h2>Registration Page</h2>
        <a href="index.php">Click here to go back<a/><br/>
        <form action="register.php" method="POST">
           Enter Username: <input type="text" name="username" required="required" /> <br/>
           Enter password: <input type="password" name="password" required="required" /> <br/>
           <input type="submit" value="Register"/>
        </form>
    </body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

  mysql_connect("localhost", "root","Zxxzxxzxx1!") or die(mysql_error()); //Connect to server
  mysql_select_db("first_db") or die("Cannot connect to database"); //Connect to database

  $username = mysql_real_escape_string($_POST['username']);
  $password = mysql_real_escape_string($_POST['password']);
  $bool = true;

  echo "Username: " . $username . "<br/>";
  echo "Password:" . $password;

  $query = mysql_query("Select * from users"); //Query the users table
	while($row = mysql_fetch_array($query)) //display all rows from query
	{
		$table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
		if($username == $table_users) // checks if there are any matching fields
		{
			$bool = false; // sets bool to false
			echo '<script>alert("Username has been taken!");</script>'; //Prompts the user
			echo '<script>window.location.assign("register.php");</script>'; // redirects to register.php
		}
	}
	if($bool) // checks if bool is true
	{
		mysql_query("INSERT INTO users (username, password) VALUES ('$username','$password')"); //Inserts the value to table users
		echo '<script>alert("Successfully Registered!");</script>'; // Prompts the user
		echo '<script>window.location.assign("register.php");</script>'; // redirects to register.php
	}
}
?>
