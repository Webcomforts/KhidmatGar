<?php 
 
include "includes/functions.php";

make_connection(); 

extract($_POST, EXTR_OVERWRITE);
 
if($bcheck_login=='true')
{

redirect_to('home.php', 'srch', '');

}
else
{
echo "You are not allowed to be here.."; exit; 
}

 ?>