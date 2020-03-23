<?php
class Category{
	private $conn;
	private $table_name = "categories";

	public $id;
	public $name;

	public function __construct($db){
		$this->conn = $db;
	}

	function read(){
		$query = "select id,name from " . $this->table_name . " order by name";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}
	function readName(){
		$query = "select id,name from " . $this->table_name . " where id = ? limit 0,1";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1,$this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->name = $row["name"];
	}
}
?>