<?php
/**
 *  *      Template Name: add event1.1
 *   */


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
    color: #558CF8;">ADD CHILD DETAILS TO A EVENT</h1>

<form action="#" method="post" class="form-control">

<label for="event_id">Enter Event Id:  *</label><input type="number" style= " width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;" name="event_id" placeholder="Event Id"><br />

<label for="child_id">Enter Child Id:  *</label><input type="number" style= " width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;" name="child_id" placeholder="Child Id" ><br />

<span style= "color: #FF0000;" >* Required fields </span>



<!-- event_id: <input type="text" name="event_id"><br />
child_id: <input type="text" name="child_id"><br /> -->

<input type="submit" value="SUBMIT" style = "width: 100%;
  background-color: #558CF8;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;">

</form>
</div>
</body>
</html>


<?php

if (@$_POST['event_id'] !== null) {

        $event_id = $_POST["event_id"];
        $child_id = $_POST["child_id"];


        $sql = "INSERT INTO event_attend (event_id, child_id)
                        VALUES ('$event_id','$child_id')";


        if (mysqli_query($connection, $sql)) {

                        echo '<div style="   margin: auto;
                        background-color:beige;
                        width: 60%;
                        border-radius: 5px;
                        padding: 10px;">
                        <h2 style="color : #558CF8"> DETAILS SAVED SUCCCESSFULLY </h2>
                        </div>';

                            //echo "insert successful!"."<br>";
        } else {


                        echo '<div style="   margin: auto;
                        background-color:beige;
                        width: 60%;
                        border-radius: 5px;
                        padding: 10px;">
                        <h2 style="color : #FF0000"> PLEASE ENTER VALID ID </h2>';

                        //echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
        $connection->close();


}

else{
            return '';
}
?>
