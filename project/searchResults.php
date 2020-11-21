<?php require_once(__DIR__ . "/partials/nav.php"); ?>
<?php
if (!has_role("Admin")) {
    //this will redirect to login and kill the rest of this script (prevent it from executing)
    flash("You don't have permission to access this page");
    die(header("Location: login.php"));
}
?>
<?php

$query = "";
$results = [];
if (isset($_POST["query"])) {
    $query = $_POST["query"];
}
if (isset($_POST["search"]) && !empty($query)) {
    $db = getDB();
    $stmt = $db->prepare("SELECT Cart.id, Cart.price, Users.username from Cart JOIN Users on Users.id = Cart.user_id WHERE Users.username like :q LIMIT 10");

    $r = $stmt->execute([":q" => "%$query%"]);
    if ($r) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //var_export($results);


    }
    else {
        flash("There was a problem fetching the results " . var_export($stmt->errorInfo(), true));
    }
}
//var_export($results);


?>
<h3>List of Products in Cart </h3>
<form method="POST">
    <input name="query" placeholder="Search by username" value="<?php safer_echo($query); ?>"/>
    <input type="submit" value="Search" name="search"/>
</form>
<div class="results">
    <?php if (count($results) > 0): ?>
        <div class="list-group">
            <?php foreach ($results as $r): ?>
                <div class="list-group-item">
                  <div>
                     <div>Cart ID: <?php safer_echo($r["id"]); ?></div>
                 </div>
                 <div>
                     <div>Price Total: <?php safer_echo($r["price"]); ?></div>
                 </div>
                 <div>
                     <div>Creator: <?php safer_echo($r["username"]); ?></div>
                 </div>
                 <div>
                   <a type="button" href="test_edit_cart.php?id=<?php safer_echo($r['id']); ?>">Edit</a>
                   <a type="button" href="test_view_cart.php?id=<?php safer_echo($r['id']); ?>">View</a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>No results</p>
    <?php endif; ?>
</div>
