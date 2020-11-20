<?php require_once(__DIR__ . "/partials/nav.php"); ?>

<?php
if (!is_logged_in()) {
    //this will redirect to login and kill the rest of this script (prevent it from executing)
    flash("Login to view your cart");
    die(header("Location: login.php"));
}
?>
<?php

$id = get_user_id();

$query = "";
$results = [];
if (isset($_POST["query"])) {
    $query = $_POST["query"];
}
if (isset($id)) {
    $db = getDB();
    $stmt = $db->prepare("SELECT Cart.*,Products.name,Products.description, Users.username from Cart JOIN Users on Users.id = Cart.user_id JOIN Products on Products.id = Cart.product_id WHERE Users.id = :q LIMIT 10");

    $r = $stmt->execute([":q" => $id]);
    if ($r) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    else {
        flash("There was a problem fetching the results " . var_export($stmt->errorInfo(), true));
    }
} else{flash("You do not have a valid ID");}
//var_export($results);
$total = 0;
foreach($results as $a){
  if ($a["price"]){
    $total += $a["price"];

  }
}



?>
  <?php if (count($results) > 0): ?>
    <?php foreach ($results as $r): ?>
<div class="card mb-3" style="max-width: 540px; margin-left: 5.0em">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="..." class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <a href = "test_view_cart.php?id=<?php safer_echo($r['id']); ?>"<h5 class="card-title"><?php safer_echo($r["name"])?></h5></a>

        <p class="card-text">$<?php safer_echo($r["price"])?></p>
        <p class="card-text"><?php safer_echo($r["description"])?></p>
        <p class="card-text">Quantity: <?php safer_echo($r["quantity"])?></p>
        <p class="card-text"><small class="text-muted">added on <?php safer_echo($r["modified"])?></small></p>
        <div>
          <a type="button" href="test_view_cart.php?id=<?php safer_echo($r['id']); ?>">Edit</a>
       </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
<?php else: ?>
    <p>No results</p>
<?php endif; ?>
