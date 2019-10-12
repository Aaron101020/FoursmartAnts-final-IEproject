<?php
/**
 *  *      Template Name: parent1.2
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

<?php

$nameErr = "" ;
$validate = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["LastName"])) {
    $nameErr = "Name is required";
  } else {
    $LastName = test_input($_POST["LastName"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$LastName)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
  ?>
  
  
  <div id ="my_id" style="   margin: auto;
     background-color:beige;
    width: 60%;
    border-radius: 5px;
    padding: 10px;">
  <h1 style = "text-align: center; color: #558CF8;">ENTER PARENT DETAILS</h1>
  
  
  <form action="#" method="post" class="form-control">
  <label for="LastName">Last Name:  *</label><input type="text" pattern = "[A-Za-z]+" style= " width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;" name="LastName" placeholder="Last Name" oninvalid="setCustomValidity('Please enter only characters')">
   <br />
  
  <label for="FirstName">First Name:  *</label><input type="text"  style= " width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;" name="FirstName" placeholder="First Name" pattern = "[A-Za-z]+" oninvalid="setCustomValidity('Please enter only characters')" ><br />
  
  <label for="no_of_kids">Number of kids: *</label>
  <select name="no_of_kids" style = " width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;">
      <option value="">Number of kids</option>
      <option value="1">1</option>

      <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>

    </select>


<label for="Email">Email:  *</label><input type="email" style=" width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;"  name="Email" placeholder="jsmith@example.com"><br />
<span style= "color: #FF0000;" >* Required fields </span>

<input type="submit" value="SUBMIT" style = "width: 100%;
  background-color: #558CF8;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;"><br \>


<br>
<a style = "width: 100%;
  background-color: #558CF8;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;" href = 'http://foursmartants.tk/?page_id=469' id="myButton" >ENTER CHILD DETAILS</a>

</form>
</div>

</body>
</html>

<?php
if (@$_POST['LastName'] !== null) {



    $LastName = $_POST["LastName"];
    $FirstName = $_POST["FirstName"];
    $Email = $_POST["Email"];
    $no_of_kids= $_POST["no_of_kids"];
    $key = rand(10000,99999);

    $sql = "INSERT INTO parent (key_id, last_name, first_name, email, no_of_kids)
                    VALUES ('$key','$LastName','$FirstName','$Email','$no_of_kids')";


    if (mysqli_query($connection, $sql)) {

            echo '<div style="   margin: auto;
                    background-color:beige;
                    width: 60%;
                    border-radius: 5px;
                    padding: 10px;">
                    <h2 style="color : #558CF8"> DETAILS SAVED SUCCCESSFULLY </h2>
                    <h2 style="color : #558CF8">Your Parent ID is :' .$key. '</h2>
                    <h3 style="color : #558CF8"> >> Use above ID to enter your child details </h3>
                    </div>';

            // echo "insert successful!"."<br>";
            // echo "$key";
    } else {
                        echo '<div style="   margin: auto;
                    background-color:beige;
                    width: 60%;
                    border-radius: 5px;
                    padding: 10px;">
                    <h2 style="color : #FF0000"> PLEASE ENTER REQUIRED FIELDS </h2>';
    }
    $connection->close();


}

else{
        return '';
}
?>
