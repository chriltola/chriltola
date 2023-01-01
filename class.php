<?php
	class myClass{
		function link(){
			$connect = new mysqli('localhost','root','Password1','dbproduct');
			return $connect;
		}
		function insert($table,$field,$value){
			$count = count($field);
			$sql = "insert into $table(";
			for($i=0;$i<$count;$i++){
				if($i==($count-1)){
					$sql.=$field[$i].")";
				}
				else{
					$sql.=$field[$i].",";
				}
			}
			$sql.=" values(";
			for($i=0;$i<$count;$i++){
				if($i==($count-1)){
					$sql.=$value[$i].")";
				}
				else{
					$sql.=$value[$i].",";
				}
			}
	
			return $this->link()->query($sql);
			
		}
		function display($table){
			$sql = "select * from $table";
			return $this->link()->query($sql);
		}
		function update_1condition($table,$field,$value,$con_1,$con_1_value){
			$sql = "update $table set ";
			$count = count($field);
			for($i=0;$i<$count;$i++){
				if($i==($count-1)){
					$sql.=$field[$i]."=".$value[$i];
				}
				else{
					$sql.=$field[$i]."=".$value[$i].",";
				}
			}
			$sql.=" where $con_1 = $con_1_value";
			return $this->link()->query($sql);
		}
		function delete($table,$field,$value){
			$sql = "delete from $table where $field = $value";
			return $this ->link()->query($sql);
		}
		function select_1con($table,$field,$value){
			$sql = "select * from $table where $field = '$value'";
			return $this->link()->query($sql);
		}
	}
?>