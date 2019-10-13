<?php
/**
 *      Template Name: search1.2.2
 */


get_header(); ?>


<?php

$wordpressroot=$_SERVER['DOCUMENT_ROOT'];
require_once("$wordpressroot/wp-config.php");


$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysqli_select_db($connection, DB_NAME);

?>

    <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <?php

        while ( have_posts() ) : the_post();

            get_template_part( 'content', 'page' );

            if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                        endif;

                    endwhile;
                    ?>


<div class="entry-content" style = "margin: auto;
   background-color: beige;
  width: 80%;
  border-radius: 5px;
  padding: 10px">
<br>

<h1 style = "text-align: center; color: #558CF8;">SEARCH </h1>


<form action="#" method="post" class="form-control">
<select name="q" style = " width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;" >
    <option value="">Select to view information</option>
    <option value="1">Parent</option>
    <option value="0">Child</option>
    <option value="2">Event</option>

    </select>
    <input type="text" style = " width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;"  placeholder = "Parent ID/Event ID" name="fanweima">

 <input type="submit" name="submit" style = "width: 100%;
  background-color: #558CF8;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;"  value="SEARCH"><br/>

<br>
 <a style = "width: 100%;
  background-color: #558CF8;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;" href = 'http://foursmartants.tk/?page_id=1274' id="myButton" >ADD CHILD TO AN EVENT</a>

</form>
</div>
<br>


<?php

