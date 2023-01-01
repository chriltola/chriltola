<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Category</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css?fbclid=IwAR3O8PAhj4yXq7w39wCikZZUAOXhyX9tuDZQhzMlW_I_tBKmZkGN75n8yn4">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js?fbclid=IwAR3O8PAhj4yXq7w39wCikZZUAOXhyX9tuDZQhzMlW_I_tBKmZkGN75n8yn4"></script>
</head>
	
<body>
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-lg-12 bg-primary">
				<h3 class="text-white p-2">Update Category</h3>
			</div>
		</div>
		
		<form action="" method="post">
			<div class="row">
				<div class="col-lg-3">
					<input type="text" class="form-control" name="txtcategory" value="<?php echo $_GET['category']?>">
				</div>
				<div class="col-lg-1">
					<input type="submit" value="update" name="btnupdate" class="btn btn-primary">
				</div>
			</div>
		</form>
		<?php
			require('class.php');
			$object = new myclass;
			$id = $_GET['id'];
			
			if(isset($_POST['btnupdate'])){
				$category = $_POST['txtcategory'];
				if(empty($category)){
					echo "Please Enter Category!!";
				}
				else{
					//$sql = "update tblcategory set cat_name ='$category' where cat_id = '$id'";
					//$query = $object->link()->query($sql);
					$table = "tblcategory";
					$field = array('cat_name');
					$value = array("'$category'");
					$query = $object->update_1condition($table,$field,$value,"cat_id",$id);
					
					if($query){
						header('location:Home.php');
					}
					else{
						echo "Already Exist";
					}
				
				}
			}
		?>
	</div>
</body>
</html>