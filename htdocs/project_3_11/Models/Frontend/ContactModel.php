<?php 
	trait ContactModel{
		public function Insert(){
			$name =$_POST["name"];
			$email =$_POST["email"];
			$nd=$_POST["content"];
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert into tbl_contact set name=:name, email=:email,content=:nd");
			$query->execute(array("name"=>$name,"email"=>$email,"nd"=>$nd));
			return $query->fetch();	
		}
	}
 ?>