if(@$_POST['q'] == "2"){
    if (@$_POST['fanweima'] !== null) {

        $localtime=date('Y-m-d H:i:s',time());
        $fanweima=$_POST["fanweima"];
        $query_Recordset1 = "SELECT * FROM event_attend,children,party where event_attend.event_id = party.event_id AND children.child_id = event_attend.child_id AND party.event_id=$fanweima";

        $query_Recordset2 = "SELECT * FROM party where event_id  =$fanweima";

        $Recordset1 = mysqli_query($connection, $query_Recordset1 );

        $Recordset2 = mysqli_query($connection, $query_Recordset2 );

        $row_Recordset2 = mysqli_fetch_assoc($Recordset2);

        $totalRows_Recordset2 = mysqli_num_rows($Recordset2);

        if ($totalRows_Recordset2 <= 0) {
            echo "do not exit<br>";
        }

        else{

             echo '<div class="entry-content" style = "position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: beige;"><h2 style="text-align: center; color : #558CF8"> EVENT DETAILS ARE: </h2>';

            /*echo "search in the event table."."</br>";
            echo "Event id is:".$row_Recordset2[event_id]."<br>";
            echo "event_name is:".$row_Recordset2[event_name]."<br>";
            echo "event_type is:".$row_Recordset2[event_type]."<br>";
            echo "event_desc is:".$row_Recordset2[event_desc]."<br>";
            echo "<br>";
            echo "<br>";*/

   echo '<table style= " font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;"><tr><th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Event ID</th><th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Event Name</th><th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Event Type</th><th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Event Description</th><th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Event Location</th><th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Event Date and Time</th>
</tr>';

           echo '<tr><td style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">' .$row_Recordset2[event_id]. '</td><td style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">' .$row_Recordset2[event_name]. '</td><td style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">' .$row_Recordset2[event_type]. '</td><td style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">' .$row_Recordset2[event_desc]. '</td><td style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">' .$row_Recordset2[location]. '</td><td style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">' .$row_Recordset2[data_time]. '</td></tr>';
           echo '</table><br/>';
           echo '<a style = "width: 100%;
  background-color: #558CF8;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;" href = "http://foursmartants.tk/?page_id=446">CLOSE</a>';
           echo '</div>';



        }

        while($row_Recordset1 = mysqli_fetch_assoc($Recordset1)){

            $totalRows_Recordset1 = mysqli_num_rows($Recordset1);


            if ($totalRows_Recordset1 <= 0) {
                echo "do not exit<br>";
            }
            else{

                /*echo "Total number in this event is:".$totalRows_Recordset1."</br>";


                echo "child_ID is:".$row_Recordset1[child_id]."<br>";
                echo "Last Name is:".$row_Recordset1[last_name]."<br>";
                echo "First Name is:".$row_Recordset1[first_name]."<br>";
                echo "Gender is:".$row_Recordset1[gender]."<br>";
                echo "parent_ID is:".$row_Recordset1[epipen_used]."<br>";
                echo "Age is:".$row_Recordset1[age]."<br>";
                echo "action_plan is:".$row_Recordset1[action_plan]."<br>";

                echo "type_of_allergy is:".$row_Recordset1[type_of_allergy]."<br>";
                echo "emer_contact_name is:".$row_Recordset1[emer_contact_name]."<br>";
                echo "emer_contact_no is:".$row_Recordset1[emer_contact_no]."<br>"; */

                 echo '<div class="entry-content" style = "position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: beige;"><h2 style="text-align: center; color : #558CF8"> EVENT DETAILS ARE: </h2>';

           echo '<table style= " font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;"><tr><th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Event ID</th><th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Event Name</th><th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Event Type</th><th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Event Description</th><th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Event Location</th><th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Event Date and Time</th>
</tr>';

           echo '<tr><td style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">' .$row_Recordset2[event_id]. '</td><td style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">' .$row_Recordset2[event_name]. '</td><td style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">' .$row_Recordset2[event_type]. '</td><td style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">' .$row_Recordset2[event_desc]. '</td><td style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">' .$row_Recordset2[location]. '</td><td style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">' .$row_Recordset2[data_time]. '</td></tr>';
           echo '</table><br/>';

            /* echo "Event id is:".$row_Recordset2[event_id]."<br>";
            echo "event_name is:".$row_Recordset2[event_name]."<br>";
            echo "event_type is:".$row_Recordset2[event_type]."<br>";
            echo "event_desc is:".$row_Recordset2[event_desc]."<br>";
            echo "<br>";
            echo "<br>"; */

                 echo '<h2 style="text-align: center; color : #558CF8"> CHILDREN ATTENDING ABOVE EVENT: </h2>';

                 echo '<table style= " font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;"><tr>
<th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Child ID</th>
<th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Last Name</th>
<th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">First Name</th>
<th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Gender</th>
<th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Age</th>
<th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Types of allergies</th>
<th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Emenrgency Contact Name</th>
<th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Emenrgency Contact Number</th>
<th style = " border: 1px solid #dddddd;
text-align: left;
padding: 8px;">Contains Action Plan</th>
</tr>';

               echo '<tr><td style = " border: 1px solid #dddddd;
text-align: left;
padding: 8px;">' .$row_Recordset1[child_id]. '</td>
<td style = " border: 1px solid #dddddd;
text-align: left;
padding: 8px;">' .$row_Recordset1[last_name]. '</td>
<td style = " border: 1px solid #dddddd;
text-align: left;
padding: 8px;">' .$row_Recordset1[first_name]. '</td>
<td style = " border: 1px solid #dddddd;
text-align: left;
padding: 8px;">' .$row_Recordset1[gender]. '</td>
<td style = " border: 1px solid #dddddd;
text-align: left;
padding: 8px;">' .$row_Recordset1[age]. '</td>
<td style = " border: 1px solid #dddddd;
text-align: left;
padding: 8px;">' .$row_Recordset1[type_of_allergy]. '</td>
<td style = " border: 1px solid #dddddd;
text-align: left;
padding: 8px;">' .$row_Recordset1[emer_contact_name]. '</td>
<td style = " border: 1px solid #dddddd;
text-align: left;
padding: 8px;">' .$row_Recordset1[emer_contact_no]. '</td>
<td style = " border: 1px solid #dddddd;
text-align: left;
padding: 8px;">'.$row_Recordset1[action_plan].'</td>

</tr>';
         echo '</table><br/>';
         echo '<a style = "width: 100%;
background-color: #558CF8;
color: white;
padding: 14px 20px;
margin: 8px 0;
border: none;
border-radius: 4px;" href = "http://foursmartants.tk/?page_id=446">CLOSE</a>';
         echo '</div>';


          }
      }
      mysqli_close($connection);
  }
  else{
    return '';
}
}

