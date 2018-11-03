<?php include'inc/header.php';?>
<?php
   if (isset($_GET['delpro'])) {
    	$Delid = $id = $_GET['delpro'];

    	$delProduct = $ct->ProDelbyCatId($Delid);
    } 
?>
<?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $catId    = $_POST['catId'];
     $quantity = $_POST['quantity'];

     if ($quantity <= 0) {

     	$delProduct = $ct->ProDelbyCatId($catId);
     }
     $updateCart = $ct->cartUpdateQty($catId,$quantity);
} 
?>
<?php
 if (!isset($_GET['id'])) {
	echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
  }
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
			    	<?php
			    	    if (isset($updateCart)) {
			    	     	header("location:cart.php");
			    	     } 
			    	     if (isset($delProduct)) {
			    	     	echo $delProduct;
			    	     } 
			    	?>
						<table class="tblone">
							<tr>
								<th width="5%">SL</th>
								<th width="30%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="20%">Quantity</th>
								<th width="20%">Total Price</th>
								<th width="5%">Action</th>
							</tr>
							<?php 
							      $ct = new Cart();
								  $getpro = $ct->getCatProduct(); 
								  if ($getpro) {
								  		$i = 0;
								  		$qty = 0;
								  		$sum = 0;
								  	while ($result = $getpro->fetch_assoc()) {
								  	     $i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName'];?></td>
								<td><img src="admin/<?php echo $result['image'];?>" alt=""/></td>
								<td>$ <?php echo $result['price'];?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="catId" value="<?php echo $result['carId'];?>"/>
										<input type="number" name="quantity" value="<?php echo $result['quantity'];?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>$ 
								<?php 
								     $total = $result['price']*$result['quantity'];
								     echo $total ;
								 ?></td>
								<td><a onclick="return confirm('Are You want Remove !!');" href="?delpro=<?php echo $result['carId'];?>">X</a></td>
							</tr>
							<?php 
							    $qty = $qty + $result['quantity'];
							    $sum = $sum + $total;
							    Session::set("qty",$qty);
							    Session::set("sum",$sum);
							?>
							
							<?php } }?>
							
						</table>
						<?php 
						  $getData = $ct->ChkTableCart();
						  if ($getData) {
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>$ <?php echo $sum;?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>TK. 10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td> 
							   <?php 
								    $vat = $sum * 0.1;
								    $gTotal = $sum + $vat;
								    echo $gTotal;
								  ?> 
								</td>
							</tr>
					   </table>
					   <?php }else{
					   	header("location:index.php");
					   }?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
 <?php include 'inc/footer.php';?>
