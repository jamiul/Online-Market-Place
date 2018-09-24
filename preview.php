<?php include 'inc/header.php'; ?>
<?php include 'classes/caregory.php';?>
<?php 
$cat = new Category();
?>
 <?php
  if (!isset($_GET['proid']) || isset($_GET['proid']) == null) {
      echo "<script>window.location ='404.php'</script";
  }else{
    $id = $_GET['proid'];
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $quantity = $_POST['quantity'];
     $addCart  = $ct->cartAdd($quantity,$id);
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
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>
			<span style="color: red; font-size: 18px;" >
				<?php 
				    if (isset($addCart)) {
				    	echo $addCart;
				    }
				?>
			</span>
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
					<?php 
					      $getCat = $cat->getAllcat();
						    if ($getCat) {
						    	while ($result = $getCat->fetch_assoc()) {
					?>
				      <li><a href="productbycat.php?catId=<?php echo $result['carId'];?>"><?php echo $result['catName'];?></a></li>
				      <?php  } }?>
					</ul>
 				</div>
 		</div>
 	</div>
	</div>
	<?php include 'inc/footer.php'; ?>