if(@$_POST['q'] == "1"){

if (@$_POST['fanweima'] !== null) {

$localtime=date('Y-m-d H:i:s',time());
$fanweima=$_POST["fanweima"];
$query_Recordset1 = "SELECT * FROM `parent` where key_id =$fanweima";

$Recordset1 = mysqli_query($connection, $query_Recordset1 );

    $row_Recordset1 = mysqli_fetch_assoc($Recordset1);

    $totalRows_Recordset1 = mysqli_num_rows($Recordset1);


    if ($totalRows_Recordset1 <= 0) {
        // echo "do not exit<br>";
       echo '<div style="   margin: auto;
                    background-color:beige;
                    width: 80%;
                    border-radius: 5px;
                    padding: 10px;">
                    <h2 style="color : #FF0000"> DETAILS DOES NOT EXIST </h2></div>';

    }
    else{
        //echo "search in the parent table."."</br>";
        //echo "Total number is:".$totalRows_Recordset1."</br>";
        //echo "Last Name is:".$row_Recordset1[last_name]."<br>";
        //echo "First Name is:".$row_Recordset1[first_name]."<br>";
        //echo "Email is:".$row_Recordset1[email]."<br>";
        //echo "Number of kids is:".$row_Recordset1[no_of_kids]."<br>";
        //echo "Check time:".$localtime."<br>";

            echo '<div class="entry-content" style = "position: fixed; /* Stay in place */
z-index: 1; /* Sit on top */
padding-top: 100px; /* Location of the box */
left: 0;
top: 0;
width: 100%; /* Full width */
height: 100%; /* Full height */
overflow: auto; /* Enable scroll if needed */
background-color: beige;"><h2 style="text-align: center; color : #558CF8"> YOUR DETAILS ARE: </h2>';
echo '<table style= " font-family: arial, sans-serif;
border-collapse: collapse;
width: 100%;"><tr><th style = " border: 1px solid #dddddd;
text-align: left;
padding: 8px;">Last Name</th><th style = " border: 1px solid #dddddd;
text-align: left;
padding: 8px;">First Name</th><th style = " border: 1px solid #dddddd;
text-align: left;
padding: 8px;">Email</th><th style = " border: 1px solid #dddddd;
text-align: left;
padding: 8px;">Number of kids</th></tr>';
         echo '<tr><td style = " border: 1px solid #dddddd;
text-align: left;
padding: 8px;">' .$row_Recordset1[last_name]. '</td><td style = " border: 1px solid #dddddd;
text-align: left;
padding: 8px;">' .$row_Recordset1[first_name]. '</td><td style = " border: 1px solid #dddddd;
text-align: left;
padding: 8px;">' .$row_Recordset1[email]. '</td><td style = " border: 1px solid #dddddd;
text-align: left;
padding: 8px;">' .$row_Recordset1[no_of_kids]. '</td></tr>';
         echo '</table><br/>';
         echo '<a style = "width: 100%;
background-color: #558CF8;
color: white;
padding: 14px 20px;
margin: 8px 0;
border: none;
border-radius: 4px;" href = "http://foursmartants.tk/?page_id=446">CLOSE</a>';
         echo '</div>';
      }
  mysqli_close($connection);
}
else{
  return '';
}
}

