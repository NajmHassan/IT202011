<?php require_once(__DIR__ . "/partials/nav.php"); ?>

<?php

$results = [];
$cat = 0;
$db = getDB();



if (has_role("Admin")) {
  if (isset($_POST["outofstock"])) {
    $stmt = $db->prepare("SELECT id,name, price, description, quantity FROM Products WHERE quantity = 0  ORDER BY price LIMIT 10");
    $r = $stmt->execute();
  }
  elseif (isset($_POST["sort"])) {
    $stmt = $db->prepare("SELECT AVG(Ratings.rating) as rating,Products.id as id, Products.name, Products.description, Products.quantity,Products.price  FROM Ratings JOIN Products on Products.id = Ratings.product_id GROUP BY product_id");
    $r = $stmt->execute();


    #$stmt = $db->prepare("SELECT Products.id,Products.name, Products.price, Products.description, Products.quantity, Ratings.rating as rate FROM Products Join Ratings on Ratings.product_id = Products.id");
    #$r = $stmt->execute();
  }
  elseif (isset($_POST["quantity"])) {
    $cat = $_POST["quantity"];
    $stmt = $db->prepare("SELECT AVG(rating), product_id FROM `Ratings` GROUP BY product_id");
    $r = $stmt->execute( [":q" => $cat]);
  }else{
    $stmt = $db->prepare("SELECT id,name, price, description, quantity FROM Products  LIMIT 10");
    $r = $stmt->execute();
  }
}

if ($r) {
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
else {
    flash("There was a problem fetching the products " . var_export($stmt->errorInfo(), true));
}



// feching category to populate dropdown
$stmt = $db->prepare("SELECT DISTINCT category  FROM Products where visibility = 1 LIMIT 10");
$r = $stmt->execute();
if ($r) {
    $category = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
?>

  <form method="POST" style="float: right; margin-top: 3em; margin-right: 2em;" id = "form1">
      <label for="input">quantity check</label>
      <input type="input" name="quantity" class="form-control" id="quantity" aria-describedby="emailHelp" required>
      <button style= "margin-right: 2em;"type="submit" name="quantitycheck" value="quantitycheck"  class="btn btn-primary">submit</button>
  </form>
  <form method="POST" style="float: right;margin-right: 2em;">
    <button style= "margin-right: 2em;"type="submit" name="outofstock" value="outofstock"  class="btn btn-primary">view out of stock</button>
    <button style= "margin-right: 2em;"type="submit" name="sort" value="sort"  class="btn btn-primary">sort by rating</button>
  </form>




<h1>PRODUCTS</h1>
<div class="row" style= "margin-left: 4em;">
<?php if (count($results) > 0): ?>
    <?php foreach ($results as $r): ?>
      <div   class="card" style="width: 20rem; margin: 1em;">
        <img src="photos/Y2K.png" class="card-img-top" alt="...">
        <div class="card-body">
          <a href = "ViewProduct.php?id=<?php safer_echo($r['id']); ?>" <h5 class="card-title"><?php safer_echo($r["name"]); ?></h5></a>
          <h6 class="card-title"><?php safer_echo($r["price"]); ?></h6>
          <p class="card-text"><?php safer_echo($r["description"]); ?></p>
          <p class="card-text"> quantity = <?php safer_echo($r["quantity"]); ?></p>
          <?php if (isset($_POST["sort"])): ?>
          <p class="card-text"> rating: <?php safer_echo($r["rating"]); ?></p>
        <?php endif?>
          <?php if (has_role("Admin")): ?>
            <a href="EditProduct.php?id=<?php safer_echo($r['id']); ?>" class="btn btn-primary">Edit</a>
          <?php endif; ?>
          </div>
        </div>
<?php endforeach; ?>
<?php endif; ?>
</div>
<?php require_once(__DIR__ . "/partials/flash.php"); ?>
