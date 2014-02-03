<?php 
include "includes/functions.php";
include("includes/class.upload.php");
make_connection(); 


include "MasterTop.php"; ?>


<div id="content">

<div id="listing">
	


	
    
    <form >
    
    <select name="parent_id" id="parent_id" style="padding:5px; width:250px;  border:1px solid #e3e3e3;"  >
      <option value="">Select Category</option>
    <?php 
	
	$ParentRS = Run("select id, title from tblcategories "); 
	while($ParentROW = GetRow($ParentRS)){
	
	
	?>
 	
    <option value="<?php echo $ParentROW['id']; ?>"><?php echo $ParentROW['title']; ?></option>
      
      <?php 
	  
	}
	  
	  ?>
      </select>
    
    <input type="text" style="padding:5px; width:260px; border:1px solid #e3e3e3;" placeholder="Type what you want!" /><input type="submit" value="Search Problems" style="padding:5px;" />
    </form>
 
<div style="clear:both;">&nbsp;</div>
  <?php 
	
	$RS = Run("select * from tblproblems order by id desc"); 
	while($ROW = GetRow($RS)){
	
	
	?>   
<div class="list">
<?php 

if($ROW['picture']!=''){ 

?>
<img src="problems/<?php echo $ROW['picture']; ?>" style="float:right; padding-left:8px; " width="200" height="120" />

<?php } ?>

<a href="problem.php?id=<?php echo $ROW['id']; ?>" class="problems"><?php echo $ROW['title']; ?></a> <br />
<p style="color:#777;"><?php echo $ROW['details']; ?></p>
<a href="problem.php?id=<?php echo $ROW['id']; ?>" >   Read more  </a> | 
<a href="problem.php?id=<?php echo $ROW['id']; ?>#solutions" >  

<?php 
$problem_id		=  $ROW['id'];
$Sol 			= "select id from tblsolutions where problem_id = '$problem_id'"; 
$SolRES 		= Run($Sol);
echo 			Records($SolRES);


?> 

Solution(s)  </a> | <a href="post-solution.php?problem=<?php echo $ROW['id']; ?>" class="post_solutions" >Post a Solution</a>
 
</div>

<div style="clear:both;">&nbsp;</div>
 <?php 
	  
	}
	  
	  ?> 

</div>

<?php include "SideBar.php"; ?>




<?php include "Footer.php"; ?>