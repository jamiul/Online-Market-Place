<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php';?>
<?php include '../classes/caregory.php';?>
<?php include '../classes/Brand.php';?>

 <?php
   if (!isset($_GET['proid']) || isset($_GET['proid']) == null) {
      echo "<script>window.location ='productlist.php'</script";
  }else{

    $id = $_GET['proid'];
 }
   $pd = new Product();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
          
          $updateProduct = $pd->productUpdate($_POST,$_FILES,$id);
}
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Product</h2>
        <div class="block">  
        <?php
        $getPro = $pd->getProById($id);
        if ($getPro) {
        	while ($value = $getPro->fetch_assoc()) {
        ?>             
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo $value['productName'];?>" class="medium"  />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Select Category</option>
                            <?php 
                            $cat = new Category();
                            $showCat = $cat->getAllcat();
                               if ($showCat) {
                                    $i = 0;
                             while ($result = $showCat->fetch_assoc()){
                                   $i++;
                            ?>
                            <option
                            <?php
                            if ($value['carId'] == $result['carId']) {?>
                              	selected = "selected"
                           <?php } ?> 
                            value="<?php echo $result['carId'];?>"><?php echo $result['catName'];?>
                            </option>
                            <?php } }?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <option>Select Brand</option>
                            <?php 
                            $brand = new Brand();
                            $showBrand = $brand->getAllbrand();
                                 if ($showBrand) {
                                    $i = 0;
                                   while ($result = $showBrand->fetch_assoc()){
                                     $i++;
                            ?>
                            <option 
                            <?php
                            if ($value['brandId'] == $result['brandId']) {?>
                              	selected = "selected"
                           <?php } ?>
                            value="<?php echo $result['brandId'];?>"><?php echo $result['brandName'];?></option>
                            <?php } }?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body">
                        	<?php echo($value['body'])?>
                        </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo($value['price'])?>" class="medium" name="price" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                    	<img src="<?php echo $value['image']; ?>" height="80px" weight="150px">
                    </br>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php
                            if ($value['type'] == 0) {?>
                            <option selected="selected" value="0">Featured</option>
                            <option value="1">General</option>
                            <?php }else{ ?>
                            <option selected="selected" value="1">General</option>
                            <option value="0">Featured</option>
                            <?php }?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php } }?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


