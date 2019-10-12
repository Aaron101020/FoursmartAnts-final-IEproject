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


<div class="entry-content">
<br>

<form action="#" method="post" class="form-control">

<select name="q">
    <option value="">Select the table</option>
    <option value="1">Parent</option>
    <option value="0">Child</option>
    
    </select>
    <input type="text" name="fanweima">
    <input type="submit" name="submit" value="Search">

</form>



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
            echo "search in the event table."."</br>";
            echo "Event id is：".$row_Recordset2[event_id]."<br>";
            echo "event_name is：".$row_Recordset2[event_name]."<br>";
            echo "event_type is：".$row_Recordset2[event_type]."<br>";
            echo "event_desc is：".$row_Recordset2[event_desc]."<br>";
            echo "<br>";
            echo "<br>";
        }
            
        while($row_Recordset1 = mysqli_fetch_assoc($Recordset1)){
    
            $totalRows_Recordset1 = mysqli_num_rows($Recordset1);
    
    
            if ($totalRows_Recordset1 <= 0) {
                echo "do not exit<br>";
            }
            else{
                
                echo "Total number in this event is：".$totalRows_Recordset1."</br>";
    
    
                echo "child_ID is：".$row_Recordset1[child_id]."<br>";
                echo "Last Name is：".$row_Recordset1[last_name]."<br>";
                echo "First Name is：".$row_Recordset1[first_name]."<br>";
                echo "Gender is：".$row_Recordset1[gender]."<br>";
                echo "parent_ID is：".$row_Recordset1[epipen_used]."<br>";
                echo "Age is：".$row_Recordset1[age]."<br>";
                echo "action_plan is：".$row_Recordset1[action_plan]."<br>";
    
                echo "type_of_allergy is：".$row_Recordset1[type_of_allergy]."<br>";
                echo "emer_contact_name is：".$row_Recordset1[emer_contact_name]."<br>";
                echo "emer_contact_no is：".$row_Recordset1[emer_contact_no]."<br>";
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
            echo "do not exit<br>";
        }
        else{
            echo "search in the parent table."."</br>";
            echo "Total number is：".$totalRows_Recordset1."</br>";
            echo "Last Name is：".$row_Recordset1[last_name]."<br>";
            echo "First Name is：".$row_Recordset1[first_name]."<br>";
            echo "Email is：".$row_Recordset1[email]."<br>";
            echo "Number of kids is：".$row_Recordset1[no_of_kids]."<br>";
            echo "Check time：".$localtime."<br>";
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
                    echo "do not exit<br>";
                }
                else{
                    echo "search in the child table";
                    echo "child_ID is：".$row_Recordset1[child_id]."<br>";
                    echo "Total number is：".$totalRows_Recordset1."</br>";
                    echo "Last Name is：".$row_Recordset1[last_name]."<br>";
                    echo "First Name is：".$row_Recordset1[first_name]."<br>";
                    echo "Gender is：".$row_Recordset1[gender]."<br>";
                    echo "parent_ID is：".$row_Recordset1[epipen_used]."<br>";
                    echo "Age is：".$row_Recordset1[age]."<br>";
                    echo "action_plan is：".$row_Recordset1[action_plan]."<br>";

                    echo "type_of_allergy is：".$row_Recordset1[type_of_allergy]."<br>";
                    echo "emer_contact_name is：".$row_Recordset1[emer_contact_name]."<br>";
                    echo "emer_contact_no is：".$row_Recordset1[emer_contact_no]."<br>";
                    echo "medicine is：".$row_Recordset1[medicine]."<br>";

                    echo "Check time：".$localtime."<br>";
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