else{


  if (@$_POST['fanweima'] !== null) {

      $localtime=date('Y-m-d H:i:s',time());
      $fanweima=$_POST["fanweima"];
      $query_Recordset1 = "SELECT * FROM `children` where key_id  =$fanweima";

      $Recordset1 = mysqli_query($connection, $query_Recordset1 );

      while($row_Recordset1 = mysqli_fetch_assoc($Recordset1)){

        $totalRows_Recordset1 = mysqli_num_rows($Recordset1);


        if ($totalRows_Recordset1 <= 0) {
            //echo "do not exit<br>";

           echo '<div style="   margin: auto;
                background-color:beige;
                width: 80%;
                border-radius: 5px;
                padding: 10px;">
                <h2 style="color : #FF0000"> DETAILS DOES NOT EXIST </h2></div>';

        }
        else{
            /* echo "search in the child table";
            echo "child_ID is:".$row_Recordset1[child_id]."<br>";
            echo "Total number is:".$totalRows_Recordset1."</br>";
            echo "Last Name is:".$row_Recordset1[last_name]."<br>";
            echo "First Name is:".$row_Recordset1[first_name]."<br>";
            echo "Gender is:".$row_Recordset1[gender]."<br>";
            echo "parent_ID is:".$row_Recordset1[epipen_used]."<br>";
            echo "Age is:".$row_Recordset1[age]."<br>";
            echo "action_plan is:".$row_Recordset1[action_plan]."<br>";

            echo "type_of_allergy is:".$row_Recordset1[type_of_allergy]."<br>";
            echo "emer_contact_name is:".$row_Recordset1[emer_contact_name]."<br>";
            echo "emer_contact_no is:".$row_Recordset1[emer_contact_no]."<br>";
            echo "medicine is:".$row_Recordset1[medicine]."<br>";

            echo "Check time:".$localtime."<br>"; */

           echo '<div class="entry-content" style = "position: fixed; /* Stay in place */
z-index: 1; /* Sit on top */
padding-top: 100px; /* Location of the box */
left: 0;
top: 0;
width: 100%; /* Full width */
height: 100%; /* Full height */
overflow: auto; /* Enable scroll if needed */
background-color: beige;"><h2 style="text-align: center; color : #558CF8"> YOUR CHLDRENS DETAILS ARE: </h2>';

         echo '<table style= " font-family: arial, sans-serif;
border-collapse: collapse;
width: 100%;"><tr>
<th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Child ID</th>
<th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Last Name</th>
<th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">First Name</th>
<th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Gender</th>
<th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Age</th>
<th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Types of allergies</th>
<th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Emenrgency Contact Name</th>
<th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Emenrgency Contact Number</th>
<th style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">Contains Action Plan</th>
</tr>';

                 echo '<tr><td style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">' .$row_Recordset1[child_id]. '</td>
<td style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">' .$row_Recordset1[last_name]. '</td>
<td style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">' .$row_Recordset1[first_name]. '</td>
<td style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">' .$row_Recordset1[gender]. '</td>
<td style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">' .$row_Recordset1[age]. '</td>
<td style = " border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;">' .$row_Recordset1[type_of_allergy]. '</td>
<td style = " border: 1px solid #dddddd;
text-align: left;
padding: 8px;">' .$row_Recordset1[emer_contact_name]. '</td>
<td style = " border: 1px solid #dddddd;
text-align: left;
padding: 8px;">' .$row_Recordset1[emer_contact_no]. '</td>
<td style = " border: 1px solid #dddddd;
text-align: left;
padding: 8px;">'.$row_Recordset1[action_plan].'</td>

</tr>';
         echo '</table><br/>';
         echo '<a style = "width: 100%;
background-color: #558CF8;
color: white;
padding: 14px 20px;
margin: 8px 0;
border: none;
border-radius: 4px;" href = "http://foursmartants.tk/?page_id=446">CLOSE</a>';
         echo '</div>';
              }
      }

      mysqli_close($connection);
  }
  else{
      return '';
  }


}






?>
</div>

      </main>

      </div>

<?php get_footer(); ?>
