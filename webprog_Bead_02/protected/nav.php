<hr>

<a href="index.php">Főoldal</a>
<?php if(!IsUserLoggedIn()) : ?>
	<a href="index.php?P=login">Bejelentkezés</a>
	<a href="index.php?P=register">Új felhasználó</a>
<?php else : ?>
	<a href="index.php?P=test">Rang megnézése</a>

	<?php if(isset($_SESSION['permission']) && $_SESSION['permission'] >= 1) : ?>
		<a href="index.php?P=new_post">Új post hozzáadása</a>
	<?php if (isset($_SESSION['permission']) && $_SESSION['permission'] = 2)?>
		<a href="index.php?P=users">Felhasználók megtekintése</a>
	<?php else : ?>
	<?php endif; ?>

	<a href="index.php?P=logout">Kijelentkezés</a>
<?php endif; ?>
<hr>