<?php 
include "includes/functions.php";
include("includes/class.upload.php");
make_connection(); 


include "MasterTop.php"; ?>


<div id="content">

<div id="listing">
	


	
    
 
  <?php 
	$problem_id = $_GET['id'];
	$RS = Run("select * from tblproblems where id = '$problem_id'"); 
	$ROW = GetRow($RS);
	
	
	?>   

<?php 

if($ROW['picture']!=''){ 

?>
<img src="problems/<?php echo $ROW['picture']; ?>" style="float:right; padding-left:8px; " width="200" height="120" />

<?php } ?>

<h2><?php echo $ROW['title']; ?></h2>
<p style="color:#777;"><?php echo $ROW['details']; ?></p>
  
  

<a href="post-solution.php?problem=<?php echo $ROW['id']; ?>" class="post_solutions" >Post a Solution</a>
 


<div style="clear:both;">&nbsp;</div>
<h3> <?php 
$problem_id		=  $ROW['id'];
$Sol 			= "select id from tblsolutions where problem_id = '$problem_id'"; 
$SolRES 		= Run($Sol);
echo 			Records($SolRES);


?> 

Solution(s)  
</h3>
<div style="clear:both;">&nbsp;</div>
  <?php 
	
	$RS = Run("select * from tblsolutions where problem_id = '$problem_id'"); 
	while($ROW = GetRow($RS)){
	
	
	?>   
<div class="list2">
 

 

Solution by: <a href="mailto:<?php echo $ROW['member_id']; ?>" class="problems"><?php echo $ROW['member_id']; ?></a> <br />
<p style="color:#777;"><?php echo $ROW['details']; ?></p>
<a href="solutions/<?php echo $ROW['picture']; ?>" class="problems post_solutions"><strong>Download Solution</strong></a> 
</div>

<div style="clear:both;">&nbsp;</div>
 <?php 
	  
	}
	  
	  ?> 

<h3>Discussions</h3>
<div style="clear:both;">&nbsp;</div> 
<div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
<fb:comments href="http://www.webcomforts.com/khidmatgar/problem.php?id=<?php echo $ID; ?>"></fb:comments>  

</div>

<?php include "SideBar.php"; ?>




<?php include "Footer.php"; ?>