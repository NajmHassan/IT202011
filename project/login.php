<?php require_once(__DIR__ . "/partials/nav.php"); ?>

<div class="card" style="width: 18rem; height:20rem;  margin: 0 auto; float: none; margin-bottom: 10px; margin-top: 10px; padding-top: 30px; box-shadow: 2px 2px 5px 5px grey; /* Added */">
    <form method="POST">
      <div class="form-group">
        <label for="input">Email address or username</label>
        <input type="input" name="input" class="form-control" id="input" aria-describedby="emailHelp"  >
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="p1">Password</label>
        <input  type="password" name="password" class="form-control" id="password">
      </div>
      <button  type="submit" name="login" value="Login" class="btn btn-primary">Login</button>
    </form>
  </div>



<?php
if (isset($_POST["login"])) {

    $input = null;
    $email = null;
    $username = null;
    $password = null;


    if (isset($_POST["input"])) {
        $input = $_POST["input"];
    }

    if (strpos($input, "@")) {
        $email = $input;
    }
    else{
        $username = $input;
    }


    if (isset($_POST["email"])) {
      $email = $_POST["email"];
      echo "username is set to $email";
    }

    //if (isset($_POST["username"])) {
    //$username = $_POST["username"];
    //echo "username is set to $username";

//}
    if (isset($_POST["password"])) {
        $password = $_POST["password"];
        //echo "password is set";

    }
    $isValid = true;
    if (!isset($username) || !isset($email)) {
        if (!isset($password)) {
            $isValid = false;
        }
    }


    //if (!strpos($email, "@")) {
    //  $isValid = false;
    // echo "<br>Invalid username<br>";
    //}



    if ($isValid) {
        $db = getDB();

        if (isset($db)) {
            if (isset($username)){
                $stmt = $db->prepare("SELECT id, email, username, password from Users WHERE username = :username LIMIT 1");
                $params = array(":username" => $username);

            }
            if (isset($email)){
                $stmt = $db->prepare("SELECT id, email, username, password from Users WHERE email = :email LIMIT 1");
                $params = array(":email" => $email);

            }

            $r = $stmt->execute($params);
            //echo "db returned: " . var_export($r, true);
            $e = $stmt->errorInfo();
            if ($e[0] != "00000") {
                //echo "uh oh something went wrong: " . var_export($e, true);
                flash("Something went wrong, please try again");
            }
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result && isset($result["password"])) {
                $password_hash_from_db = $result["password"];
                if (password_verify($password, $password_hash_from_db)) {
                    $stmt = $db->prepare("
SELECT Roles.name FROM Roles JOIN UserRoles on Roles.id = UserRoles.role_id where UserRoles.user_id = :user_id and Roles.is_active = 1 and UserRoles.is_active = 1");


                    $stmt->execute([":user_id" => $result["id"]]);
                    $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    unset($result["password"]);//remove password so we don't leak it beyond this page
                    //let's create a session for our user based on the other data we pulled from the table
                    $_SESSION["user"] = $result;//we can save the entire result array since we removed password
                    if ($roles) {
                        $_SESSION["user"]["roles"] = $roles;
                    }
                    else {
                        $_SESSION["user"]["roles"] = [];
                    }
                    //on successful login let's serve-side redirect the user to the home page.
                    flash("Log in successful");
                    die(header("Location: profile.php"));
                }
                else {
                    flash("Invalid password, please try again");
                }
            }
            else {
                flash("Invalid user, please register first and then login");
            }
        }
    }
    else {
        flash("There was a validation issue");
    }
}
?>
<?php require(__DIR__ . "/partials/flash.php");
