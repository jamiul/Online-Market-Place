<?php 
    $filepath = realpath(dirname(__FILE__));
  	include_once ($filepath.'/../helpers/format.php');
  	include_once ($filepath.'/../lib/Database.php');
?>
<?php
/**
* 
*/
class Cart
{	
	private $db;
 	private $fm;
 	
  public function __construct()
 	{
 		$this->db = new Database();
 		$this->fm = new Format();
 	}
 	public function cartAdd($quantity,$id)
 	{
 		$quantity  = $this->fm->validation($quantity);
 		$quantity  = mysqli_real_escape_string($this->db->link,$quantity);
 	    $productId = mysqli_real_escape_string($this->db->link,$id);
 	    $sId       = session_id();

 	    $squery = "SELECT * FROM tbl_product WHERE productId = '$productId'";
 	    $result = $this->db->select($squery)->fetch_assoc();
 	    $productName = $result['productName'];
 	    $price = $result['price'];
 	    $image = $result['image'];

 	    $query = "INSERT INTO tbl_cart(sId,productId,productName,price,quantity,image) VALUES('$sId','$productId','$productName','$price','$quantity','$image')";

 	     $insert_rows = $this->db->insert($query);
            if ($insert_rows) {
                header("location:cart.php");
        }else{
                header("location:404.php");
        }
 	}
 	public function getCatProduct()
 	{
 		$sId = session_id();
 		$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
 		$result = $this->db->select($query);
 		return $result;
 	}
}
?>