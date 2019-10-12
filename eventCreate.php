<?php
/**
 *  *  *      Template Name: event1.1
 *   *   */


get_header(); ?>


<?php

$wordpressroot=$_SERVER['DOCUMENT_ROOT'];
require_once("$wordpressroot/wp-config.php");


$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysqli_select_db($connection, DB_NAME);

?>



<html>
<head>
<meta charset="utf-8">
<title>insert1</title>
</head>
<body>


<div id ="my_id" style="   margin: auto;
   background-color:beige;
  width: 60%;
  border-radius: 5px;
  padding: 10px;">

<h1 style = "text-align: center;
    color: #558CF8;">ENTER EVENT DETAILS</h1>


<form action="#" method="post" class="form-control">

<label for="event_name">Name of the Event:</label><input type="text" style= " width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;" name="event_name" placeholder="Name of the event" pattern = "[\w\s]+"><br />

<label for="event_type">$Type of the Event:</label><input type="text" style= " width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
box-sizing: border-box;" name="event_type" placeholder="Type of the event" pattern = "[\w\s]+"><br />

<label for="event_desc">Description of the Event:</label><input type="text" style= " width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
box-sizing: border-box;" name="event_desc" placeholder="Description of the event" pattern = "[\w\s]+"><br />



<input type="submit" value="SUBMIT" style = "width: 100%;
  background-color: #558CF8;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;"><br/>

<br>
 <a style = "width: 100%;
  background-color: #558CF8;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;" href = 'http://foursmartants.tk/?page_id=446' id="myButton" >SEARCH EVENT INFORMATION</a>


</form>
</div>
</body>
</html>
<?php

if(@$_POST["event_name"] !== null) {

                $event_name = $_POST["event_name"];
                        $event_type = $_POST["event_type"];
                        $event_desc= $_POST["event_desc"];
                                $key = rand(1000,9999);

                                $sql = "INSERT INTO party (event_id, event_name, event_type, event_desc)
                                                                VALUES ('$key','$event_name','$event_type','$event_desc')";


                                        if (mysqli_query($connection, $sql)) {

                                                                        echo '<div style="   margin: auto;
                                                                                                background-color:beige;
                                                                                                width: 60%;
                                                                                                                        border-radius: 5px;
                                                                                                                        padding: 10px;">
                                                                                                                                                        <h2 style="color : #558CF8"> DETAILS SAVED SUCCCESSFULLY </h2>
                                                                                                                                                                                <h2 style="color : #558CF8">Your ID is :' .$key. '</h2>

                        </div>';

        } else {

                                echo '<div style="   margin: auto;
                                                        background-color:beige;
                                                        width: 60%;
                                                                                border-radius: 5px;
                                                                                padding: 10px;">
                                                                                                                <h2 style="color : #FF0000"> ERROR WHILE SAVING DETAILS  </h2>';

        }
        $connection->close();


}


else{
            return '';
}
?>
