<?php
/**
 *  *      Template Name: child
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

    <div style = "margin: auto;
    background-color: beige;
    width: 60%;
    border-radius: 5px;
    padding: 10px">

<h1 style = "text-align: center;
    color: #558CF8;">ENTER YOUR CHILD DETAILS</h1>

<form action="#" method="post" class="form-control">
<label for="ParentID">ParentID:</label><input type="text" style = " width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;" name="ParentID" placeholder="Parent ID"><br />
<label for="LastName">Last Name: </label><input type="text" pattern = "[A-Za-z]+" style = " width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;" name="LastName" placeholder="Last Name"><br />

<label for="FirstName">First Name: </label><input type="text" pattern = "[A-Za-z]+" style = " width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;" name="FirstName" placeholder="First Name"><br />

<label for="Gender">Gender: </label>
<select name="Gender" style = " width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;">
<option value="">Gender</option>
<option value="Female">Female</option>
<option value="Male">Male</option>
</select>

<br />
<label for="Age">Age: </label><input type="number" min = "1" max = "75" style = " width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;" name="Age" placeholder="Age"><br />

<label for="type_of_allergy[]">Type of allergy: </label><br />
<span style = " width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;">
<input type="checkbox" name="type_of_allergy[]" value="“egg”" />Egg
<input type="checkbox" name="type_of_allergy[]" value="milk" />Milk
<input type="checkbox" name="type_of_allergy[]" value="yeast" />Yeast
<input type="checkbox" name="type_of_allergy[]" value="treenuts" />Treenuts
<input type="checkbox" name="type_of_allergy[]" value="gluten" />Gluten
<input type="checkbox" name="type_of_allergy[]" value="dairy" />Dairy
<input type="checkbox" name="type_of_allergy[]" value="soya" />Soya
<input type="checkbox" name="type_of_allergy[]" value="peanut" />Peanut
</span>
<label for="emer_contact_name">Emergency contact name: </label><input type="test" pattern = "[A-Za-z]+" style = " width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;" name="emer_contact_name" placeholder="Emergency contact name:"><br />

<label for="emer_contact_no">Emergency contact number: </label><input type="text" pattern = "^\({0,1}((0|\+61)(2|4|3|7|8)){0,1}\){0,1}( |-){0,1}[0-9]{2}( |-){0,1}[0-9]{2}( |-){0,1}[0-9]{1}( |-){0,1}[0-9]{3}$" oninvalid = "Enter valid contact number" style = " width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;" name="emer_contact_no" placeholder="Emergency contact number:"><br />

<label for="epipen_used">Epipen Used: </label>
<select name="epipen_used" style = " width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;">
    <option value="">Yes / No</option>
    <option value="Yes">Yes</option>
    <option value="No">No</option>

    </select>
    <br />

<label for="action_plan">Action Plan: </label>
<select name="action_plan" style = " width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;">
    <option value="">Yes / No</option>
    <option value="Yes">Yes</option>
    <option value="No">No</option>
    </select>
    <br />

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
  border-radius: 4px;" href = 'http://foursmartants.tk/?page_id=446' id="myButton" >FIND YOUR DETAILS</a>

</form>
</div>
</body>
</html>




<?php

if (@$_POST['ParentID'] !== null) {

                $ParentID = $_POST["ParentID"];
                $LastName = $_POST["LastName"];
                $FirstName = $_POST["FirstName"];
                $Gender = $_POST["Gender"];
                $Age = $_POST["Age"];
                $epipen_used = $_POST["epipen_used"];
                $action_plan = $_POST["action_plan"];
                $type_of_allergy = $_POST["type_of_allergy"];
                $emer_contact_name = $_POST["emer_contact_name"];
                $emer_contact_no = $_POST["emer_contact_no"];

                $type_of_allergy = implode(',',$type_of_allergy);
                $sql = "INSERT INTO children (key_id, last_name, first_name, gender, age, epipen_used, action_plan, type_of_allergy, emer_contact_name, emer_contact_no)
                                                VALUES ('$ParentID','$LastName','$FirstName','$Gender','$Age','$epipen_used','$action_plan','$type_of_allergy','$emer_contact_name','$emer_contact_no')";


        if (mysqli_query($connection, $sql)) {
                        $sql2 = "SELECT * FROM children where key_id  ='$ParentID' AND first_name ='$FirstName'";
                        $Recordset1 = mysqli_query($connection, $sql2 );
                        $row_Recordset1 = mysqli_fetch_assoc($Recordset1);
                        $id = $row_Recordset1[child_id];

                        echo '<div style="   margin: auto;
                        background-color:beige;
                        width: 60%;
                        border-radius: 5px;
                        padding: 10px;">
                        <h2 style="color : #558CF8"> DETAILS SAVED SUCCCESSFULLY </h2>
                        <h2 style="color : #558CF8"> YOUR ID IS <? echo $id; ?> </h2>
                        </div>';
                        


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


<?php get_footer(); ?>
