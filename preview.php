<?php include 'inc/header.php'; ?>

 <?php
  if (!isset($_GET['proid']) || isset($_GET['proid']) == null) {
      echo "<script>window.location ='404.php'</script";
  }else{
    $id = $_GET['proid'];
  }
 ?>

 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">	
					<?php
				        $getPro = $pd->getSinglePro($id);
				        if ($getPro) {
	        			while ($value = $getPro->fetch_assoc()) {
        			?>			
					<div class="grid images_3_of_2">
						<img src="admin/<?php echo $value['image'];?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $value['productName'];?> </h2>					
					<div class="price">
						<p>Price: <span>$<?php echo $value['price'];?></span></p>
						<p>Category: <span><?php echo $value['catName'];?></span></p>
						<p>Brand:<span><?php echo $value['brandName'];?></span></p>
					</div>
				<div class="add-cart">
					<form action="cart.php" method="post">
						<input type="number" class="buyfield" name="" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p><?php echo $value['body'];?></p>
	    </div>
		<?php } }?>
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
				      <li><a href="productbycat.php">Mobile Phones</a></li>
				      <li><a href="productbycat.php">Desktop</a></li>
				      <li><a href="productbycat.php">Laptop</a></li>
				      <li><a href="productbycat.php">Accessories</a></li>
				      <li><a href="productbycat.php#">Software</a></li>
					   <li><a href="productbycat.php">Sports & Fitness</a></li>
					   <li><a href="productbycat.php">Footwear</a></li>
					   <li><a href="productbycat.php">Jewellery</a></li>
					   <li><a href="productbycat.php">Clothing</a></li>
					   <li><a href="productbycat.php">Home Decor & Kitchen</a></li>
					   <li><a href="productbycat.php">Beauty & Healthcare</a></li>
					   <li><a href="productbycat.php">Toys, Kids & Babies</a></li>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
	</div>
	<?php include 'inc/footer.php'; ?>