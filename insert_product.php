<?php
include("connection.php");
session_start();
if($_SESSION['user']==""){
	header("location:Login.php");
}
$error="";
//Input in form 
if(isset($_POST['submit'])){
$p_qty=$_POST['p_qty'];
$p_price=$_POST['p_price'];
$p_tex=$_POST['p_tex'];
$p_name=$_POST['p_name'];
$uploadfile=$_FILES['uploadfile']['name'];
$tmpname=$_FILES['uploadfile']['tmp_name'];
$folder="image/".$uploadfile;
move_uploaded_file($tmpname, $folder);

if($p_qty!="" && $p_price!="" && $p_tex!="" && $p_name!="" && $folder!="")
{
	$q="INSERT INTO products VALUES ('','$p_qty','$p_price','$p_tex','$p_name','$folder','Laptop')";
	$db->query($q);
	$error .= "<div class='alert alert-success'>Data Inserted!! </div> ";
}
else{
	$error .= "<div class='alert alert-danger'>All fields are required..</div> ";
}
}
if(isset($_GET['action']) && $_GET['action']=='logout'){
	session_unset();
	header("location:Login/C_login.php");
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
</head>
<body style="background-color: #003153">
	<nav class="navbar navbar-expand-md navbar-dark shadow" style="background-color: #1c2841;">
	<a class="navbar-brand" href="#">Admin Panel</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="dashboard.php">Dashboard</a>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="C_login.php">Logout</a>
			</li>
		</ul>
	</div>
</nav>
<div class="container mt-5 w-50 p-5 rounded shadow-1" style="background-color: #C22900">
	<span class="text-danger"><?php echo $error; ?></span>
	<form method="post" class="text-white" enctype="multipart/form-data">
		<div class="row">
			<div class="form-group col-md-6">
				<label>Product Name</label>
				<input type="text" name="p_name" class="form-control form-control-sm">				
			</div>
			<div class="form-group col-md-6">
				<label>Product Price: </label>
				<input type="text" name="p_price" class="form-control form-control-sm">				
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<label>Product Quantity</label>
				<input type="text" name="p_qty" class="form-control form-control-sm">				
			</div>
			<div class="form-group col-md-6">
				<label>Product Tex% </label>
				<input type="text" name="p_tex" class="form-control form-control-sm">				
			</div>
		</div>
		  <label for="customFile">Product Image</label>
		  <div class="custom-file mb-3">
		  	<input type="file" name="uploadfile" class="custom-file-input" id="customFile">
		  	<label class="custom-file-label" for="customFile">Choose file</label>
		  </div>
		  <button type="submit" name="submit" class="btn btn-sm text-white shadow" style="background-color: #003153">Add Item</button>
	</form>
</div>
<script>
	$(".custom-file-input").on("change", function(){
       var fileName=$(this).val().split("\\").pop();
       $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
	});
</script>


</body>
</html>