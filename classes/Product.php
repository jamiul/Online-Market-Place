<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php');
  	include_once ($filepath.'/../helpers/format.php');
?>
<?php

class Product
{
	
	private $db;
 	private $fm;
 	
   public function __construct()
 	{
 		$this->db = new Database();
 		$this->fm = new Format();
 	}
 	public function productInsert($data,$file)
 	{
 		
 		$productName = mysqli_real_escape_string($this->db->link,$data['productName']);
 		$catId       = mysqli_real_escape_string($this->db->link,$data['catId']);
 		$brandId     = mysqli_real_escape_string($this->db->link,$data['brandId']);
 		$body        = mysqli_real_escape_string($this->db->link,$data['body']);
 		$price       = mysqli_real_escape_string($this->db->link,$data['price']);
 		$type        = mysqli_real_escape_string($this->db->link,$data['type']);

 		    $permitted = array('jpg','png','gif','jpeg');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_tmp  = $file['image']['tmp_name'];

        $div      = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
        $upload_image = "upload/".$unique_image;

 		if ($productName == "" || $catId == "" || $brandId == "" || $body == ""|| $price == ""|| $file_name =="" || $type == ""){
 			$msg = "<span class='error'> Field must not be empty !!</span>";
 			return $msg;
 		}elseif ($file_size > 1048567) {
                echo "<span class='error'>Image size should be less than 1MB !</span>";
        }elseif (in_array($file_ext, $permitted) === false) {
                echo "<span class='error'>You can upload only ".implode(',', $permitted)."</span>";
        }else{

             move_uploaded_file($file_tmp,$upload_image);
             $query = "INSERT INTO tbl_product(productName,carId,brandId,body,price,image,type) VALUES('$productName','$catId','$brandId','$body','$price','$upload_image','$type')";
              $insert_rows = $this->db->insert($query);
            if ($insert_rows) {
                echo "<span class='success'>Product Inserted Successfuly !</span>";
        }else{
                echo "<span class='error'>Product Not Inserted Successfuly !</span>";
        }

 	}
}
 public function getAllproduct()
 {
      $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName FROM tbl_product
      INNER JOIN tbl_category
      ON tbl_product.carId = tbl_category.carId
      INNER JOIN tbl_brand
      ON tbl_product.brandId = tbl_brand.brandId
      ORDER BY tbl_product.productId DESC";
        $result = $this->db->select($query);
        return $result;
 }
  public function getProById($id)
  {
      $query = "SELECT * FROM tbl_product where productId = '$id'";
      $result = $this->db->select($query);
      return $result;
  }
  public function productUpdate($data,$file,$id){
    $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
    $catId       = mysqli_real_escape_string($this->db->link,$data['catId']);
    $brandId     = mysqli_real_escape_string($this->db->link,$data['brandId']);
    $body        = mysqli_real_escape_string($this->db->link,$data['body']);
    $price       = mysqli_real_escape_string($this->db->link,$data['price']);
    $type        = mysqli_real_escape_string($this->db->link,$data['type']);

        $permitted = array('jpg','png','gif','jpeg');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_tmp  = $file['image']['tmp_name'];

        $div      = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
        $upload_image = "upload/".$unique_image;

    if ($productName == "" || $catId == "" || $brandId == "" || $body == ""|| $price == ""||$type == ""){
      $msg = "<span class='error'> Field must not be empty !!</span>";
      return $msg;
    }else{
      if (!empty($file_name)){
      
         if ($file_size > 1048567) {
                echo "<span class='error'>Image size should be less than 1MB !</span>";
        }elseif (in_array($file_ext, $permitted) === false) {
                echo "<span class='error'>You can upload only ".implode(',', $permitted)."</span>";
        }else{

            move_uploaded_file($file_tmp,$upload_image);
            $query = "UPDATE tbl_product
                        set 
                        productName = '$productName',
                        carId       = '$catId',
                        brandId     = '$brandId',
                        body        = '$body',
                        price       = '$price',
                        image       = '$upload_image',
                        type        = '$type'
                        where productId = '$id'";
            $updated_row = $this->db->update($query);
            if ($updated_row) {
                echo "<span class='success'>Product Updated Successfuly !</span>";
        }else{
                echo "<span class='error'>Product Not Updated Successfuly !</span>";
         }
     }

       } else{
            $query = "UPDATE tbl_product
                        set 
                        productName = '$productName',
                        carId       = '$catId',
                        brandId     = '$brandId',
                        body        = '$body',
                        price       = '$price',
                        type        = '$type'
                        where productId = '$id'";
            $updated_row = $this->db->update($query);
            if ($updated_row) {
                echo "<span class='success'>Product Updated Successfuly !</span>";
        }else{
                echo "<span class='error'>Product Not Updated Successfuly !</span>";
         }

        }
      

   }
 }
  public function productDelete($id)
  {
    $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
    $getData = $this->db->select($query);
    if ($getData) {
      while ($DelImg = $getData->fetch_assoc()) {
        $dellink = $DelImg['image'];
        unlink($dellink);
      }
    }
    $delquery = "DELETE FROM tbl_product WHERE productId = '$id'";
    $delData = $this->db->delete($delquery);
    if (!empty($delData)) {
      $msg = "<span class='success'> Product Deleted successfully !!</span>";
    return $msg;
    }else{
      $msg = "<span class='error'> Product Not Deleted !!</span>";
    return $msg;
    }
  }
  public function getFeatureproduct()
  {
   $query = "SELECT * FROM tbl_product WHERE type='0' ORDER BY productId DESC LIMIT 4"; 
   $result = $this->db->select($query);
   return $result;
  }
  public function getNewproduct()
  {
   $query = "SELECT * FROM tbl_product ORDER BY productId DESC LIMIT 4"; 
   $result = $this->db->select($query);
   return $result;
  }
  public function getSinglePro($id)
  {
      $query = "SELECT p.*,c.catName,b.brandName 
      FROM tbl_product as p,tbl_category as c,tbl_brand as b
      WHERE p.carId = c.carId AND p.brandId = b.brandId AND p.productId =  '$id' ";
        $result = $this->db->select($query);
        return $result; 
  }
 
}
?>