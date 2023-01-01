<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delete</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css?fbclid=IwAR3O8PAhj4yXq7w39wCikZZUAOXhyX9tuDZQhzMlW_I_tBKmZkGN75n8yn4">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js?fbclid=IwAR3O8PAhj4yXq7w39wCikZZUAOXhyX9tuDZQhzMlW_I_tBKmZkGN75n8yn4"></script>
</head>

<body>
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-lg-12 bg-danger">
				<h3 class="text-white p-2">Delete Category</h3>
			</div>
		</div>
		<div class="row bg-primary">
			<div class="col-lg-4 p-3">
				<h3 class="bg-primary text-white">Are you sure want to Delete "<?php echo $_GET['category']?>"?</h3>
			</div>
			<div class="col-lg-1 pt-3">
				<a href="Home.php" class="btn btn-light">Cancel</a>
			</div>
			
				<form action="" method="post">
					<div class="col-lg-1 pt-3">
						<input type="submit" class="btn btn-danger" name="btndelete" value="Delete">
					</div>
				</form>
			<?php
				require('class.php');
				$object = new myclass;
				if(isset($_POST['btndelete'])){
					$id = $_GET['id'];
					//$sql = "delete from tblcategory where cat_id = '$id'";
					//$query = $object ->link()->query($sql);
					$query = $object ->delete('tblcategory','cat_id',$id);
					if($query){
						header('location:Home.php');
					}
				}
			?>
		</div>
	</div>
</body>
</html>