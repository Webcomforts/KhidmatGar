<div id="sideBar">

<h3>Latest Solutions</h3>

<hr  />


 <?php 
	
	$RS2 = Run("select * from tblsolutions order by id desc"); 
	while($ROW2 = GetRow($RS2)){
	
	
	?>    
<a href="problem.php?id=<?php echo $ROW2['problem_id']; ?>#solutions"><?php echo substr($ROW2['details'], 0, 80); ?>.. </a>

<div style="clear:both">&nbsp;</div>

 

<?php } ?>

</div>

<div style="clear:both">&nbsp;</div>
</div>