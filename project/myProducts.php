<?php require_once(__DIR__ . "/partials/nav.php"); ?>
<?php
//if (!has_role("Admin")) {
    //this will redirect to login and kill the rest of this script (prevent it from executing)
  //  flash("You don't have permission to access this page");
  //  die(header("Location: login.php"));
//}
?>
<?php

$results = [];
$db = getDB();



if (has_role("Admin")) {
  $stmt = $db->prepare("SELECT * FROM Products  LIMIT 10");
}
else{
  $stmt = $db->prepare("SELECT * FROM Products WHERE  visibility = 1 LIMIT 10");
}
if (isset($_POST["sort"])) {

  $stmt = $db->prepare("SELECT * FROM Products WHERE  visibility = 1 ORDER BY price LIMIT 10");

}
elseif (isset($_POST["category"])){
  $stmt = $db->prepare("SELECT * FROM Products WHERE  visibility = 1 ORDER BY category LIMIT 10");

}

$r = $stmt->execute();
if ($r) {
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
else {
    flash("There was a problem fetching the products " . var_export($stmt->errorInfo(), true));
}
?>
  <div>
  <form method="POST" style="float: right; margin-top: 3em;">
    <button type="submit" name="category" value="category"  class="btn btn-primary">category</button>
    <button style= "margin-right: 2em;"type="submit" name="sort" value="sort"  class="btn btn-primary">low-high</button>
  </form>
  </div>



<h1>PRODUCTS</h1>
<div class="row" style= "margin-left: 4em;">
<?php if (count($results) > 0): ?>
    <?php foreach ($results as $r): ?>
      <div   class="card" style="width: 20rem; margin: 1em;">
        <img src="" class="card-img-top" alt="...">
        <div class="card-body">
          <a href = "test_view_product.php?id=<?php safer_echo($r['id']); ?>" <h5 class="card-title"><?php safer_echo($r["name"]); ?></h5></a>
          <h6 class="card-title"><?php safer_echo($r["price"]); ?></h6>
          <p class="card-text"><?php safer_echo($r["description"]); ?></p>
          <?php if (has_role("Admin")): ?>
            <a href="test_view_product.php?id=<?php safer_echo($r['id']); ?>" class="btn btn-primary">Edit</a>
          <?php endif; ?>
          </div>
        </div>
<?php endforeach; ?>
<?php endif; ?>
</div>
