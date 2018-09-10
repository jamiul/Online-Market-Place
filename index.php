<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php
	      	  $getFepd = $pd->getFeatureproduct();
	      	  if ($getFepd) {
	      	  	while ($value = $getFepd->fetch_assoc()) {
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?proid=<?php echo $value['productId'];?>">
					 <img src="admin/<?php echo $value['image'];?>" alt="" /></a>
					 <h2><?php echo $value['productName'];?></h2>
					 <p><?php echo $fm->textShorten($value['body'],60);?></p>
					 <p><span class="price">$<?php echo $value['price'];?></span></p>
				     <div class="button"><span><a href="preview.php?proid=<?php echo $value['productId'];?>" class="details">Details</a></span></div>
				</div>
				<?php } }?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
		    <?php
	      	  $getNewpd = $pd->getNewproduct();
	      	  if ($getNewpd) {
	      	  	while ($value = $getNewpd->fetch_assoc()) {
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?proid=<?php echo $value['productId'];?>">
					 <img src="admin/<?php echo $value['image'];?>" alt="" /></a>
					 <h2><?php echo $value['productName'];?></h2>
					 <p><span class="price">$<?php echo $value['price'];?></span></p>
				     <div class="button"><span><a href="preview.php?proid=<?php echo $value['productId'];?>" class="details">Details</a></span></div>
				</div>
				<?php } }?>
			</div>
    </div>
 </div>
</div>
  <?php include 'inc/footer.php';?>