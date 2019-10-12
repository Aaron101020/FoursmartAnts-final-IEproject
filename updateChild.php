<?php
/**
 *  *      Template Name: update child-1.2.1
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
<title></title>
</head>
<body>
    <h1 style = "text-align: center;
    color: #558CF8;">Update your child details</h1>
<div style = "margin: auto;
   background-color: beige;
  width: 40%;
  border-radius: 5px;
  padding: 10px">
<form action="#" method="post" class="form-control">

<label for="child_id">child_id: </label><input type="text" name="child_id" style = " width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;" placeholder="Child ID"><br />
<label for="LastName">Last Name: </label><input type="text" style = " width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;" name="LastName" placeholder="Last Name"><br />
<label for="FirstName">First Name: </label><input type="text" style = " width: 100%;
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
<label for="Age">Age: </label><input type="test" style = " width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;" name="Age" placeholder="Age"><br />
<label for="type_of_allergy">Types of allergies: </label><input type="test"  style = " width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;" name="type_of_allergy" placeholder="Types of allergies:"><br />
<label for="emer_contact_name">Emergency contact name: </label><input type="test" style = " width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;" name="emer_contact_name" placeholder="Emergency contact name:"><br />
<label for="emer_contact_no">Emergency contact number: </label><input type="test" style = " width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;" name="emer_contact_no" placeholder="Emergency contact number:"><br />
<label for="medicine">Medicine: </label><input type="test" name="medicine"  style = " width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;" placeholder="Medicine"><br />
<label for="epipen_used">Epipen Used: </label>
<select name="epipen_used" style = " width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;">
    <option value="">Yes / No</option>
    <option value="1">Yes</option>
    <option value="0">No</option>
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
    <option value="1">Yes</option>
    <option value="0">No</option>
    </select>
    <br />
<input type="submit" value="submit" style = "width: 100%;
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


if (@$_POST['child_id'] !== null) {

            $LastName = $_POST["LastName"];
                $FirstName = $_POST["FirstName"];
                $Gender = $_POST["Gender"];
                    $Age = $_POST["Age"];
                    $epipen_used = $_POST["epipen_used"];
                        $action_plan = $_POST["action_plan"];
                        $child_id = $_POST["child_id"];

                            $type_of_allergy = $_POST["type_of_allergy"];
                            $emer_contact_name = $_POST["emer_contact_name"];
                                $emer_contact_no = $_POST["emer_contact_no"];
                                $medicine = $_POST["medicine"];


                                    $sql = "UPDATE `children` SET last_name='$LastName', first_name='$FirstName', gender='$Gender', age='$Age',epipen_used='$epipen_used',action_plan='$action_plan' ,type_of_allergy = '$type_of_allergy',emer_contact_name = '$emer_contact_name',emer_contact_no = '$emer_contact_no',medicine = '$medicine',where child_id =$child_id";

                                    if (mysqli_query($connection, $sql)) {
                                                        echo "children information has been updated successfully";
                                                                }
                                            else{
                                                                 echo "Error: " . $sql . "<br>" . mysqli_error($connection);

                                                                         }
                                        mysqli_close($connection);
}
else{
            return '';
}



?>
</div>

        </main>

        </div>

<?php get_footer(); ?>
