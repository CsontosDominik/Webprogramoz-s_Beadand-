<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Nincs rangod az oldalon</h1>
<?php elseif(!isset($_SESSION['permission']) || $_SESSION['permission'] = 1) : ?>
	<h1 class="box-1">A rangod az oldalon: Moderátor</h1>
	<h1 class="box-1">Létrehozhatsz posztokat.</h1>
<?php elseif(!isset($_SESSION['permission']) || $_SESSION['permission'] = 2) : ?>
	<h1>A rangod az oldalon: Admin.</h1>
	<h1>Megnézheted a felhasználókat.</h1>
<?php endif; ?>