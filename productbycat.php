<?php include 'inc/header.php'; ?>
<?php
   if (!isset($_GET['catId']) || isset($_GET['catId']) == null) {
      echo "<script>window.location ='catlist.php'</script";
  }else{
    $id = $_GET['catId'];
  }
?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Latest from Categories</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				<?php
				    $productByCat = $pd->ProductByCat($id);
				    if ($productByCat) {
				     	while ($value = $productByCat->fetch_assoc()) {
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?proid=<?php echo $value['productId'];?>">
					 <img src="admin/<?php echo $value['image'];?>" alt="" /></a>
					 <h2><?php echo $value['productName'];?></h2>
					  <p><?php echo $fm->textShorten($value['body'],60);?></p>
					 <p><span class="price">$<?php echo $value['price'];?></span></p>
				     <div class="button"><span><a href="preview.php?proid=<?php echo $value['productId'];?>" class="details">Details</a></span></div>
				</div>
				<?php } }else {?>
				<?php echo"<p>This Product Categories Are Not Availabel</p>";?>
				<?php }?>
			</div>

	
	
    </div>
 </div>
</div>
   <?php include 'inc/footer.php'; ?>