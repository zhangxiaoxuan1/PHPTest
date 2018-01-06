<?php
    session_start();
    if($_SESSION['user']){
    }
    else{
       header("location:index.php");
    }
    mysql_connect("localhost", "root","Zxxzxxzxx1!") or die(mysql_error()); //Connect to server
    mysql_select_db("first_db") or die("Cannot connect to database"); //Conect to database
    date_default_timezone_set('America/New_York');
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
       $details = mysql_real_escape_string($_POST['details']);
       $time = strftime("%X"); //time
       $date = strftime("%B %d, %Y"); //date
       $decision = "no";
       mysql_query("INSERT INTO list(details, date_posted, date_edited, time_posted,time_edited, public) VALUES ('$details','$date','$date','$time','$time','$decision')") or die(mysql_error()); //SQL query
       header("location:home.php");
    }
    else
    {
       header("location:home.php");
    }
?>
