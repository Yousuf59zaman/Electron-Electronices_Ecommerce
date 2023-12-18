<?php include("connection.php");
$message="";
error_reporting(0);
if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])
    && !empty($_GET['id'])){
	$query="DELETE FROM orders WHERE order_id='".$_GET['id']."' ";
	$db->query($query);
	header("location:cart.php");
	exit();
}
if(isset($_POST['submit']) && isset($_POST['id'])){
	$name=$_POST['name'];
	$qty=$_POST['qty'];
	$price=$_POST['price'];
	$query ="UPDATE orders SET qty='".$qty."' WHERE order_id='".$_POST['id']."'";
	$query=$db->query($query);
	if($query){
		$message ="<div class='alert alert-success'>Update Data Successfully !!</div>";
		header("Refresh: 1");
	}else{
		$message ="<div class='alert alert-danger'>Update Data Successfully !!</div>";
	}
	//exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://kit.fontawesome.com/70605d7a1e.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style type="text/css">
	table.table td .add{
		display: none;
	}
</style>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark shadow" style="background-color: #1c2841">
		<a class="navbar-brand" href="#">Admin Panel</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="">CART<span class="sr-only">(current)</span>
					</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="../HOME/home.php">Back</a>
			</li>
		</ul>
		</div>
	</nav>

	<div class="container mt-5">
		<h6><?php echo $message ?></h6>
		<div class="row">
			<a href="../Home/home.php" class="badge bg-primary text-white ml-auto p-2 mr-5">Go to more Shopping</a>
			<table class="table text-center mt-1 table-bordered">
			<thead>
				<tr>
					<th class="bg-primary">Image</th>
					<th class="bg-danger">Id</th>
					<th class="bg-success">Name</th>
					<th class="bg-warning">Quantity</th>
					<th class="bg-info">Total Price</th>
					<th class="text-center bg-light">Action</th>
				</tr>
			</thead>
			<?php
			  $query = "SELECT * FROM orders";
$result = $db->query($query);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     $id = $row['order_id'];
     $name = $row['name'];
     $qty = $row['qty'];
     $total = $row['total'];
     $image = $row['image'];
			?>
          <tbody>
          	<tr>
          		<form method="POST" enctype="multipart/form-data">
          			<td>
          				<img src="<?php echo $image; ?>" name="" class="" style="width: 70px;">
          			</td>
          			<td><input type="text" class="form-control form-control-sm text-danger" name="id"
          				value="<?php echo $id; ?>" disabled></td>
          				<td><input type="text" class="form-control form-control-sm text-primary" name="name"
          				value="<?php echo $name; ?>" disabled></td>
          				<td><input type="text" id="qty1" class="form-control form-control-sm text-success" name="qty"
          				value="<?php echo $qty; ?>" disabled></td>
          				<td><input type="text" id="price" class="form-control form-control-sm text-success" name="price"
          				value="<?php echo $total; ?>" disabled></td>
          				<td>
          					<div class="btn-group">
          					   <button type="submit" name="submit" class="add btn"
          					   title="save" data-toggle="tooltip"><a href="id=<?php 
          					   echo $id ?>"><i class="material-icons text-warning">&#xE03B;</i></a></button>
          	     </form>
          					   <a class="edit btn" title="Edit" data-toggle="tooltip"><i class="material-icons
          					   	text-warning">&#xE254</i>Edit</a>	
          					   <a href="?action=delete&id=<?php echo $id; ?>" class="delete" title="Delete"
          					   	data-toggle="tooltip" onclick="return confirm('Are you Sure to Delete this data')">
          					   		<i class="btn material-icons text-danger">&#xE872;</i>Delete
          					   	</a>
          					</div>
          				</td>
          				
       	             
          	</tr>
          </tbody>
      <?php }} ?>
  </table>
</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
          $('[data-toggle="tooltip"]').tooltip();
          $(document).on("click",".edit",function(){
           var input =$(this).parents("tr").find("input[type='text']");
           input.each(function(){
            $(this).removeAttr('disabled');
           });
           $(this).parents("tr").find(".add,.edit").toggle();
          });
		});
	</script>
	
</body>
</html>