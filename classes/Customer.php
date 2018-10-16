<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Database.php');
  	include_once ($filepath.'/../helpers/format.php');
?>
<?php
/**
* 
*/
class Customer
{	
	private $db;
 	private $fm;
 	
  public function __construct()
 	{
 		$this->db = new Database();
 		$this->fm = new Format();
 	}
  public function CustomeRegistration($data)
 	{
 		$name    = mysqli_real_escape_string($this->db->link,$data['name']);
 		$city    = mysqli_real_escape_string($this->db->link,$data['city']);
 		$zip     = mysqli_real_escape_string($this->db->link,$data['zip']);
 		$email   = mysqli_real_escape_string($this->db->link,$data['email']);
 		$address = mysqli_real_escape_string($this->db->link,$data['address']);
 		$country = mysqli_real_escape_string($this->db->link,$data['country']);
 		$phone   = mysqli_real_escape_string($this->db->link,$data['phone']);
 		$pass    = mysqli_real_escape_string($this->db->link,$data['pass']);

     if ($name == "" || $city == "" || $zip == "" || $email == ""|| $address == ""|| $country =="" || $phone == "" || $pass ==""){
 			$msg = "<span class='error'> Field must not be empty !!</span>";
 			return $msg;
 		}
 		$mailQuery = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
 		$mailChk = $this->db->select($mailQuery);
 		if ($mailChk == TRUE) {
 			$msg = "<span class='error'>Email Already Exist !!</span>";
 			return $msg;
 		}else{
 			$query = "INSERT INTO tbl_customer(name,city,zip,email,address,country,phone,pass) VALUES('$name','$city','$zip','$email','$address','$country','$phone','$pass')";
              $insert_rows = $this->db->insert($query);
          if ($insert_rows) {
                echo "<span class='success'>Customer Registered Successfuly !</span>";
        }else{
                echo "<span class='error'>Customer Not Registered Successfuly !</span>";
       }
    }

 	}

 	public function CustomeLogin($data)
 	{
 		$email = mysqli_real_escape_string($this->db->link,$data['email']);
 		$pass  = mysqli_real_escape_string($this->db->link,$data['pass']);
 		if (empty($email) || empty($pass)) {
 			$msg = "<span class='error'> Field must not be empty !!</span>";
 			return $msg;
 		}

		$query ="SELECT * FROM tbl_customer WHERE email='$email' AND pass='$pass'";
		$result = $this->db->select($query);
		if ($result == TRUE) {
			$value = $result->fetch_assoc();
			Session::set("custlogin",true);
			Session::set("cmrId",$value['id']);
			Session::set("cmrName",$value['name']);
			header("Location:cart.php");
		}else{
			$msg = "<span class='error'> Email or Password did not matched !!";
			return $msg;
		}
 		
 	}
 	public function getCustomerData($id)
 	{
	    $query = "SELECT * FROM tbl_customer WHERE Id = '$id'";
	    $result = $this->db->select($query);
	    return $result;
 	}
}
?>