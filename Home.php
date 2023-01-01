<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css?fbclid=IwAR3O8PAhj4yXq7w39wCikZZUAOXhyX9tuDZQhzMlW_I_tBKmZkGN75n8yn4">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js?fbclid=IwAR3O8PAhj4yXq7w39wCikZZUAOXhyX9tuDZQhzMlW_I_tBKmZkGN75n8yn4"></script>
	
	<script>
		if(window.history.replaceState){
			window.history.replaceState(null,null,window.location.href);
		}
	</script>
</head>
	
<body>
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-lg-12 bg-primary">
				<h3 class="text-white p-2">Add Category</h3>
			</div>
		</div>
		
		<form action="" method="post">
			<div class="row">
				<div class="col-lg-3">
					<input type="text" class="form-control" name="txtcategory">
				</div>
				<div class="col-lg-1">
					<input type="submit" value="Add New" name="btncategory" class="btn btn-primary w-100">
				</div>
				<div class="col-lg-2">
					<input type="text" class="form-control" name="txtproduct" placeholder="Product Name">
				</div>
				<div class="col-lg-2">
					<select class="form-control" name="select_category">
						<option value="" hidden="">-select category-</option>
						<?php
						require('class.php');
			
						//create object from new class
						$object = new myclass;
			
							$query = $object->display('tblcategory');
							while($record = mysqli_fetch_assoc($query)){
								$category = $record['cat_name'];
							
						?>
						<option value="<?php echo $category ?>">
							<?php echo $category?>
						</option>
						<?php
							}
						?>
						
					</select>
				</div>
				<div class="col-lg-1">
					<input type="text" class="form-control" name="txtqty" placeholder="Quantify">
				</div>
				<div class="col-lg-1">
					<input type="text" class="form-control" name="txtprice" placeholder="Price">
				</div>
				<div class="col-lg-1">
					<input type="submit" value="Add New" name="btnproduct" class="btn btn-primary w-100">
				</div>
			</div>
		</form>
		
		<div class="row mt-2">
			<div class="col-lg-4">
				<?php
			
			if(isset($_POST['btncategory']))
			{
				$category = $_POST['txtcategory'];
				if(empty($category)){
					echo "Please Enter Categroy Name!!";
				}
				else{
					//send to server 
					/*
					$sql = "insert into tblcategory(cat_name) values('$category')";
					
					$query = $object->link()->query($sql);
					
					if($query){
						echo "success";
					}
					else{
						echo "name already exist.";
					}
					*/
					
					$field = array("cat_name");
					$value = array("'$category'");
					$table = "tblcategory";
					$query = $object->insert($table,$field,$value);
					
					if($query){
						echo "success";
					}
					else{
						echo "name already exist.";
					}
						
				}
			}
		?>
				<table class="table table-hover table-bordered">
					<tr>
						<th>ID</th>
						<th>Category</th>
						<th>Action</th>
					</tr>

					<?php
					
						$i=0;
						//$sql = "select * from tblcategory";
						//$query = $object->link()->query($sql);
						$query = $object->display("tblcategory");
						while($row = mysqli_fetch_assoc($query))
						{
							$i++;
							$id = $row['cat_id'];
							$category =$row['cat_name'];
						
					?>
					<tr>
						<td>
							<?php
								echo $i;
							?>
						</td>
						<td>
							<?php
								echo $category;
							?>
						</td>
						<td>
							<a href="update_category.php?id=<?php echo $id?>&category=<?php echo $category?>">Update</a>
						</td>
						<td>
							<a href="delete_category.php?id=<?php echo $id?>&category=<?php echo $category?>">Delete</a>
						</td>
					</tr>
					<?php
						}		
					?>
				</table>
			</div>
			<div class="col-lg-7">
				
				<?php
					if(isset($_POST['btnproduct'])){
						$product = $_POST['txtproduct'];
						$category = $_POST['select_category'];
						$qty = $_POST['txtqty'];
						$price = $_POST['txtprice'];
						if(empty($product) || empty($category) || empty($qty) || empty($price)){
							echo "Please Enter Information!!";
						}
						else{
							$field = array("pro_name","cat_name","qty","price");
							$value = array("'$product'","'$category'","'$qty'","'$price'");
							$table = "tblproduct";
							$query = $object->insert($table,$field,$value);
							if($query){
								echo "Insert Successfully";
							}
							else{
								echo "Already Exist";
							}
						}
					}
				?>
				
				<table class="table table-hover table-bordered" >
					<tr>
						<th>#</th>
						<th>Product Name</th>
						<th>Category</th>
						<th>Qty</th>
						<th>Price</th>
						<th colspan="2" class="text-center">Action</th>
					</tr>
					<?php
						$query = $object->display("tblproduct");
						
						while($row = mysqli_fetch_assoc($query)){
							$pro_id = $row['pro_id'];
							$pro_name = $row['pro_name'];
							$cat_name = $row['cat_name'];
							$qty = $row['qty'];
							$price = $row['price'];
						
					?>
					<tr>
						<td>
							<?php
								echo $pro_id
							?>
						</td>
						<td>
							<?php
								echo $pro_name
							?>
						</td>
						<td>
							<?php
								echo $cat_name
							?>
						</td>
						<td>
							<?php
								echo $qty
							?>
						</td>
						<td>
							<?php
								echo "$".$price
							?>
						</td>
						<td class="text-center">
							<a href="update_product.php?id=<?php echo $pro_id?>">Update</a>
						</td>
						<td class="text-center">
							<a href="delete_product.php?id=<?php echo $pro_id?>">Delete</a>
						</td>
					</tr>
					<?php
						}
					?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>