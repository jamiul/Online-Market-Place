<?php include 'inc/header.php'; ?>

<?php
$login = Session::get("custlogin");
if ($login == False) {
 	header("Location:login.php");
 } 
?>
<style>
.payment{

	}
.payment h2{

	}
.payment a{

	}
.back a{
	
}
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="payment">
    			<h2>Choose Payment Options</h2>
    			<a href="offline.php">Offline Payment</a>
    			<a href="online.php">Online Payment</a>
    		</div>
    		<div class="back">
    			<a href="cart.php">Previous</a>
    			
    		</div>
 		</div>
 	</div>
	</div>
	<?php include 'inc/footer.php'; ?>