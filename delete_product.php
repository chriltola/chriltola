<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Product</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css?fbclid=IwAR3O8PAhj4yXq7w39wCikZZUAOXhyX9tuDZQhzMlW_I_tBKmZkGN75n8yn4">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js?fbclid=IwAR3O8PAhj4yXq7w39wCikZZUAOXhyX9tuDZQhzMlW_I_tBKmZkGN75n8yn4"></script>
	<script>
		if(window.history.replaceState){
			window.history.replaceState(null,null,window.location.href);
		}
	</script>
</head>

<body>
	<?php
		require('class.php');
		$object = new myclass;
		$pro_id = $_GET['id'];
		$query = $object->select_1con("tblproduct","pro_id",$pro_id);
		while($row= mysqli_fetch_assoc($query)){
			
			$pro_name = $row['pro_name'];
			$category = $row['cat_name'];
			$qty = $row['qty'];
			$price = $row['price'];
		}
	?>
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-lg-12 bg-danger">
				<h3 class="text-white p-2">Delete Product</h3>
			</div>
		</div>
		<div class="row bg-primary">
			<div class="col-lg-4 p-3">
				<h3 class="bg-primary text-white">Are you sure want to Delete "<?php echo $pro_name?>"?</h3>
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
				
				if(isset($_POST['btndelete'])){
					$pro_id = $_GET['id'];
					//$sql = "delete from tblcategory where cat_id = '$id'";
					//$query = $object ->link()->query($sql);
					$query = $object ->delete('tblproduct','pro_id',$pro_id);
					if($query){
						header('location:Home.php');
					}
				}
			?>
		</div>
	</div>
</body>
</html>