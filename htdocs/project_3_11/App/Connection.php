<?php 
	class Connection{
		//ham ket noi -  tra ve bien ket noi
		public static function getInstance(){
			//ham ket noi -  tra ve bien ket noi
			//$conn = new PDO("mysql:host=localhost;dbname=database_nth","root","");
			$conn = new PDO("mysql:host=localhost;dbname=database_nth","root","");
			//set charset de lay du lieu theo kieu unicode
			$conn->exec("set names 'utf8'");
			//dat che do lay du lieu mac dinh: object hoac array or assor
			$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
			return $conn;
		}
	}
 ?>