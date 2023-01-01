<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update Product</title>
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
			<div class="col-lg-12 bg-primary">
				<h3 class="text-white p-2">Update Product</h3>
			</div>
		</div>
		
		<form action="" method="post">
			<div class="row">
				<div class="col-lg-2">
					<input type="text" class="form-control" name="txtproduct" value="<?php echo $pro_name?>">
				</div>
				<div class="col-lg-2">
					<select class="form-control" name="select_category">
						<option value="<?php echo $category?>" hidden=""><?php echo $category?></option>
						<?php
							$query = $object->display("tblcategory");
						   while($record=mysqli_fetch_assoc($query)){
							   $all_cate = $record['cat_name'];
							   
						   
						?>
						<option value="<?php echo $all_cate?>" ><?php echo $all_cate?></option>
						<?php
						   }
							?>
					</select>
				</div>
				<div class="col-lg-1">
					<input type="text" class="form-control" name="txtqty" value="<?php echo $qty?>">
				</div>
				<div class="col-lg-1">
					<input type="text" class="form-control" name="txtprice" value="<?php echo $price?>">
				</div>
				<div class="col-lg-1">
					<input type="submit" value="Update" name="btnupdate" class="btn btn-primary w-100">
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<?php
						if(isset($_POST['btnupdate'])){
							$pro_name = $_POST['txtproduct'];
							$category = $_POST['select_category'];
							$qty = $_POST['txtqty'];
							$price = $_POST['txtprice'];
							if(empty($pro_name) || empty($qty) || empty($price))
							{
								echo "Please Enter all Information!!";
							}
							else{
								$field = array("pro_name","cat_name","qty","price");
								$value = array("'$pro_name'","'$category'","'$qty'","'$price'");
								$query = $object->update_1condition("tblproduct", $field,$value,"pro_id",$pro_id);
								if($query){
									header('location:home.php');
									
								}else
								{
									echo "already exist";
								}
							}
						}
					?>
				</div>
			</div>
		</form>
		<?php
		
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