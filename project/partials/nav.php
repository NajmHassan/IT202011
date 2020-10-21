<link rel="stylesheet" href="static/css/styles.css">
<script src="https://kit.fontawesome.com/893921312a.js" crossorigin="anonymous"></script>
<?php
//we'll be including this on most/all pages so it's a good place to include anything else we want on those pages
require_once(__DIR__ . "/../lib/helpers.php");
?>
<nav>
<ul class="nav">

    <i class="fas fa-home"></i>
    <li><a href="home.php">Home</a></li>
    <?php if (!is_logged_in()): ?>
	<i class="fas fa-sign-in-alt"></i>
        <li><a href="login.php">Login</a></li>
	<i class="fas fa-user-plus"></i>
        <li><a href="register.php">Register</a></li>
    <?php endif; ?>
    <?php if (is_logged_in()): ?>
	<i class="fas fa-id-badge"></i>
        <li><a href="profile.php">Profile</a></li>
	<i class="fas fa-sign-out-alt"></i>
	 <li><a href="login.php">Logout</a></li>
    <?php endif; ?>
</ul>
</nav>
