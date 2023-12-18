<?php
$conn = new mysqli('localhost', 'root', '','ecom');
?>

<!DOCTYPE html>

<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title> E-GADGET</title>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="nav/css/style.css">
   <script src="nav/js/jquery.min.js"></script>
  <script src="nav/js/popper.js"></script>
  <script src="nav/js/bootstrap.min.js"></script>
  <script src="nav/js/main.js"></script>
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
  <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://kit.fontawesome.com/70605d7a1e.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="nav/css/style.css">
   <script src="nav/js/jquery.min.js"></script>
  <script src="nav/js/popper.js"></script>
  <script src="nav/js/bootstrap.min.js"></script>
  <script src="nav/js/main.js"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
      
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa fa-bars"></span> Menu
        </button>
        <form action="#" class="searchform order-lg-last">
          <div class="form-group d-flex">
            <input type="text" class="form-control pl-3" placeholder="Search">
            <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>
          </div>
        </form>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active"><a href="../Home/home.php" class="nav-link">Home</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="phone.php">Phones</a>
                <a class="dropdown-item" href="laptop.php">Laptop</a>
                <a class="dropdown-item" href="accessories.php">Accessories</a>
                <a class="dropdown-item" href="gadgets.php">Gadgets</a>
              </div>
            </li>
            <li class="nav-item"><a href="products.php" class="nav-link">Shop</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="../Home/home.php" class="nav-link">Previous</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

  <!-- veg section -->
        
  <section class="veg_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2 class="bg-primary">
        Gadgets
        </h2>
        <p>
          which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't an
        </p>
      </div>
    
      <div class="row">
          <?php
        $query = "SELECT * FROM products WHERE Type='Gadget'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     $name = $row['name'];
      $qty = $row['qty'];
       $price = $row['price'];
        $image = $row['image'];
  
            ?>
        <div class="col-smd-6 col-md-4 col-lg-3">
          <div class="box box-border-1">
            <div >
              <img src="<?php echo $image; ?>" height="250" width="220" alt="Np">
            </div>
            <div class="detail-box">
              <a href="product_details.php?id=<?php echo $row['id']; ?>">
                <?php echo $name; ?>
              </a>
              <div class="price_box">
                <h6 class="text-success">
                  <span>Qty:</span> <?php echo $qty; ?>
                </h6>
              </div>
              <div class="price_box">
                <h6 class="price_heading">
                  <span>$</span> <?php echo $price; ?>
                </h6>
              </div>
              <div class="d-grid gap-2 row-1 mx-auto">
                <div class="col text-center" >
                 <a href="product_details.php?id=<?php echo $row['id']; ?>" class="btn btn-danger mt-2">
                            <i class="fas fa-shopping-cart"></i>Add to Cart</a>
                            </div>
             </div>
             
            </div>
          </div>
        </div>
          <?php } } ?>
    </div>
  </section>



  <!-- end veg section -->

  <!-- footer section -->
  <section class="container-fluid footer_section ">
    <div class="container">
      <div class="row ">
        <div class="col-sm-6 col-md-4 col-lg-3 footer-col">
          <div class="footer_detail">
            <a href="index.html">
              <h4>
                E-Gadget
              </h4>
            </a>
            <p>
              Soluta odit exercitationem rerum aperiam eos consectetur impedit delectus qui reiciendis, distinctio, asperiores fuga labore a? Magni natus.
            </p>
            <div class="social_box">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 mx-auto footer-col">
          <h4>
            Contact us
          </h4>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit
          </p>
          <div class="contact_nav">
            <a href="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span>
                Location
              </span>
            </a>
            <a href="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Call : +01 123455678990
              </span>
            </a>
            <a href="">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>
                Email : demo@gmail.com
              </span>
            </a>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_form">
            <h4>
              SIGN UP TO OUR NEWSLETTER
            </h4>
            <form action="">
              <input type="text" placeholder="Enter Your Email" />
              <button type="submit">
                Subscribe
              </button>
            </form>
          </div>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates</a>
        </p>
      </div>
    </div>
  </section>
  <!-- end  footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->
</body>

</html>