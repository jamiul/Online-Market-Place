<?php include'inc/header.php';?>
<?php
$login = Session::get("custlogin");
if ($login == False) {
 	header("Location:login.php");
 } 
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">
    	<div class="notFound">
    		<h2 style="color: green;">Order Page</h2>
    	</div>	
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
 <?php include 'inc/footer.php';?>