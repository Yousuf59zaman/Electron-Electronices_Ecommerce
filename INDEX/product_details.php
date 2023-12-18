<?php
include("connection.php");
$conn = new mysqli('localhost', 'root', '','ecom');
$id= $_GET['id'];
$query = "SELECT * FROM products where id= '".$id."' ";
$result = $conn->query($query);

if ($result->num_rows > 0) {
     $row = $result->fetch_assoc();
     $name = $row['name'];
     $qty = $row['qty'];
     $price = $row['price'];
     $image = $row['image'];
     $tex = $row['Tex'];
}
?>
<?php


$error="";
//Input in form 
if(isset($_POST['submit'])){




	$q="INSERT INTO orders(name,qty,total,image) VALUES ('$name','$qty','$price','$image')";
	$db->query($q);
	header("location:cart.php");
	$error .= "<div class='alert alert-success'>Data Inserted!! </div> ";
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
<body>

	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Qty</th>
					<th>Price</th>
					<th>Text Rate%</th>
			
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><input type="text" class="form-control form-control-sm text-center" 
						value="<?php echo $name ?>" disabled></td>
					<td><input type="text" class="form-control form-control-sm w-50 text-center" 
						min="1" id="qty" value="<?php echo $qty ?>" ></td>
					<td><input type="text" class="form-control form-control-sm w-50 text-center" 
						value="<?php echo $price ?>" id="price" disabled></td>
					<td><input type="text" class="form-control form-control-sm w-50 text-center" 
						value="<?php echo $tex ?>" id="tex" disabled></td>				
				</tr>
			</tbody>
		</table>
		<h4 class="mr-5 float-right text-success">Total:-$<span id="demo" class="mr-5 text-success"></span></h4>

	<div class="row justify-content-center">
	<div class="col-sm-12 col-md-4 col-lg-4">
		<div class="card border-0">
			<img class="card-img"  src="<?php echo $image; ?>" width="100" height="250" alt="Vans">
			<div class="card-body">
				<h6 class="card-title text-secondary"><?php echo $name; ?></h6>
				<h6 class="card-title">Qty: <?php echo $qty; ?></h6>
				<h4 class="card-title text-success"><?php echo $price; ?> /-</h4>
			</div>

		</div>
		
	</div>
	</div>
	</div>
<div class="container mt-5 w-50 p-5 rounded shadow-1" style="background-color: #C22900">
	<form method="post"  class="text-white">
		<div class="row">
			<div class="form-group col-md-6">
				<label>Product Name</label>
				<input type="text" value="<?php echo $name ?>" name="p_name"  class="form-control form-control-sm"  disabled>				
			</div>
			<div class="form-group col-md-6">
				<label>Product Price: </label>
				<input type="text" value="<?php echo $price ?>" id="price"  class="form-control form-control-sm"  disabled>				
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<label>Product Quantity</label>
				<input type="text" min="1" id="qty1" value="<?php echo $qty ?>" name="p_qty" class="form-control form-control-sm"  >				
			</div>
			<div class="form-group col-md-6">
				<label>Product Tex% </label>
				<input type="text" value="<?php echo $tex ?>" id="tex" class="form-control form-control-sm"  disabled>				
			</div>
		</div>
		  <div class="row">
			<div class="form-group col-md-6">
				<label>GST</label>
				<input type="text" id="gst"  class="form-control form-control-sm"  disabled> 				
			</div>
			<div class="form-group col-md-6">
				<label>TOTAL </label>
				<input type="text" name="total" id="total" name="p_price" class="form-control form-control-sm"  disabled>				
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6">
				<label>Product Image Url </label>
				<input type="text" value="<?php echo $image ?>" name="p_image" class="form-control form-control-sm"  disabled>				
			</div>
		</div>
		  <button type="submit" name="submit" class="buy d-flex justify-content-between align-items-center btn btn-warning mt-3" >CART</button>
	</form>
</div>
<br><br><br>
	    <script>
	    	  $(document).ready(function(){
                   var price = $('#price').val();
                   var tex = $('#tex').val();
                   var qty = $('#qty').val();
                   var gst = $('#gst').val();
                   var add = qty*price;
                   $('#price').val(add);
                   var val= price*tex/100;
                   $('#gst').val(val);
                   var total = parseInt(add) + parseInt(val);
                   $('#total').val(total);
                   $('#demo').html(total);

               $('#qty').change(function(){
                   var qty= $(this).val();
                   $('#qty1').val(qty);
                   var add= qty*price;
                   $('#price').val(add);
                   var val=$('#price').val() * tex/100;
                   $('#gst').val(val);
                   var total=parseInt(add)+ parseInt(val);
                   $('#total').val(total);
                   $('#demo').html('<span class=container text success>' +total+'</span>');
               });
	    	  });
	    	</script>

</body>
</html>