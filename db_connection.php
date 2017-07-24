<?php

date_default_timezone_set('America/Sao_Paulo');
class DbConnect {

	private $servername = "carnarvaldb.southcentralus.cloudapp.azure.com";
	private $username = "mktnaveia";
	private $password = "wsws8443";
	private $db_name = "mktnaveia";
	private $conn = null;

	function open(){
		// Create connection
		$this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->db_name);
		// Check connection
		if (!$this->conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		//echo "Connected successfully";
	}

	function close(){
		$this->conn->close();
	}

	function insertUserData($user_name, $user_email, $user_age, $user_schoolarship, $user_ip){

		if($user_name === "" || $user_email === "" || $user_age === "" || $user_schoolarship === "" || $user_ip === "") {
			return 1; // field is required;
		}

		if($this->getUserData($user_email)) {
			return 2; // email already exist in database
		}


		$date = date('Y-m-d H:i:s');
		$sql = "INSERT INTO user VALUES (DEFAULT,'$user_name','$user_email','$user_age','$user_schoolarship','$user_ip','$date')";

		if ($this->conn->query($sql) === TRUE) {
		    return 0; // successfull added
		} else {
			echo "Error: " . $sql . "<br>" . $this->conn->error;
			return 3; //unexpected error;
		    
		}
	}

	function getUserData($user_email){
		if(!isset($user_email))
			return false;
		$sql = "SELECT user_name, user_email FROM user WHERE user_email = '$user_email'";
		$result = $this->conn->query($sql);
		if($result->num_rows > 0){
			return true;
		}
		else{
			return false;
		}
	}
} 

// $db = new DbConnect();
// $db->open();

?>

