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

	function insertUserData($user_name, $user_email, $user_age, $user_schoolarship,$user_interest, $user_ip){
		if($user_name === "" || $user_email === "" || $user_age === "" || $user_schoolarship === "" || $user_ip === "") {
			return 1; // field is required;
		}

		if($this->getUserData($user_email)) {
			return 2; // email already exist in database
		}


		$date = date('Y-m-d H:i:s');
		$sql = "INSERT INTO user VALUES (DEFAULT,'$user_name','$user_email','$user_age','$user_schoolarship','$user_interest','$user_ip','$date')";

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

	function authenticate($username, $pw){
		
		if(!isset($username))
			return false;


		$sql = "SELECT * FROM admin WHERE admin_username = '$username' AND admin_password = '$pw'";
		$result = $this->conn->query($sql);
		if($result->num_rows > 0){
			return true;
		}
		else{
			return false;
		}
	}

	function getPost($id){
		if(!isset($id)){
			return false;
		}

		$sql = "SELECT * FROM post where post_id = $id";
		$result = $this->conn->query($sql);
		if($result->num_rows > 0){
			return mysqli_fetch_array($result);
		}
	}

	function getPosts($limit){
		$sql = "SELECT * FROM post ORDER BY post_date_created DESC LIMIT ".$limit;
		$result = $this->conn->query($sql);
		if($result->num_rows > 0){
			return $result;
		}

		return null;
	}

	function getLpById($id){
		if(!isset($id)){
			return null;
		}

		$sql = "SELECT * FROM lp where lp_id = $id";
		$result = $this->conn->query($sql);
		if($result->num_rows > 0){
			return mysqli_fetch_array($result);
		}
	}

	function getLpByUri($uri){
		if(!isset($uri)){
			return null;
		}

		$sql = "SELECT * FROM lp where lp_seo LIKE '".$uri."'";
		$result = $this->conn->query($sql);
		if($result->num_rows > 0){
			return mysqli_fetch_array($result);
		}

		return null;
	}

	function getUsers(){
		$sql = "SELECT * FROM user;";
		$result = $this->conn->query($sql);
		if($result->num_rows > 0){
			return $result;
		}

		return null;
	}

	function deleteUser($id){
		if(!isset($id)){
			return 1;
		}

		$sql = "DELETE FROM user WHERE user_id = ".$id;
		if ($this->conn->query($sql) === TRUE) {
		    return 0; // successfull added
		} else {
			echo "Error: " . $sql . "<br>" . $this->conn->error;
			return 3; //unexpected error;
		    
		}	
	}

	function insertPost($post_title, $post_subtitle, $post_description, $post_author, $post_preview){

		if($post_title === "" || $post_subtitle === "" || $post_description === "" || $post_author === ""){
			return 1;
		}

		$date = date('Y-m-d H:i:s');
		$sql = "INSERT INTO post VALUES (DEFAULT,'$post_title','$post_subtitle','$post_description','$post_author','$date','','','$post_preview')";

		if ($this->conn->query($sql) === TRUE) {
		    return 0; // successfull added
		} else {
			echo "Error: " . $sql . "<br>" . $this->conn->error;
			return 3; //unexpected error;
		    
		}	
	}

	function deletePost($id){
		if(!isset($id)){
			return 1;
		}

		$sql = "DELETE FROM post WHERE post_id = ".$id;
		if ($this->conn->query($sql) === TRUE) {
		    return 0; // successfull added
		} else {
			echo "Error: " . $sql . "<br>" . $this->conn->error;
			return 3; //unexpected error;
		    
		}	
	}

	function get($query){
		if($isset($query)){
			return null;
		}

		$result = $this->conn->query($query);
		if ($result->num_rows > 0) {
			return $result;
		}
		else {
			return "Error: " . $query . "<br>" . $this->conn->error; 
		}	

	}
} 

// $db = new DbConnect();
// $db->open();

?>

