
<?php
/**
 *  *Template Name: TESTai1
 *   */


get_header(); ?>


<form action="#" method="post" class="form-control">
    Enter the url for one picture.<br />
    URL: <input type="text" name="fanweima"><br />



    <input type="submit" name="submit" value="Update">

</form>



<?php



$fanweima=$_POST["fanweima"];

require_once 'AipOcr.php';

const APP_ID = '17243377';
const API_KEY = 'BQ4mX2L4ODSC6gGq9eXmK3Uv';
const SECRET_KEY = 'lvsYKLHWfdBaSH3z1wkNWLX5P7HDorGW';


$aipOcr = new AipOcr(APP_ID, API_KEY, SECRET_KEY);

if ($fanweima !== null) {


        $a = $aipOcr->general(file_get_contents($fanweima));

        #print_r($a->item1->item11->n."</br>");
        #print_r($a->item1->sex."</br>");
       echo "content is:".var_dump($a);
}

else{
                    return '';

}

?>
                
<?php get_footer(); ?>
                