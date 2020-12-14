<link rel="stylesheet" href="static/css/styles.css">
<?php
//we'll be including this on most/all pages so it's a good place to include anything else we want on those pages
require_once(__DIR__ . "/../lib/helpers.php");
?>


<!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


<bla class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="home.php"><img src="photos/Y2K.png" width="50" height="30" class="d-inline-block align-top" alt="" loading="lazy">
  </a>

  <?php if (is_logged_in()): ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

  <form name="form" action="searchResults.php" method="get" style ="display:inline-flex;">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">

  <div class="input-group"style="width: 500; position:relative; left:250;">
    <span class="input-group-prepend">
      <div class="input-group-text bg-transparent border-right-0">
      <i class="fa fa-search" ></i>
      </div>
    </span>
    <input class="form-control py-2 border-left-0 border" type="search" name="search" placeholder="search" id="search" />
    <?php
    $search = "";
    if(isset($_GET["search"])){
      $search = $_GET["search"];
    }
 ?>
    <span class="input-group-append">
      <button class="btn btn-light border-left-0 border" type="submit"> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
  <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
</svg>
</button>
    </span>
    </form>

</div >
      <a href="MyCart.php" style="position: relative;left: 55%;">
      <button style="color: black;"  type="button" class = "btn pull-right">
        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cart4" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"></path>
        </svg>
      </button>
    </a>
  </div>
  <?php endif; ?>
</bla>




<nav style= "background-color:#3e6a49;" class="navbar navbar-expand-lg text-white navbar-dark bg-dark " style = ".bg-dark {
background-color: #4c885b!important;
}"  >



  <a class="navbar-brand" href="home.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php if (!is_logged_in()): ?>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Sign up</a>
      </li>


      <?php endif; ?>


      <li class="nav-item">
        <a class="nav-link" href="myProducts.php">PRODUCTS</a>
      </li>

      <?php if (is_logged_in()): ?>
          <li class="nav-item">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Account
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="pastOrders.php">past orders</a>
                <a class="dropdown-item" href="profile.php">profile</a>
                <div class="dropdown-divider"></div>

              </div>
            </li>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="logout.php">logout</a>
          </li>

      <?php endif; ?>
      <?php if (has_role("Admin")): ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin Testing Stuff
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="test_create_product.php">create product</a>
          <a class="dropdown-item" href="adminProducts.php">product list</a>
          <a class="dropdown-item" href="adminOrders.php">view past orders</a>
          <a class="dropdown-item" href="adminOrderItems.php">Ordered Items</a>
          <a class="dropdown-item" href="test_list_cart.php">View Cart</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">I dont need this for now but im keeping it</a>
        </div>
      </li>
      <?php endif; ?>

    </ul>


  </div>
</nav>
