<?php
/**
 *  *      Template Name: update parents-1.2.1
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
<link href="stylesheet.css" rel="stylesheet" type="text/css">
</head>
<body>
        <h1 style = "text-align: center;
    color: #558CF8;">Update your details</h1>
<div style = "margin: auto;
   background-color: beige;
  width: 40%;
  border-radius: 5px;
    padding: 10px">

            <form action="#" method="post" class="form-control">

                <label for="fanweima">ParentID: </label><input type="text" name="fanweima"  style = " width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;" placeholder="Parent ID"><br />
                    <label for="LastName">LastName:  </label><input type="text" name="LastName"  style = " width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;" placeholder="Parent ID"><br />
                    <label for="LastName">LastName:  </label><input type="text" name="LastName"  style = " width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
              border-radius: 4px;
              box-sizing: border-box;" placeholder="Last Name"><br />
                          <label for="FirstName">FirstName: </label> <input type="text" name="FirstName" style = " width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                  display: inline-block;
                  border: 1px solid #ccc;
                    border-radius: 4px;
                    box-sizing: border-box;" placeholder="First Name"><br />
                                <label for="no_of_kids">Number of kids: </label> <input type="text" name="no_of_kids" style = " width: 100%;
                      padding: 12px 20px;
                      margin: 8px 0;
                        display: inline-block;
                        border: 1px solid #ccc;
                          border-radius: 4px;
                          box-sizing: border-box;" placeholder="Number of kids"><br />
                                      <label for="Email">Email: </label><input type="test" name="Email" style = " width: 100%;
                            padding: 12px 20px;
                            margin: 8px 0;
                              display: inline-block;
                              border: 1px solid #ccc;
                                border-radius: 4px;
                                box-sizing: border-box;" placeholder="jsmith@example.com"><br />


                                            <input type="submit" name="submit" value="Update" style = "width: 100%;
                                  background-color: #558CF8;
                                  color: white;
                                    padding: 14px 20px;
                                    margin: 8px 0;
                                      border: none;
                                      border-radius: 4px;
                                        cursor: pointer;">

                                                </form>
                                                <?php


if (@$_POST['fanweima'] !== null) {

            $LastName = $_POST["LastName"];
                $FirstName = $_POST["FirstName"];
                $Email = $_POST["Email"];
                    $no_of_kids= $_POST["no_of_kids"];
                    $fanweima=$_POST["fanweima"];


                        $sql = "UPDATE `parent` SET last_name='$LastName', first_name='$FirstName', email='$Email', no_of_kids='$no_of_kids' where key_id =$fanweima";

                        if (mysqli_query($connection, $sql)) {
                                            echo "Parents information has been updated successfully";
                                                    }
                                else{
                                                     echo "Error:Null value! "."<br>";

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
