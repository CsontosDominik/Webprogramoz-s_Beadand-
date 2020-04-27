<?php if(!isset($_SESSION['permission']) || $_SESSION['permission'] < 1) : ?>
	<h1>Page access is forbidden!</h1>
<?php else : ?>
	<?php 
	$query = "SELECT csalad_nev, kereszt_nev, email, permission FROM felhasznalok";
	require_once DATABASE_CONTROLLER;
	$users = getList($query);
	?>
	<?php if(count($users) <= 0) : ?>
		<h1>Nem találhatóak felhasználók</h1>
	<?php else : ?>
		<table class="table table-dark">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Család név:</th>
					<th scope="col">Kereszt név:</th>
					<th scope="col">E-mail cím</th>
					<th scope="col">Rang: </th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 0; ?>
				<?php foreach ($users as $u) : ?>
					<?php $i++; ?>
					<tr>
						<th scope="row"><?=$i ?></th>
						<td><?=$u['csalad_nev'] ?></td>
						<td><?=$u['kereszt_nev'] ?></td>
						<td><?=$u['email'] ?></td>
						<td><?=$u['permission'] == 0 ? 'Nics Rangod' : ($u['permission'] == 1 ? 'Moderátor' : 'Admin')?></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	<?php endif; ?>
<?php endif; ?>